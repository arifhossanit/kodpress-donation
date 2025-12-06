@extends('frontend.layouts.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    @if($profile && $profile->avatar_path)
                        <img src="{{ asset('storage/' . $profile->avatar_path) }}" class="rounded-circle mb-3" width="120" height="120" alt="avatar">
                    @else
                        <div class="bg-secondary rounded-circle mb-3" style="width:120px;height:120px;line-height:120px;color:white;">{{ strtoupper(substr($user->name,0,1)) }}</div>
                    @endif
                    <h5>{{ $user->name }}</h5>
                    <p class="text-muted">{{ $user->email }}</p>
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary btn-sm">Edit Profile</a>
                </div>
            </div>
            <div class="mt-3">
                <h6>Active Subscriptions</h6>
                @if($user->subscriptions->count())
                    <ul class="list-group">
                        @foreach($user->subscriptions as $sub)
                            <li class="list-group-item">
                                <strong>{{ $sub->package->name ?? 'Package' }}</strong>
                                <div class="small">Status: {{ $sub->status }}<br>Ends: {{ $sub->ends_at ? $sub->ends_at->toDateString() : '-' }}</div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="small text-muted">No subscriptions yet. <a href="{{ route('subscriptions.index') }}">View packages</a></p>
                @endif
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5>About</h5>
                    <p>{{ $profile->bio ?? '-' }}</p>
                    <h6>Contact</h6>
                    <p class="mb-1"><strong>Phone:</strong> {{ $profile->phone ?? '-' }}</p>
                    <p class="mb-1"><strong>Address:</strong> {{ $profile->address ?? '-' }}</p>
                    <p class="mb-1"><strong>City:</strong> {{ $profile->city ?? '-' }}</p>
                    <p class="mb-1"><strong>Country:</strong> {{ $profile->country ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
