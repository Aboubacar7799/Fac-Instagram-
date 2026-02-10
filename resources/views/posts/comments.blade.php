@extends('base')
@include('navbar/navbar')
@include('navbar/mobile')

@section('content')
    <div class="container mt-3">

        {{-- IMAGE --}}
        <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid rounded mb-3">

        <div id="comment-anchor-{{ $post->id }}">

        </div>

        {{-- COMMENTS --}}
        <div class="card-body pt-2">


            {{-- LISTE DES COMMENTAIRES --}}
            <div id="comments-lists-{{ $post->id }}" class="mb-3">

                @foreach ($post->comments as $comment)
                    <div class="d-flex">
                        <a href="{{ route('app_profil', $comment->user->profil->id) }}" class="text-decoration-none">
                            <img src="{{ $comment->user->profil->getImage() }}" class="rounded-circle me-2" width="35"
                                height="35">

                            <strong class="px-1">{{ $comment->user->name }}</strong>
                        </a>
                    </div>

                    <div class="rounded px-5 mb-3">
                        {{ $comment->content }}
                        <small class="text-muted">
                            {{ $comment->created_at->diffForHumans() }}
                        </small>
                        {{-- Menu --}}
                        @if ($comment->user->id === auth()->id())
                            <button data-bs-toggle="offcanvas" data-bs-target="#commentButton">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                        @endif
                    </div>
                @endforeach
            </div>


            <div class="offcanvas offcanvas-end" id="commentButton">
                <button class="btn-close" data-bs-dismiss="offcanvas">
                </button>


                <div class="offcanvas-body">
                    <a href="{{ route('app_comment_edit', $comment->id) }}"
                        class="d-block mb-3 text-decoration-none dropdown-item">Modifier</a>

                    <button>Supprimer</button>
                </div>

            </div>

        </div>

        {{-- FORMULAIRE --}}
        <form class="comment-form border-top pt-3" data-post-id="{{ $post->id }}"
            action="{{ route('comments.store', $post->id) }}" method="POST">
            @csrf

            <div class="d-flex align-items-center">
                <img src="{{ auth()->user()->profil->getImage() }}" class="rounded-circle me-2" width="35"
                    height="35">

                <input type="text" name="content" class="form-control rounded-pill" placeholder="Écrire un commentaire…">
            </div>
        </form>

    </div>
@endsection
