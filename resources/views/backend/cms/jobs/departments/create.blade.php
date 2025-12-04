@extends('backend.layouts.app')

@section('title','Create Job Department')

@section('content')
<div class="container-fluid">
    <h3>Create Job Department</h3>
    <form action="{{ route('admin.job_departments.store') }}" method="post">
        @csrf
        <div class="form-group"><label>Name</label><input type="text" name="name" class="form-control"/></div>
        <div class="form-group"><label>Slug</label><input type="text" name="slug" class="form-control"/></div>
        <div class="form-group"><label>Description</label><textarea name="description" class="form-control" rows="3"></textarea></div>
        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
