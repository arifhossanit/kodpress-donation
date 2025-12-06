@extends('frontend.layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-8">
            <h2>{{ $package->name }}</h2>
            <p>{{ $package->description }}</p>
            <p><strong>Price: </strong>{{ number_format($package->price,2) }} USD</p>
            <p><strong>Duration: </strong>{{ $package->duration_days }} days</p>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    @auth
                        <form method="POST" action="{{ route('subscriptions.subscribe', $package->slug) }}">
                            @csrf
                            <p>Subscribe to this package. This demo uses a manual activation (no payment gateway).</p>
                            <button class="btn btn-primary w-100" type="submit">Subscribe</button>
                        </form>
                    @else
                        <p>Please <a href="{{ route('login') }}">login</a> or <a href="{{ route('register') }}">register</a> to subscribe.</p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
