@extends('backend.layouts.app')

@section('title', 'Application from ' . $application->applicant_name)

@section('content')
<div class="container-fluid">
    <h3>Application: {{ $application->applicant_name }}</h3>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Applicant Info</h5>
                    <p><strong>Name:</strong> {{ $application->applicant_name }}</p>
                    <p><strong>Email:</strong> {{ $application->applicant_email }}</p>
                    <p><strong>Phone:</strong> {{ $application->applicant_phone ?? 'N/A' }}</p>
                    <p><strong>Applied:</strong> {{ $application->created_at->format('Y-m-d H:i') }}</p>
                    @if($application->resume_path)
                        <p><a href="{{ asset('storage/'.$application->resume_path) }}" class="btn btn-sm btn-primary" target="_blank">Download Resume</a></p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5>Review</h5>
                    <form method="post" action="{{ route('admin.job_posts.applications.update', [$job_post, $application]) }}">
                        @method('PUT') @csrf
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="pending" {{ $application->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="reviewing" {{ $application->status === 'reviewing' ? 'selected' : '' }}>Reviewing</option>
                                <option value="accepted" {{ $application->status === 'accepted' ? 'selected' : '' }}>Accepted</option>
                                <option value="rejected" {{ $application->status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Notes</label>
                            <textarea name="notes" class="form-control" rows="4">{{ $application->notes }}</textarea>
                        </div>
                        <button class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-body">
            <h5>Cover Letter</h5>
            <p>{!! nl2br(e($application->cover_letter ?? 'No cover letter provided')) !!}</p>
        </div>
    </div>
</div>
@endsection
