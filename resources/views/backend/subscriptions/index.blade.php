@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Subscriptions</h3>
        <a href="{{ route('admin.subscriptions.create') }}" class="btn btn-primary">Add Subscription</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Package</th>
                        <th>Status</th>
                        <th>Started</th>
                        <th>Ends</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subscriptions as $s)
                    <tr>
                        <td>{{ $s->user->name }}<br><small class="text-muted">{{ $s->user->email }}</small></td>
                        <td>{{ $s->package->name ?? '—' }}</td>
                        <td>{{ ucfirst($s->status) }}</td>
                        <td>{{ $s->started_at ? $s->started_at->toDateString() : '-' }}</td>
                        <td>{{ $s->ends_at ? $s->ends_at->toDateString() : '-' }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.subscriptions.edit', $s) }}" class="btn btn-sm btn-secondary">Edit</a>
                            <form action="{{ route('admin.subscriptions.destroy', $s) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete subscription?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $subscriptions->links() }}
        </div>
    </div>
</div>
@endsection
