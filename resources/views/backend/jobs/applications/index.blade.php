@extends('backend.layouts.app')

@section('title', 'Applications for ' . $job_post->title)

@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h3 class="text-themecolor mb-0">Applications</h3>
        </div>
        <div class="col-md-7 col-12 align-self-center d-none d-md-flex justify-content-end">
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
            <li class="breadcrumb-item">
                <a href="javascript:void(0)">Home</a>
            </li>
            <li class="breadcrumb-item active d-flex align-items-center">
                Applications
            </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="border-bottom title-part-padding d-flex align-items-center justify-content-between">
                    <h4 class="card-title">Applications: {{ $job_post->title }}</h4>
                </div>
                <div class="card-body">
                    <table class="table-striped table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Applied</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($applications as $app)
                                <tr>
                                    <td>{{ $app->id }}</td>
                                    <td>{{ $app->applicant_name }}</td>
                                    <td>{{ $app->applicant_email }}</td>
                                    <td><span class="badge bg-{{ $app->status === 'accepted' ? 'success' : ($app->status === 'rejected' ? 'danger' : 'warning') }}">{{ ucfirst($app->status) }}</span></td>
                                    <td>{{ $app->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-secondary" href="{{ route('admin.job_posts.applications.show', [$job_post, $app]) }}">View</a>
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
