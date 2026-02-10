@extends('base')

@section('title', 'Profile')

@include('navbar/navbar')
@include('navbar/mobile')

@section('content')
    <div class="container mt-4">

        {{-- SECTION PROFIL --}}
        <div class="row align-items-center">

            {{-- Photo --}}
           <div class="col-12 col-md-4 text-center mb-3 mb-md-0">
    <div class="profile-avatar mx-auto
        {{ $user->isOnline() ? 'online' : 'offline' }}">
        
        <img src="{{ $user->profil->getImage() }}"
             alt="Photo de profil"
             class="profile-img">
    </div>
</div>


            {{-- Infos --}}
            <div class="col-12 col-md-8" id="app">

                {{-- Nom + actions --}}
                <div class="d-flex flex-column flex-sm-row align-items-sm-center gap-2">

                    <h4 class="fw-bolder mb-0">{{ $user->name }}</h4>

                    <div class="d-flex gap-2">
                        @if ($user->id !== auth()->id())
                        <a href="{{ route('app_conversations_show', $user->id) }}" class="btn btn-secondary btn-sm">
                          <i class="fa-solid fa-comment"></i> <span>Message</span>  
                        </a>
                            
                        @endif

                        <followbutton profil-id="{{ $user->profil->id }}" follows="{{ $follows }}"
                            auth-profil-id="{{ auth()->user()->profil->id }}" />
                    </div>

                </div>

                {{-- Stats --}}
                <div class="d-flex justify-content-start gap-4 mt-3 flex-wrap">

                    <div>
                        <a href="#publication" class="text-decoration-none">
                            <span class="fw-bold">{{ $postCount }}</span> publications
                        </a>
                    </div>

                    <div>
                        <a href="{{ route('app_relations_index', [
                            'user' => $user->id,
                            'tab' => 'followers',
                        ]) }}"
                            class="text-decoration-none">
                            <span class="fw-bold">{{ $followsCount }}</span> abonnés
                        </a>
                    </div>

                    <div>
                        <a href="{{ route('app_relations_index', [
                            'user' => $user->id,
                            'tab' => 'following',
                        ]) }}"
                            class="text-decoration-none">
                            <span class="fw-bold">{{ $followingCount }}</span> suivis
                        </a>
                    </div>

                </div>

                {{-- Bouton édition --}}
                @can('update', $user->profil)
                    <div class="mt-3">
                        <a href="{{ route('app_profil_edit', ['user' => $user->id]) }}"
                            class="btn btn-outline-secondary btn-sm">
                            Modifier mon profil
                        </a>
                    </div>
                @endcan

                {{-- Bio --}}
                <div class="mt-3">
                    <div class="fw-bolder">Biographie</div>
                    <div>{{ $user->profil->description }}</div>

                    @if ($user->profil->lien)
                        <a href="{{ $user->profil->lien }}" target="_blank">
                            {{ $user->profil->lien }}
                        </a>
                    @endif

                    @can('update', $user->profil)
                        <div class="mt-2">
                            <a class="btn btn-outline-primary btn-sm" href="{{ route('app_post_create') }}">
                                Créer une publication
                            </a>
                        </div>
                    @endcan
                </div>

            </div>
        </div>

        <hr class="my-4">

        {{-- PUBLICATIONS --}}
        <div class="container mt-4" id="publication">
        @foreach ($user->posts as $post)
            <div class="row justify-content-center mb-4">
                <div class="col-md-8 col-lg-6">

                    <div class="card shadow-sm rounded-3">

                        {{-- HEADER --}}
                        <div class="card-body pb-2">
                            <div class="d-flex align-items-center">
                                <a href="{{ route('app_profil', ['user' => $post->user]) }}"
                                    class="d-flex align-items-center text-decoration-none text-dark">

                                    <img src="{{ $post->user->profil->getImage() }}" class="rounded-circle me-2"
                                        width="45" height="45">

                                    <div>
                                        <strong>{{ $post->user->name }}</strong><br>
                                        <small class="text-muted">
                                            {{ $post->created_at->diffForHumans() }}
                                        </small>
                                    </div>
                                </a>

                            </div>

                            <p class="mt-3 mb-2">
                                {{ $post->description }}
                            </p>
                        </div>

                        {{-- IMAGE --}}
                        <a href="{{ route('app_affiche_image', ['post' => $post->id]) }}">
                            <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid"
                                style="max-height:450px; object-fit:cover;">
                        </a>


                        <div class="px-3 py-2 text-muted small d-flex justify-content-between">

                            <div id="counts-{{ $post->id }}">
                                👍 {{ $post->likes->where('type', 'like')->count() }}
                                ❤️ {{ $post->likes->where('type', 'love')->count() }}
                                😢 {{ $post->likes->where('type', 'sad')->count() }}
                                😡 {{ $post->likes->where('type', 'angry')->count() }}
                                😮 {{ $post->likes->where('type', 'wow')->count() }}
                            </div>

                            <div>
                                {{ $post->comments->count() }} commentaires
                            </div>

                        </div>

                        <div class="d-flex justify-content-between px-3 py-2 border-top">

                            {{-- LIKE --}}
                            <div class="reaction-wrapper" data-post="{{ $post->id }}">

                                @php
                                    $reaction = $post->userLike()?-> type;
                                @endphp
                                <button type="button" class="btn btn-light btn-sm" id="btn-{{ $post->id }}">
                                    @switch($reaction)
                                        @case('love') ❤️ J'adore @break
                                        @case('sad') 😢 Triste @break
                                        @case('angry') 😡 Furieux @break
                                        @case('wow') 😮 Wouah @break
                                    
                                        @default 👍 J’aime
                                    @endswitch
                                    
                                </button>

                                <div class="reaction-options">
                                    @foreach (['like' => '👍', 'love' => '❤️', 'sad' => '😢', 'angry' => '😡', 'wow' => '😮'] as $type => $emoji)
                                        <span onclick="sendReaction('{{ $type }}', {{ $post->id }})">
                                            {{ $emoji }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>

                            {{-- COMMENTER --}}
                            <a href="{{ route('posts.comments', $post->id) }}" class="btn btn-light btn-sm"
                                data-post-id="{{ $post->id }}">
                                💬 Commenter
                            </a>


                        </div>

                    </div>

                </div>
            </div>
        @endforeach
    </div>

    <script>
        window.REACTION_URL = "{{ route('reaction.ajax') }}"
    </script>

    </div>
@endsection
