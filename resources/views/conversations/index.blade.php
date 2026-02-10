@extends('base')

@section('title', 'Messagerie')

@include('navbar.navbar')
@include('navbar/mobile')

@section('content')
    <div class="container-fluid mt-4">
        <h5 class="mb-3">Messages</h5>
        <div class="row">

            {{-- affichage des personnes en ligne sur message --}}
            @if ($onlineUsers->count())
                <div class="border-bottom mb-2 pb-2">
                    <small class="text-muted fw-bold px-2">En ligne</small>
                </div>
                <div class="d-flex gap-3 overflow-auto py-2 px-2">
                    @foreach ($onlineUsers as $onlineUser)
                    <div class="text-center">
                            <a href="{{ route('app_conversations_show', $onlineUser->id) }}">
                            <div class="position-relative">
                                <img src="{{ $onlineUser->profil?->getImage() }}" width="50" height="50" alt=""
                                    class="rounded-circle">
            
                                <span class="online-dot-message"></span>
                            </div>
                        </a>
                            <small>{{ $onlineUser->name }}</small>
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- Sidebar : liste des conversations --}}
            @include('conversations.partials.sidebar', [
                'users' => $users,
                'unread' => $unread,
            ])


            {{-- Zone principale vide --}}
            <div class="col-md-8 col-lg-9 d-flex align-items-center justify-content-center">
                <div class="text-center text-muted">
                    <i class="bi bi-chat-dots" style="font-size: 3rem;"></i>
                    <h5 class="mt-3">Aucun message sélectionné</h5>
                    <p>Sélectionne une conversation pour commencer à discuter</p>
                </div>
            </div>

        </div>
    </div>
@endsection
