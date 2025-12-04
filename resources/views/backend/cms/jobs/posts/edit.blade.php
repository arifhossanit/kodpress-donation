@extends('backend.layouts.app')

@section('title','Edit Job Post')

@section('content')
<div class="container-fluid">
    <h3>Edit Job Post: {{ $job_post->title }}</h3>
    <form action="{{ route('admin.job_posts.update', $job_post) }}" method="post">
        @method('PUT') @csrf
        <div class="form-group"><label>Department</label><select name="department_id" class="form-control">
            @foreach($departments as $d)<option value="{{ $d->id }}" {{ $job_post->department_id == $d->id ? 'selected' : '' }}>{{ $d->name }}</option>@endforeach
        </select></div>
        <div class="form-group"><label>Title</label><input type="text" name="title" value="{{ $job_post->title }}" class="form-control"/></div>
        <div class="form-group"><label>Slug</label><input type="text" name="slug" value="{{ $job_post->slug }}" class="form-control"/></div>
        <div class="form-group"><label>Description</label><textarea name="description" class="form-control" rows="4">{{ $job_post->description }}</textarea></div>
        <div class="form-group"><label>Requirements</label><textarea name="requirements" class="form-control" rows="3">{{ $job_post->requirements }}</textarea></div>
        <div class="form-group"><label>Location</label><input type="text" name="location" value="{{ $job_post->location }}" class="form-control"/></div>
        <div class="form-group"><label>Employment Type</label><select name="employment_type" class="form-control">
            <option value="">-- select --</option>
            <option value="Full-time" {{ $job_post->employment_type == 'Full-time' ? 'selected' : '' }}>Full-time</option>
            <option value="Part-time" {{ $job_post->employment_type == 'Part-time' ? 'selected' : '' }}>Part-time</option>
            <option value="Contract" {{ $job_post->employment_type == 'Contract' ? 'selected' : '' }}>Contract</option>
        </select></div>
        <div class="form-row">
            <div class="col form-group"><label>Salary Min</label><input type="number" name="salary_min" value="{{ $job_post->salary_min }}" step="0.01" class="form-control"/></div>
            <div class="col form-group"><label>Salary Max</label><input type="number" name="salary_max" value="{{ $job_post->salary_max }}" step="0.01" class="form-control"/></div>
        </div>
        <div class="form-group"><label>Deadline</label><input type="date" name="deadline" value="{{ $job_post->deadline?->format('Y-m-d') }}" class="form-control"/></div>
        <div class="form-check"><input type="checkbox" name="active" class="form-check-input" id="active" {{ $job_post->active ? 'checked' : '' }}><label for="active" class="form-check-label">Active</label></div>
        <button class="btn btn-primary mt-2">Save</button>
    </form>
</div>
@endsection
