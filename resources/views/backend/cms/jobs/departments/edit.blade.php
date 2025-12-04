@extends('backend.layouts.app')

@section('title','Edit Job Department')

@section('content')
<div class="container-fluid">
    <h3>Edit Job Department</h3>
    <form action="{{ route('admin.job_departments.update', $job_department) }}" method="post">
        @method('PUT') @csrf
        <div class="form-group"><label>Name</label><input type="text" name="name" value="{{ $job_department->name }}" class="form-control"/></div>
        <div class="form-group"><label>Slug</label><input type="text" name="slug" value="{{ $job_department->slug }}" class="form-control"/></div>
        <div class="form-group"><label>Description</label><textarea name="description" class="form-control" rows="3">{{ $job_department->description }}</textarea></div>
        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
