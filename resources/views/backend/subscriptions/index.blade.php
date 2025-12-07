@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h3 class="text-themecolor mb-0">Subscriptions</h3>
        </div>
        <div class="col-md-7 col-12 align-self-center d-none d-md-flex justify-content-end">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item">
                <a href="javascript:void(0)">Home</a>
            </li>
            <li class="breadcrumb-item active d-flex align-items-center">
                Subscriptions
            </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="card">
                <div class="border-bottom title-part-padding d-flex align-items-center justify-content-between">
                    <h4 class="card-title">Subscriptions</h4>
                    <a href="{{ route('admin.subscriptions.create') }}" class="btn btn-primary"><i class="mdi mdi-plus"></i> Add Subscription</a>
                </div>
                <div class="card-body">
                    <table class="table-striped table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Package</th>
                                <th>Status</th>
                                <th>Started</th>
                                <th>Ends</th>
                                <th>Actions</th>
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
    </div>
</div>
@endsection
