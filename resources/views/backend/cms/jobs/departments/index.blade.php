@extends('backend.layouts.app')

@section('title','Job Departments')

@section('content')
<div class="container-fluid">
    <h3>Job Departments</h3>
    <a href="{{ route('admin.job_departments.create') }}" class="btn btn-primary">Create Department</a>
    <table class="table mt-3">
        <thead><tr><th>ID</th><th>Name</th><th>Slug</th><th>Actions</th></tr></thead>
        <tbody>
        @foreach($departments as $d)
            <tr>
                <td>{{ $d->id }}</td>
                <td>{{ $d->name }}</td>
                <td>{{ $d->slug }}</td>
                <td>
                    <a class="btn btn-sm btn-secondary" href="{{ route('admin.job_departments.edit', $d) }}">Edit</a>
                    <form method="post" action="{{ route('admin.job_departments.destroy', $d) }}" style="display:inline">@csrf @method('DELETE')<button class="btn btn-sm btn-danger">Delete</button></form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
