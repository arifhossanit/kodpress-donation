<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use App\Models\JobDepartment;
use Illuminate\Http\Request;

class JobPostController extends Controller
{
    public function index()
    {
        $posts = JobPost::with('department')->orderByDesc('created_at')->get();
        return view('backend.jobs.posts.index', compact('posts'));
    }

    public function create()
    {
        $departments = JobDepartment::orderBy('name')->get();
        return view('backend.jobs.posts.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'department_id' => 'required|exists:job_departments,id',
            'title' => 'required|string',
            'slug' => 'required|string|unique:job_posts,slug',
            'description' => 'nullable|string',
            'requirements' => 'nullable|string',
            'location' => 'nullable|string',
            'employment_type' => 'nullable|string',
            'salary_min' => 'nullable|numeric',
            'salary_max' => 'nullable|numeric',
            'deadline' => 'nullable|date',
        ]);
        JobPost::create($data + ['active' => $request->has('active')]);
        return redirect()->route('admin.job_posts.index');
    }

    public function edit(JobPost $job_post)
    {
        $departments = JobDepartment::orderBy('name')->get();
        return view('backend.jobs.posts.edit', compact('job_post', 'departments'));
    }

    public function update(Request $request, JobPost $job_post)
    {
        $data = $request->validate([
            'department_id' => 'required|exists:job_departments,id',
            'title' => 'required|string',
            'slug' => 'required|string|unique:job_posts,slug,' . $job_post->id,
            'description' => 'nullable|string',
            'requirements' => 'nullable|string',
            'location' => 'nullable|string',
            'employment_type' => 'nullable|string',
            'salary_min' => 'nullable|numeric',
            'salary_max' => 'nullable|numeric',
            'deadline' => 'nullable|date',
        ]);
        $job_post->update($data + ['active' => $request->has('active')]);
        return redirect()->route('admin.job_posts.index');
    }

    public function destroy(JobPost $job_post)
    {
        $job_post->delete();
        return redirect()->route('admin.job_posts.index');
    }
}
