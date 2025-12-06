@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <h3>Edit Admission</h3>

    <form action="{{ route('admin.admissions.update', $admission) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="pending" {{ $admission->status=='pending' ? 'selected' : '' }}>Pending</option>
                <option value="accepted" {{ $admission->status=='accepted' ? 'selected' : '' }}>Accepted</option>
                <option value="rejected" {{ $admission->status=='rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Notes</label>
            <textarea name="notes" class="form-control" rows="4">{{ $admission->notes }}</textarea>
        </div>
        <button class="btn btn-primary">Save</button>
        <a href="{{ route('admin.admissions.index') }}" class="btn btn-light">Cancel</a>
    </form>
</div>
@endsection
