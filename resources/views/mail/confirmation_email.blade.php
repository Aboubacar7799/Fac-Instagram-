@extends('base')

@section('title','Activer Compte par le lien')

@section('content')
    <h3 class="fw-bold">Salut {{ $name }}, confirmation de l'adresse email!</h3>
    <p>
        Voici le code de confirmation pour activer ton compte sur la plate forme BIRIN.
        <br> <h5 class="fw-bold">Activation code: {{ $activation_code }}</h5>.<br>
        Ou tu suis ce lien pour l'activer votre compte sur BIRIN: <br>
        <a href="{{ route('app_activation_code_lien',['token' =>$activation_token]) }}" target="_blank">Confirme votre compte</a>
    </p>

    <p class="text-capitalize text-muted fw-bold text-center"> BIRIN est une plate Réseau Social développé par Fodé Aboubacar Camara.</p>
@endsection


