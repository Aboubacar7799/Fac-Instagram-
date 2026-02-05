@extends('base')

@section('title','Mot de passe Oublier')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h1 class="text-center text-muted text-capitalize mb-3 mt-5">mot de passe oublier</h1>
                <p class="text-center text-muted mb-5">Renseigne ton adresse email pour recuperer ton mot de passe</p>

                {{-- on inclu le fichier qui contient les erreurs de toutes categorie --}}
                @include('alerts.alert-message')

                <form method="POST" action="{{route('app_password_oublier')}}">
                    @csrf

                    <label for="envoi_email" class="form-label fw-bold">Email :</label>
                    <input
                        type="email" name="envoi_email" id="envoi_email"
                        class="form-control  @error('email-success')) is-valid @enderror  @error('email-error')) is-invalid @enderror"
                        value="@if(Session::has('old-email')) {{ Session::get('old-email') }} @endif" placeholder="saisi l'email ici..." autofocus>

                    <div class="d-grid gap-2 mt-3 mb-5">
                        <button type="submit" class="btn btn-primary">Initialisé le mot de passe</button>
                    </div>

                    <p class="text-center text-muted">
                        Retour à <a href="{{ route('login') }}">login</a>
                    </p>

                </form>
            </div>
        </div>
    </div>
@endsection
