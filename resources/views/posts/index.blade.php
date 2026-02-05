@extends('base')

@section('title', 'Publication')

<!-- La barre de navigation -->
@include('navbar/navbar')

@section('content')

    <div class="container mt-4" id="app">
        @foreach ($posts as $post)
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
                                            Il y’a {{ $post->created_at->diffForHumans() }}
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
@endsection
