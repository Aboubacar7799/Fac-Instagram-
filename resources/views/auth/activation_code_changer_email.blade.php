@extends('base')

@section('title','Changer l\'adresse Email')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto mt-5">
                <h2 class="text-center text-muted mb-3 mt-5">Changer l'adresse email</h2>

                {{-- on inclu le fichier qui contient les erreurs de toutes categorie --}}
                @include('alerts.alert-message')

                <form action="{{ route('app_activation_code_changer_email',['token'=>$token]) }}" method="post">
                    @csrf
                    <label for="changer_email" class="form-label fw-bold">Nouvel email :</label>
                    <input
                            type="email" name="changer_email" id="changer_email"
                            class="form-control @if(Session::has('danger')) is-invalid @endif"
                            value="@if(Session::has('changer_email')) {{ Session::get('changer_email') }} @endif" placeholder="saisi l'email ici..." autofocus required>

                    <div class="d-grid gap-2 mt-3">
                        <button type="submit" class="btn btn-primary">Valider l'email</button>
                    </div>

                    <p class="text-center text-muted mt-4">
                        Retour à <a href="{{ route('app_activation_code',['token' =>$token]) }}">l'activation code</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
