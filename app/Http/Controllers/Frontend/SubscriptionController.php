<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Package;
use App\Models\Subscription;
use Carbon\Carbon;

class SubscriptionController extends Controller
{
    public function index()
    {
        $packages = Package::where('active', true)->orderBy('price')->get();
        return view('frontend.subscriptions.index', compact('packages'));
    }

    public function show($slug)
    {
        $package = Package::where('slug', $slug)->firstOrFail();
        return view('frontend.subscriptions.show', compact('package'));
    }

    public function subscribe(Request $request, $slug)
    {
        $this->middleware('auth');

        $package = Package::where('slug', $slug)->firstOrFail();
        $user = Auth::user();

        // Simple create subscription - payment handling not included
        $now = Carbon::now();
        $ends = $now->copy()->addDays($package->duration_days);

        $subscription = Subscription::create([
            'user_id' => $user->id,
            'package_id' => $package->id,
            'status' => 'active',
            'started_at' => $now,
            'ends_at' => $ends,
            'payment_reference' => 'manual_' . time(),
        ]);

        return redirect()->route('profile.show')->with('success', 'Subscription activated.');
    }
}
