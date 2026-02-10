@extends('base')

@section('title', 'Contact')

<!-- La barre de navigation -->
@include('navbar/navbar')

@section('content')
    <div class="container mt-4">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div>
            <h2>Contactez-moi</h2>
            <h3>Avez-vous un projet, une opportunité ou une question ?</h3>
            <h4>N'hésitez pas à me contacter, en enregistrant vos informations dans ce formulaire de contact ou à consulter mon curriculum vitae dans l'onglet à propos.</h4>
        </div>

        <form method="POST" action="{{ route('app_contact_store') }}">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="text" name="prenom" class="form-control @error('prenom') is-invalid @enderror solid"
                        placeholder="Prénom" value="{{ old('prenom') }}">
                </div>

                <div class="col-md-6 mb-3">
                    <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror"
                        placeholder="Nom" value="{{ old('nom') }}">
                </div>
            </div>

            <div class="mb-3">
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Email" value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <input type="text" name="sujet" class="form-control @error('sujet') is-invalid @enderror"
                    placeholder="Sujet" value="{{ old('sujet') }}">
            </div>

            <div class="mb-3">
                <textarea name="message" class="form-control @error('message') is-invalid @enderror" rows="5"
                    placeholder="Message" value="{{ old('message') }}"></textarea>
            </div>

            <button class="btn btn-success">Envoyer</button>
        </form>

    </div>
@endsection
