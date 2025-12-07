@extends('backend.layouts.app')

@section('title','Banners')

@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h3 class="text-themecolor mb-0">Banners</h3>
        </div>
        <div class="col-md-7 col-12 align-self-center d-none d-md-flex justify-content-end">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item">
                <a href="javascript:void(0)">Home</a>
            </li>
            <li class="breadcrumb-item active d-flex align-items-center">
                Banners
            </li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="border-bottom title-part-padding d-flex align-items-center justify-content-between">
                    <h4 class="card-title">Banners / Sliders</h4>
                    <a href="{{ route('admin.banners.create') }}" class="btn btn-primary"><i class="mdi mdi-plus"></i> Create Banner</a>
                </div>
                <div class="card-body">
                    <table class="table-striped table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Active</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($banners as $b)
                            <tr>
                                <td>{{ $b->id }}</td>
                                <td>{{ $b->title }}</td>
                                <td><img src="{{ asset($b->image_path) }}" alt="picture" style="max-width: 100px; max-height: 50px;"></td>
                                <td>{{ $b->active ? 'Yes' : 'No' }}</td>
                                <td>
                                    <form method="POST" action="{{ route('admin.banners.destroy',$b) }}" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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
