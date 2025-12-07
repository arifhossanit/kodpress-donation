<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    public function index(JobPost $job_post)
    {
        $applications = $job_post->applications()->orderByDesc('created_at')->get();
        return view('backend.jobs.applications.index', compact('job_post', 'applications'));
    }

    public function show(JobPost $job_post, JobApplication $application)
    {
        return view('backend.jobs.applications.show', compact('job_post', 'application'));
    }

    public function update(Request $request, JobPost $job_post, JobApplication $application)
    {
        $data = $request->validate([
            'status' => 'required|string',
            'notes' => 'nullable|string',
        ]);
        $application->update($data + ['reviewed_at' => now()]);
        return redirect()->route('admin.job_posts.applications.show', [$job_post, $application]);
    }

    public function destroy(JobPost $job_post, JobApplication $application)
    {
        if ($application->resume_path) {
            Storage::disk('public')->delete($application->resume_path);
        }
        $application->delete();
        return redirect()->route('admin.job_posts.applications.index', $job_post);
    }
}
