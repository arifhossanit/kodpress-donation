@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <h3>Add Subscription</h3>

    <form action="{{ route('admin.subscriptions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">User</label>
            <select name="user_id" class="form-control" required>
                <option value="">Select user</option>
                @foreach($users as $u)
                    <option value="{{ $u->id }}">{{ $u->name }} &lt;{{ $u->email }}&gt;</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Package</label>
            <select name="package_id" class="form-control" required>
                <option value="">Select package</option>
                @foreach($packages as $p)
                    <option value="{{ $p->id }}">{{ $p->name }} — {{ number_format($p->price,2) }} USD</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="active">Active</option>
                <option value="pending">Pending</option>
                <option value="canceled">Canceled</option>
                <option value="expired">Expired</option>
            </select>
        </div>
        <button class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
