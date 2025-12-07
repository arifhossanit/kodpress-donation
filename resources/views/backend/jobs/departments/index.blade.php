@extends('backend.layouts.app')

@section('title','Job Departments')

@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h3 class="text-themecolor mb-0">Job Departments</h3>
        </div>
        <div class="col-md-7 col-12 align-self-center d-none d-md-flex justify-content-end">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item">
                <a href="javascript:void(0)">Home</a>
            </li>
            <li class="breadcrumb-item active d-flex align-items-center">
                Job Departments
            </li>
            </ol>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="border-bottom title-part-padding d-flex align-items-center justify-content-between">
                    <h4 class="card-title">Job Departments</h4>
                    <a href="{{ route('admin.job_departments.create') }}" class="btn btn-primary"><i class="mdi mdi-plus"></i> Create Department</a>
                </div>
                <div class="card-body">
                    <table class="table-striped table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
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
            </div>
        </div>
    </div>
</div>
@endsection
