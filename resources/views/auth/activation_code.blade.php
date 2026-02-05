@extends('base')

@section('title','Activer Compte')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto mt-5">
                <h1 class="text-center text-muted mb-3 mt-5">Activation du compte</h1>

                {{-- on inclu le fichier qui contient les erreurs de toutes categorie --}}
                @include('alerts.alert-message')

                <form action="{{ route('app_activation_code',['token'=>$token]) }}" method="post">
                    @csrf
                    <label for="activation_code" class="form-label fw-bold">Activation code :</label>
                    <input
                            type="text"
                            name="activation_code"
                            class="form-control @if(Session::has('danger')) is-invalid @endif"
                            id="activation_code"
                            value="@if(Session::has('activation_code')) {{ Session::get('activation_code') }} @endif" placeholder="saisi le code ici..." autofocus>

                    <div class="row mt-3">
                        <div class="col-md-6 text-start"><a href="{{ route('app_renvoi_code_activation',['token' => $token]) }}">Renvoyer le code</a></div>

                        <div class="col-md-6 text-end"><a href="{{ route('app_activation_code_changer_email',['token' =>$token]) }}">Changer l'email</a></div>
                    </div>

                    <div class="d-grid gap-2 mt-3">
                        <button type="submit" class="btn btn-primary">Activer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
