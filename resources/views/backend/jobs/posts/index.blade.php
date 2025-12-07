@extends('backend.layouts.app')

@section('title','Job Posts')

@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h3 class="text-themecolor mb-0">Job Posts</h3>
        </div>
        <div class="col-md-7 col-12 align-self-center d-none d-md-flex justify-content-end">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item">
                <a href="javascript:void(0)">Home</a>
            </li>
            <li class="breadcrumb-item active d-flex align-items-center">
                Job Posts
            </li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="border-bottom title-part-padding d-flex align-items-center justify-content-between">
                    <h4 class="card-title">Job Posts</h4>
                    <a href="{{ route('admin.job_posts.create') }}" class="btn btn-primary"><i class="mdi mdi-plus"></i> Create Job Post</a>
                </div>
                <div class="card-body">
                    <table class="table-striped table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Department</th>
                                <th>Status</th>
                                <th>Deadline</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
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
            </div>
        </div>
    </div>
</div>
@endsection
