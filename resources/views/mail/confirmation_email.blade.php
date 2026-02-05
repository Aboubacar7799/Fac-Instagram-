@extends('base')

@section('title','Activer Compte par le lien')

@section('content')
    <h3 class="fw-bold">Salut {{ $name }}, confirme ton email!</h3>
    <p>
        Voici le code de confirmation pour activer ton compte.
        <br> <h5 class="fw-bold">Activation code: {{ $activation_code }}</h5>.<br>
        Ou tu suis ce lien pour l'activer ton compte: <br>
        <a href="{{ route('app_activation_code_lien',['token' =>$activation_token]) }}" target="_blank">Confirme votre compte</a>
    </p>

    <p class="text-capitalize text-muted fw-bold text-center">Instagram de Wiz Fobic le codeur passionne.</p>
@endsection


