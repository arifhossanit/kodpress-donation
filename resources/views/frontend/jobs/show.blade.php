@extends('layouts.app')

@section('title', $job->title)

@section('content')
<div class="frontend-page">
    <header class="page-header">
        <h1>{{ $job->title }}</h1>
        <p>{{ $job->department->name }}</p>
    </header>

    <div class="row">
        <div class="col-md-8">
            <div class="job-details">
                <h3>Job Description</h3>
                <p>{!! nl2br(e($job->description)) !!}</p>

                <h3>Requirements</h3>
                <p>{!! nl2br(e($job->requirements)) !!}</p>

                <h3>Location & Type</h3>
                <p><strong>Location:</strong> {{ $job->location ?? 'Not specified' }}</p>
                <p><strong>Employment Type:</strong> {{ $job->employment_type ?? 'Not specified' }}</p>
                @if($job->salary_min || $job->salary_max)
                    <p><strong>Salary Range:</strong> €{{ number_format($job->salary_min ?? 0) }} - €{{ number_format($job->salary_max ?? 0) }}</p>
                @endif
                <p><strong>Application Deadline:</strong> {{ $job->deadline?->format('F d, Y') ?? 'No deadline' }}</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4>Apply Now</h4>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form method="post" action="{{ route('jobs.apply', $job->slug) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Full Name *</label>
                            <input type="text" name="applicant_name" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="applicant_email" class="form-control" required/>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="applicant_phone" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label>Cover Letter</label>
                            <textarea name="cover_letter" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Resume (PDF/DOC/DOCX) *</label>
                            <input type="file" name="resume" class="form-control" accept=".pdf,.doc,.docx" required/>
                        </div>
                        <button class="btn btn-primary w-100">Submit Application</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
  .job-details h3 { margin-top: 20px; margin-bottom: 12px; }
  .job-details p { margin-bottom: 10px; line-height: 1.6; }
  .card { border: 1px solid #e0e0e0; border-radius: 8px; }
  .card-body { padding: 20px; }
  .form-group { margin-bottom: 14px; }
  .form-group label { display: block; margin-bottom: 4px; font-weight: 600; }
  .form-control { padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px; font-size: 14px; }
  .btn { padding: 10px 16px; border-radius: 4px; border: none; cursor: pointer; font-weight: 600; }
  .btn-primary { background: var(--primary); color: white; }
  .alert { padding: 12px; border-radius: 4px; margin-bottom: 12px; }
  .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
</style>
@endpush

@endsection
