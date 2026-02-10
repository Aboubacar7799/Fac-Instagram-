@extends('base')

@section('title','Changer le Password')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h3 class="text-center text-muted text-capitalize mb-3 mt-5">Changement du Mot de passe</h3>

                {{-- on inclu le fichier qui contient les erreurs de toutes categorie --}}
                @include('alerts.alert-message')

                <form method="POST" action="{{ route('app_change_password',['token' => $activation_token])}}" id="form-changer-pwd">
                    @csrf
                    <div class="">
                        <label for="new-pwd" class="form-label mt-5">Nouveau Mot de Passe :</label>
                        <input
                            type="password" name="new-pwd" id="new-pwd"
                            class="form-control mb-3"
                            value="@if(Session::has('new-pwd')){{ Session::get('new-pwd') }} @endif" required>
                        <small class="text-danger" id="error-change-password"></small>
                    </div>

                    <div class="">
                        <label for="confirm-pwd" class="form-label">Confirme le Mot de Passe :</label>
                        <input
                            type="password" name="confirm-pwd" id="confirm-pwd"
                            class="form-control"
                            value="@if(Session::has('new-pwd-confirm')){{ Session::get('new-pwd-confirm') }} @endif" required>
                        <small class="text-danger" id="error-change-password-confirm"></small>
                    </div>
                    <div class="d-grid gap-2 mt-3 mb-5">
                        <button type="submit" class="btn btn-primary" id="changerSubmit">Changer le Password</button>
                    </div>

                    <p class="text-center text-muted">
                        Retour à <a href="{{ route('login') }}">login</a>
                    </p>

                </form>
            </div>
        </div>
    </div>
@endsection
