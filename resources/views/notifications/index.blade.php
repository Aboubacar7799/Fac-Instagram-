@extends('base')

@section('title', 'Notifications')
<!-- La barre de navigation -->
@include('navbar/navbar')
@include('navbar/mobile')

@section('content')
<div class="container mt-4">

    <h5 class="mb-3">Notifications</h5>

    @forelse ($notifications as $notification)
        <a href="{{ route('notifications.read', $notification->id) }}"
           class="d-block p-3 mb-2 rounded text-decoration-none
           {{ $notification->is_read ? 'bg-white' : 'bg-primary bg-opacity-10' }}">
            
            <img src="{{ $notification->fromUser->profil->getImage() }}" alt="" width="45" height="45" class="rounded-circle me-2">

            <strong>{{ $notification->fromUser->name }}</strong>

            @if($notification->type === 'like')
                a aimé votre publication
            @elseif($notification->type === 'comment')
                a commenté votre publication
            @elseif($notification->type === 'follow')
                s’est abonné à vous
            @endif

            <div class="text-muted small">
                {{ $notification->created_at->diffForHumans() }}
            </div>
        </a>
    @empty
        <p class="text-muted">Aucune notification</p>
    @endforelse

    {{ $notifications->links() }}
</div>
@endsection