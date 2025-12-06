<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::orderByDesc('created_at')->get();
        return view('backend.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('backend.packages.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:packages,slug',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
            'active' => 'nullable|boolean',
        ]);

        $data['active'] = $request->has('active');
        Package::create($data);
        return redirect()->route('admin.packages.index')->with('success', 'Package created.');
    }

    public function edit(Package $package)
    {
        return view('backend.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:packages,slug,' . $package->id,
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
            'active' => 'nullable|boolean',
        ]);

        $data['active'] = $request->has('active');
        $package->update($data);
        return redirect()->route('admin.packages.index')->with('success', 'Package updated.');
    }

    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route('admin.packages.index')->with('success', 'Package deleted.');
    }
}
