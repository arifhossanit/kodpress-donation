@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <h3>Create Package</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.packages.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" step="0.01" name="price" class="form-control" value="0">
        </div>
        <div class="mb-3">
            <label class="form-label">Duration (days)</label>
            <input type="number" name="duration_days" class="form-control" value="30">
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="4"></textarea>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="active" value="1" id="active" class="form-check-input" checked>
            <label for="active" class="form-check-label">Active</label>
        </div>
        <button class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
