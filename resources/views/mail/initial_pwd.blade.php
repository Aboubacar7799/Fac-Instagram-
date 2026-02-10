@extends('base')

@section('title','Initialisation du Password')

@section('content')
    <h3 class="fw-bold">Salut {{ $name }}, Initialisation du mot de passe!</h3>
    <p>
        On t'as envoyé une requête de changement du mot de passe.
        Si tu n'es pas à l'origine de cette requête, informe nous pour la securité de ton compte
        <br> Si tu es à l'origine, click sur ce lien pour l'initialisation de ton mot de passe<br>
        <a href="{{ route('app_change_password',['token' =>$activation_token]) }}" target="_blank">Initialise ton mot de passe</a>
    </p>

    <p class="text-capitalize text-muted fw-bold text-center">BIRIN est une plate Réseau Social développé par Fodé Aboubacar Camara.</p>
@endsection
