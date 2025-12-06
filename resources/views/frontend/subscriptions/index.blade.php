@extends('frontend.layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4">Membership Packages</h2>
    <div class="row g-3">
        @foreach($packages as $package)
        <div class="col-md-4">
            <div class="card h-100">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $package->name }}</h5>
                    <p class="card-text">{{ \Illuminate\Support\Str::limit($package->description, 120) }}</p>
                    <div class="mt-auto">
                        <p class="mb-2"><strong>{{ number_format($package->price,2) }} USD</strong></p>
                        <a href="{{ route('subscriptions.show', $package->slug) }}" class="btn btn-outline-primary">View</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
