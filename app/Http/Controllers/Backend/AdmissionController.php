<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admission;
use Illuminate\Support\Facades\Storage;

class AdmissionController extends Controller
{
    public function index()
    {
        $admissions = Admission::orderByDesc('created_at')->paginate(20);
        return view('backend.admissions.index', compact('admissions'));
    }

    public function show(Admission $admission)
    {
        return view('backend.admissions.show', compact('admission'));
    }

    public function edit(Admission $admission)
    {
        return view('backend.admissions.edit', compact('admission'));
    }

    public function update(Request $request, Admission $admission)
    {
        $data = $request->validate([
            'status' => 'required|in:pending,accepted,rejected',
            'notes' => 'nullable|string',
        ]);

        $admission->status = $data['status'];
        $admission->notes = $data['notes'] ?? $admission->notes;
        $admission->save();

        return redirect()->route('admin.admissions.index')->with('success', 'Admission updated.');
    }

    public function destroy(Admission $admission)
    {
        if ($admission->photo_path) {
            Storage::disk('public')->delete($admission->photo_path);
        }
        if ($admission->document_path) {
            Storage::disk('public')->delete($admission->document_path);
        }
        $admission->delete();
        return redirect()->route('admin.admissions.index')->with('success', 'Admission removed.');
    }
}
