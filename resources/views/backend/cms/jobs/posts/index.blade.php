@extends('backend.layouts.app')

@section('title','Job Posts')

@section('content')
<div class="container-fluid">
    <h3>Job Posts</h3>
    <a href="{{ route('admin.job_posts.create') }}" class="btn btn-primary">Create Job Post</a>
    <table class="table mt-3">
        <thead><tr><th>ID</th><th>Title</th><th>Department</th><th>Status</th><th>Deadline</th><th>Actions</th></tr></thead>
        <tbody>
        @foreach($posts as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->title }}</td>
                <td>{{ $p->department->name }}</td>
                <td>{{ $p->active ? 'Active' : 'Inactive' }}</td>
                <td>{{ $p->deadline?->format('Y-m-d') }}</td>
                <td>
                    <a class="btn btn-sm btn-secondary" href="{{ route('admin.job_posts.edit', $p) }}">Edit</a>
                    <a class="btn btn-sm btn-info" href="{{ route('admin.job_posts.applications.index', $p) }}">Applications</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
