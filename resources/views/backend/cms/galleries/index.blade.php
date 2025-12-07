@extends('backend.layouts.app')

@section('title','Galleries')

@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h3 class="text-themecolor mb-0">Galleries</h3>
        </div>
        <div class="col-md-7 col-12 align-self-center d-none d-md-flex justify-content-end">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item">
                <a href="javascript:void(0)">Home</a>
            </li>
            <li class="breadcrumb-item active d-flex align-items-center">
                Galleries
            </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="border-bottom title-part-padding d-flex align-items-center justify-content-between">
                    <h4 class="card-title">Galleries</h4>
                    <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary"><i class="mdi mdi-plus"></i> Create Gallery</a>
                </div>
                <div class="card-body">
                    <table class="table-striped table table-hover table-bordered">
                        <thead><tr><th>ID</th><th>Name</th><th>Actions</th></tr></thead>
                        <tbody>
                        @foreach($galleries as $g)
                            <tr>
                                <td>{{ $g->id }}</td>
                                <td>{{ $g->name }}</td>
                                <td>
                                    <a class="btn btn-sm btn-info" href="{{ route('admin.galleries.show',$g) }}">Show</a>
                                    <a class="btn btn-sm btn-secondary" href="{{ route('admin.galleries.edit',$g) }}">Edit</a>
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
