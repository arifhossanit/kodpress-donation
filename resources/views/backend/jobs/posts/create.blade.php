@extends('backend.layouts.app')

@section('title','Create Job Post')

@section('content')
<div class="container-fluid">
    <h3>Create Job Post</h3>
    <form action="{{ route('admin.job_posts.store') }}" method="post">
        @csrf
        <div class="form-group"><label>Department</label><select name="department_id" class="form-control">
            @foreach($departments as $d)<option value="{{ $d->id }}">{{ $d->name }}</option>@endforeach
        </select></div>
        <div class="form-group"><label>Title</label><input type="text" name="title" class="form-control"/></div>
        <div class="form-group"><label>Slug</label><input type="text" name="slug" class="form-control"/></div>
        <div class="form-group"><label>Description</label><textarea name="description" class="form-control" rows="4"></textarea></div>
        <div class="form-group"><label>Requirements</label><textarea name="requirements" class="form-control" rows="3"></textarea></div>
        <div class="form-group"><label>Location</label><input type="text" name="location" class="form-control"/></div>
        <div class="form-group"><label>Employment Type</label><select name="employment_type" class="form-control">
            <option value="">-- select --</option>
            <option value="Full-time">Full-time</option>
            <option value="Part-time">Part-time</option>
            <option value="Contract">Contract</option>
        </select></div>
        <div class="form-row">
            <div class="col form-group"><label>Salary Min</label><input type="number" name="salary_min" step="0.01" class="form-control"/></div>
            <div class="col form-group"><label>Salary Max</label><input type="number" name="salary_max" step="0.01" class="form-control"/></div>
        </div>
        <div class="form-group"><label>Deadline</label><input type="date" name="deadline" class="form-control"/></div>
        <div class="form-check"><input type="checkbox" name="active" class="form-check-input" id="active" checked><label for="active" class="form-check-label">Active</label></div>
        <button class="btn btn-primary mt-2">Save</button>
    </form>
</div>
@endsection
