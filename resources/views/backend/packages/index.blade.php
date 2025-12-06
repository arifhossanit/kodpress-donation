@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Packages</h3>
        <a href="{{ route('admin.packages.create') }}" class="btn btn-primary">Create Package</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Duration (days)</th>
                        <th>Active</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($packages as $p)
                    <tr>
                        <td>{{ $p->name }}</td>
                        <td>{{ number_format($p->price,2) }}</td>
                        <td>{{ $p->duration_days }}</td>
                        <td>{{ $p->active ? 'Yes' : 'No' }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.packages.edit', $p) }}" class="btn btn-sm btn-secondary">Edit</a>
                            <form action="{{ route('admin.packages.destroy', $p) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete package?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
