@extends('base')

@section('title','Initialisation du Password')

@section('content')
    <h3 class="fw-bold">Salut {{ $name }}, Initialise ton mot de passe!</h3>
    <p>
        On ta envoyé une requête de changement de mot de passe.
        Si tu n'es pas à l'origine de cette requête, informe nous pour la securité de ton compte
        <br> Si tu es à l'origine, click sur ce lien pour l'initialisation de ton mot de passe<br>
        <a href="{{ route('app_change_password',['token' =>$activation_token]) }}" target="_blank">Initialise ton mot de passe</a>
    </p>

    <p class="text-capitalize text-muted fw-bold text-center">Instagram de Wiz Fobic le codeur passionne.</p>
@endsection
