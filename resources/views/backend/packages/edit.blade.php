@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <h3>Edit Package</h3>

    <form action="{{ route('admin.packages.update', $package) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $package->name }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" value="{{ $package->slug }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" step="0.01" name="price" class="form-control" value="{{ $package->price }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Duration (days)</label>
            <input type="number" name="duration_days" class="form-control" value="{{ $package->duration_days }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ $package->description }}</textarea>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="active" id="active" class="form-check-input" {{ $package->active ? 'checked' : '' }}>
            <label for="active" class="form-check-label">Active</label>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
