@extends('base')
@include('navbar/navbar')

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
                    <div class="mb-2 d-flex">
                        <img src="{{ $comment->user->profil->getImage() }}" class="rounded-circle me-2" width="35"
                            height="35">

                        <div>
                            <div class="bg-light rounded px-3 py-2">
                                <strong>{{ $comment->user->name }}</strong><br>
                                {{ $comment->content }}
                            </div>
                            <small class="text-muted">
                                Il y’a {{ $comment->created_at->diffForHumans() }}
                            </small>
                        </div>
                    </div>
                @endforeach

            </div>

            {{-- FORMULAIRE --}}
            <form class="comment-form border-top pt-3" data-post-id="{{ $post->id }}"
                action="{{ route('comments.store', $post->id) }}" method="POST">
                @csrf

                <div class="d-flex align-items-center">
                    <img src="{{ auth()->user()->profil->getImage() }}" class="rounded-circle me-2" width="35"
                        height="35">

                    <input type="text" name="content" class="form-control rounded-pill"
                        placeholder="Écrire un commentaire…">
                </div>
            </form>

        </div>
    @endsection
