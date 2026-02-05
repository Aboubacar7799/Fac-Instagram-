<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jobick.dexignlab.com/cakephp/demo/jobick-admin/page-login by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Dec 2023 15:19:07 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<title>{{ config('app.name') }} -> S'inscrire</title>

<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{ asset('demo/css/style.css') }}" class="main-css">	
    <link href="{{ asset('demo/images/favicon.png') }}" type="" rel="icon">
    <link href="{{ asset('demo/images/favicon.png') }}" type="" rel="shortcut icon"></head>

<body>
<div class="fix-wrapper">
	<div class="container">
		<div class="row justify-content-center">
				<div class="col-lg-5 col-md-6">
    <div class="card mb-0 h-auto">
        <div class="card-body">
            <div class="text-center mb-3">
                <img class="logo-auth" src="{{ asset('demo/images/logo-full.png') }}" alt="">
            </div>
            <h4 class="text-center mb-4">Créer votre compte</h4>

            <form method="POST" action="{{ route('register')}}" class="row g-3" id="form-registre">
                @csrf

                <div class="form-group mb-4">
                    <label class="form-label" for="prenom">Prénom</label>
                    <input type="text" class="form-control" placeholder="Aboubacar" name="prenom" id="prenom" value="{{ old('prenom')}}">
                    <small class="text-danger" id="error-register-prenom"></small>
                </div>

                <div class="form-group mb-4">
                    <label class="form-label" for="nom">Nom</label>
                    <input type="text" class="form-control" placeholder="Camara" name="nom" id="nom" value="{{ old('nom')}}">
                    <small class="text-danger" id="error-register-nom"></small>
                </div>

                <div class="form-group mb-4">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" class="form-control" placeholder="camara@gmail.com" name="email" id="email" value="{{ old('email')}}" url-emailExist="{{ route('app_existe_email')}}" token="{{ csrf_token() }}">
                    <small class="text-danger" id="error-register-email"></small>
                </div>

                <div class="mb-sm-4 mb-3 position-relative">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" value="{{ old('password')}}">
                    <span class="show-pass eye">
                        <i class="fa fa-eye-slash"></i>
                        <i class="fa fa-eye"></i>
                    </span>
                    <small class="text-danger" id="error-register-password"></small>
                </div>

                <div class="mb-sm-4 mb-3 position-relative">
                    <label class="form-label" for="password-confirm">Confirmé Mot de Passe</label>
                    <input type="password" id="password-confirm" class="form-control" name="password-confirm" value="{{ old('password-confirm')}}">
                    <span class="show-passs eye">
                        <i class="fa fa-eye-slash"></i>
                        <i class="fa fa-eye"></i>
                    </span>
                    <small class="text-danger" id="error-register-password-confirm"></small>
                </div>

                <div class="col-md-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="terme" id="terme">
                        <label for="terme" class="form-check-label">Accepter les termes de conditions: </label><br>
                        <small class="text-danger" id="error-register-terme"></small>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block" id="register-user">S'inscrire</button>
                </div>
            </form>
            <div class="new-account mt-3">
                <p>Tu as déja un compte ? <a class="text-primary" href="{{ route('login')}}">Login</a></p>
            </div>
        </div>
    </div>
</div>		</div>
	</div>
</div>
<script src="{{ asset('demo/vendor/global/global.min.js') }}"></script>	
<script src="{{ asset('demo/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>	
<script src="{{ asset('demo/js/custom.min.js') }}"></script>	
<script src="{{ asset('demo/js/dlabnav-init.js') }}"></script>	
<script src="{{ asset('demo/js/demo.js') }}"></script>	
<script src="{{ asset('demo/js/styleSwitcher.js') }}"></script>
<script src="{{ asset('assets/javaUser/user.js') }}"></script>
</body>

</html>