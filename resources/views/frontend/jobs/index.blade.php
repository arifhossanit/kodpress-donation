@extends('frontend.layouts.app')

@section('title', 'Jobs')

@section('content')
<div class="frontend-page">
    <header class="page-header">
        <h1>Career Opportunities</h1>
        <p>Join our team and make an impact!</p>
    </header>

    <div class="jobs-grid">
        @forelse($jobs as $job)
            <div class="job-card">
                <div class="job-header">
                    <h3><a href="{{ route('jobs.show', $job->slug) }}">{{ $job->title }}</a></h3>
                    <span class="department-badge">{{ $job->department->name }}</span>
                </div>
                <div class="job-meta">
                    @if($job->location)<span class="meta-item">📍 {{ $job->location }}</span>@endif
                    @if($job->employment_type)<span class="meta-item">💼 {{ $job->employment_type }}</span>@endif
                    @if($job->salary_min && $job->salary_max)<span class="meta-item">💰 €{{ number_format($job->salary_min) }} - €{{ number_format($job->salary_max) }}</span>@endif
                </div>
                <p class="job-excerpt">{{ Str::limit(strip_tags($job->description), 150) }}</p>
                <div class="job-footer">
                    <small>Deadline: {{ $job->deadline?->format('M d, Y') ?? 'No deadline' }}</small>
                    <a href="{{ route('jobs.show', $job->slug) }}" class="btn btn-sm btn-primary">View & Apply</a>
                </div>
            </div>
        @empty
            <p>No job openings available at the moment.</p>
        @endforelse
    </div>
</div>

@push('styles')
<style>
  .jobs-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 18px; margin-top: 28px; }
  .job-card { background: #fff; border: 1px solid #e0e0e0; border-radius: 8px; padding: 16px; display: flex; flex-direction: column; }
  .job-header { margin-bottom: 10px; }
  .job-header h3 { margin: 0 0 8px; font-size: 18px; }
  .job-header a { color: var(--primary); text-decoration: none; }
  .department-badge { background: var(--primary); color: white; padding: 4px 8px; border-radius: 4px; font-size: 12px; }
  .job-meta { display: flex; gap: 10px; flex-wrap: wrap; margin-bottom: 10px; font-size: 14px; color: #666; }
  .meta-item { display: inline-block; }
  .job-excerpt { margin: 10px 0; flex-grow: 1; color: #555; }
  .job-footer { display: flex; justify-content: space-between; align-items: center; margin-top: 12px; border-top: 1px solid #f0f0f0; padding-top: 10px; }
  @media(max-width:600px) { .jobs-grid { grid-template-columns: 1fr; } }
</style>
@endpush

@endsection
