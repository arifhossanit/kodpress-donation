<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\JobDepartment;
use Illuminate\Http\Request;

class JobDepartmentController extends Controller
{
    public function index()
    {
        $departments = JobDepartment::orderBy('name')->get();
        return view('backend.jobs.departments.index', compact('departments'));
    }

    public function create()
    {
        return view('backend.jobs.departments.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:job_departments,slug',
            'description' => 'nullable|string',
        ]);
        JobDepartment::create($data);
        return redirect()->route('admin.job_departments.index');
    }

    public function edit(JobDepartment $job_department)
    {
        return view('backend.jobs.departments.edit', compact('job_department'));
    }

    public function update(Request $request, JobDepartment $job_department)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:job_departments,slug,' . $job_department->id,
            'description' => 'nullable|string',
        ]);
        $job_department->update($data);
        return redirect()->route('admin.job_departments.index');
    }

    public function destroy(JobDepartment $job_department)
    {
        $job_department->delete();
        return redirect()->route('admin.job_departments.index');
    }
}
