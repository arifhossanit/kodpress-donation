@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <h3>Edit Subscription</h3>

    <form action="{{ route('admin.subscriptions.update', $subscription) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">User</label>
            <p class="form-control-plaintext">{{ $subscription->user->name }} &lt;{{ $subscription->user->email }}&gt;</p>
        </div>
        <div class="mb-3">
            <label class="form-label">Package</label>
            <select name="package_id" class="form-control" required>
                @foreach($packages as $p)
                    <option value="{{ $p->id }}" {{ $subscription->package_id == $p->id ? 'selected' : '' }}>{{ $p->name }} — {{ number_format($p->price,2) }} USD</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="active" {{ $subscription->status=='active' ? 'selected' : '' }}>Active</option>
                <option value="pending" {{ $subscription->status=='pending' ? 'selected' : '' }}>Pending</option>
                <option value="canceled" {{ $subscription->status=='canceled' ? 'selected' : '' }}>Canceled</option>
                <option value="expired" {{ $subscription->status=='expired' ? 'selected' : '' }}>Expired</option>
            </select>
        </div>
        <div class="mb-3">
            <p class="small text-muted">Changing package restarts the subscription period (admin action).</p>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
