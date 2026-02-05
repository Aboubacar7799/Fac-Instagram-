@extends('base')

@section('title','Register')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h1 class="text-center text-muted mb-3 mt-4">Créer votre compte</h1>
                <p class="text-center text-muted mb-5">si vous n'avez pas de compte, inscrit-toi</p>

                <form method="POST" action="{{ route('register')}}" class="row g-3" id="form-registre">
                    @csrf

                    <div class="col-md-6">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input class="form-control" type="text" name="prenom" id="prenom" value="{{ old('prenom')}}"  autocomplete="prenom">
                        <small class="text-danger" id="error-register-prenom"></small>
                    </div>

                    <div class="col-md-6">
                        <label for="nom" class="form-label">Nom</label>
                        <input class="form-control" type="text" name="nom" id="nom" value="{{ old('nom')}}"  autocomplete="nom">
                        <small class="text-danger" id="error-register-nom"></small>
                    </div>

                    <div class="col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" type="email" name="email" id="email" value="{{ old('email')}}"  autocomplete="email" url-emailExist="{{ route('app_existe_email')}}" token="{{ csrf_token() }}">
                        <small class="text-danger" id="error-register-email"></small>
                    </div>

                    <div class="col-md-6">
                        <label for="password" class="form-label">Mot de Passe</label>
                        <input class="form-control" type="password" name="password" id="password" value="{{ old('password')}}"  autocomplete="password">
                        <small class="text-danger" id="error-register-password"></small>
                    </div>

                    <div class="col-md-6">
                        <label for="password-confirm" class="form-label">Confirmé Mot de Passe</label>
                        <input class="form-control" type="password" name="password-confirm" id="password-confirm" value="{{ old('password-confirm')}}"  autocomplete="password-confirm">
                        <small class="text-danger" id="error-register-password-confirm"></small>
                    </div>

                    <div class="col-md-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="terme" id="terme">
                            <label for="terme" class="form-check-label">Accepter les termes de conditions: </label><br>
                            <small class="text-danger" id="error-register-terme"></small>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary" id="register-user">S'inscrire</button>
                    </div>

                    <p class="text-muted text-center mt-4">Tu as déja un compte ? <a href="{{ route('login')}}">Login</a></p>
                </form>
            </div>
        </div>
    </div>
@endsection
