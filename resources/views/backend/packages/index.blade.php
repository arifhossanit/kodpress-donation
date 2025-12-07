@extends('backend.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h3 class="text-themecolor mb-0">Packages</h3>
        </div>
        <div class="col-md-7 col-12 align-self-center d-none d-md-flex justify-content-end">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item">
                <a href="javascript:void(0)">Home</a>
            </li>
            <li class="breadcrumb-item active d-flex align-items-center">
                Packages
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
                    <h4 class="card-title">Packages</h4>
                    <a href="{{ route('admin.packages.create') }}" class="btn btn-primary"><i class="mdi mdi-plus"></i> Add Package</a>
                </div>
                <div class="card-body">
                    <table class="table-striped table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Duration (days)</th>
                                <th>Active</th>
                                <th>Actions</th>
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
    </div>
</div>
@endsection
