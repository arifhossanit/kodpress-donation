@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h3 class="text-themecolor mb-0">Admissions</h3>
        </div>
        <div class="col-md-7 col-12 align-self-center d-none d-md-flex justify-content-end">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item">
                <a href="javascript:void(0)">Home</a>
            </li>
            <li class="breadcrumb-item active d-flex align-items-center">
                Admissions
            </li>
            </ol>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="border-bottom title-part-padding d-flex align-items-center justify-content-between">
                    <h4 class="card-title">Admissions</h4>
                </div>
                <div class="card-body">
                    <table class="table-striped table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Desired Course</th>
                                <th>Status</th>
                                <th>Submitted</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admissions as $a)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if($a->user)
                                        <a href="{{ route('admin.users.show', $a->user->id) }}">{{ $a->user->name }}</a>
                                    @else
                                        {{ $a->full_name }}
                                    @endif
                                </td>
                                <td>{{ $a->email }}</td>
                                <td>{{ $a->desired_course ?? '-' }}</td>
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
    </div>
</div>
@endsection
