@extends('base')

@section('title', 'Edition Commentaire')

<!-- La barre de navigation -->
@include('navbar/navbar')
@include('navbar/mobile')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto mt-5">
                <h3 class="text-center text-muted mb-3 mt-4">Modifie ton commentaire</h3>



                {{-- FORMULAIRE --}}
                <form class="comment-form border-top pt-3" data-comment-id="{{ $comments->id }}" action="{{ route('app_comment_update',['comments' => $comments]) }}" method="POST">
                    @csrf

                    <div class="d-flex align-items-center">
                        <img src="{{ auth()->user()->profil->getImage() }}" class="rounded-circle me-2" width="35"
                            height="35">

                        <input type="text" name="content" class="form-control rounded-pill"
                            placeholder="Écrire un commentaire…" value="{{ $comments->content}}">
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
