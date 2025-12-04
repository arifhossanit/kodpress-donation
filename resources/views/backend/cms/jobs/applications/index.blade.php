@extends('backend.layouts.app')

@section('title', 'Applications for ' . $job_post->title)

@section('content')
<div class="container-fluid">
    <h3>Applications: {{ $job_post->title }}</h3>
    <table class="table mt-3">
        <thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Status</th><th>Applied</th><th>Actions</th></tr></thead>
        <tbody>
        @foreach($applications as $app)
            <tr>
                <td>{{ $app->id }}</td>
                <td>{{ $app->applicant_name }}</td>
                <td>{{ $app->applicant_email }}</td>
                <td><span class="badge bg-{{ $app->status === 'accepted' ? 'success' : ($app->status === 'rejected' ? 'danger' : 'warning') }}">{{ ucfirst($app->status) }}</span></td>
                <td>{{ $app->created_at->format('Y-m-d') }}</td>
                <td>
                    <a class="btn btn-sm btn-secondary" href="{{ route('admin.job_posts.applications.show', [$job_post, $app]) }}">View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
