<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = JobPost::where('active', true)->with('department')->orderByDesc('created_at')->get();
        return view('frontend.jobs.index', compact('jobs'));
    }

    public function show($slug)
    {
        $job = JobPost::where('slug', $slug)->where('active', true)->firstOrFail();
        return view('frontend.jobs.show', compact('job'));
    }

    public function apply(Request $request, $slug)
    {
        $job = JobPost::where('slug', $slug)->where('active', true)->firstOrFail();

        $data = $request->validate([
            'applicant_name' => 'required|string',
            'applicant_email' => 'required|email',
            'applicant_phone' => 'nullable|string',
            'cover_letter' => 'nullable|string',
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $resumePath = $request->file('resume')->store('job_resumes', 'public');

        JobApplication::create([
            'job_post_id' => $job->id,
            'applicant_name' => $data['applicant_name'],
            'applicant_email' => $data['applicant_email'],
            'applicant_phone' => $data['applicant_phone'],
            'cover_letter' => $data['cover_letter'],
            'resume_path' => $resumePath,
        ]);

        return redirect()->back()->with('success', 'Your application has been submitted!');
    }
}
