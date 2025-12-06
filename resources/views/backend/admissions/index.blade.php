@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Admissions</h3>
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
                        <th>Email</th>
                        <th>Program</th>
                        <th>Status</th>
                        <th>Submitted</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admissions as $a)
                    <tr>
                        <td>
                            @if($a->user)
                                <a href="{{ route('admin.users.show', $a->user->id) }}">{{ $a->user->name }}</a>
                                <br><small class="text-muted">{{ $a->user->email }}</small>
                            @else
                                {{ $a->full_name }}<br><small class="text-muted">{{ $a->email }}</small>
                            @endif
                        </td>
                        <td>{{ $a->program ?? '-' }}</td>
                        <td>{{ ucfirst($a->status) }}</td>
                        <td>{{ $a->created_at->toDateString() }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.admissions.show', $a) }}" class="btn btn-sm btn-primary">View</a>
                            <a href="{{ route('admin.admissions.edit', $a) }}" class="btn btn-sm btn-secondary">Edit</a>
                            <form action="{{ route('admin.admissions.destroy', $a) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete admission?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $admissions->links() }}
        </div>
    </div>
</div>
@endsection
