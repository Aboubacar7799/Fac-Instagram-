@extends('base')

@section('title','Profil')

<!-- La barre de navigation -->
@include('navbar/navbar')
@include('navbar/mobile')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-8">

                <a href="{{ asset('storage'). '/' .$post->image }}">
                    <img src="{{ asset('storage'). '/' .$post->image }}" class="w-100" alt="">
                </a>
            </div>
            
            <div class="col-4">
                <h3 class="fw-bold">{{ $post->user->name }}</h3>
                <p>{{ $post->description }}</p>
            </div>
        </div>
    </div>
@endsection
