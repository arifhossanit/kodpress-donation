<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscription;
use App\Models\Package;
use App\Models\User;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::with(['user','package'])->orderByDesc('created_at')->paginate(20);
        return view('backend.subscriptions.index', compact('subscriptions'));
    }

    public function create()
    {
        $users = User::orderBy('name')->get();
        $packages = Package::where('active', true)->orderBy('price')->get();
        return view('backend.subscriptions.create', compact('users','packages'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'package_id' => 'required|exists:packages,id',
            'status' => 'nullable|in:pending,active,canceled,expired',
        ]);

        $user = User::findOrFail($data['user_id']);
        $package = Package::findOrFail($data['package_id']);

        $now = Carbon::now();
        $ends = $now->copy()->addDays($package->duration_days);

        $subscription = Subscription::create([
            'user_id' => $user->id,
            'package_id' => $package->id,
            'status' => $data['status'] ?? 'active',
            'started_at' => $now,
            'ends_at' => $ends,
            'payment_reference' => 'admin_manual_' . time(),
        ]);

        return redirect()->route('admin.subscriptions.index')->with('success', 'Subscription added for user.');
    }

    public function edit(Subscription $subscription)
    {
        $packages = Package::where('active', true)->orderBy('price')->get();
        return view('backend.subscriptions.edit', compact('subscription','packages'));
    }

    public function update(Request $request, Subscription $subscription)
    {
        $data = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'status' => 'required|in:pending,active,canceled,expired',
        ]);

        $package = Package::findOrFail($data['package_id']);

        // If package changed, treat as upgrade/renew: restart started_at and ends_at
        if ($subscription->package_id != $package->id) {
            $now = Carbon::now();
            $subscription->started_at = $now;
            $subscription->ends_at = $now->copy()->addDays($package->duration_days);
            $subscription->payment_reference = 'admin_manual_change_' . time();
        }

        $subscription->package_id = $package->id;
        $subscription->status = $data['status'];
        $subscription->save();

        return redirect()->route('admin.subscriptions.index')->with('success', 'Subscription updated.');
    }

    public function destroy(Subscription $subscription)
    {
        $subscription->delete();
        return redirect()->route('admin.subscriptions.index')->with('success', 'Subscription removed.');
    }
}
