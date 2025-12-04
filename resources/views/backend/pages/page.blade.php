@extends('backend.layouts.app')

@section('title', 'Demo Page')

@section('content')

<!-- -------------------------------------------------------------- -->
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h3 class="text-themecolor mb-0">Dashboard 3</h3>
        </div>
        <div
            class="
            col-md-7 col-12
            align-self-center
            d-none d-md-flex
            justify-content-end
            "
        >
            <ol class="breadcrumb mb-0 p-0 bg-transparent">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0)">Home</a>
                </li>
                <li class="breadcrumb-item active">Dashboard 3</li>
            </ol>
        </div>
    </div>
    <!-- -------------------------------------------------------------- -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- -------------------------------------------------------------- -->
    <!-- content goes here -->
</div>
@endsection

@push('styles_libs')
<!-- style library -->
@endpush

@push('styles')
<!-- internal css -->
@endpush

@push('scripts_libs')
<!-- script library -->
@endpush

@push('scripts')
<!-- internal script -->
@endpush