<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from jobick.dexignlab.com/cakephp/demo/jobick-admin/page-login by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Dec 2023 15:19:07 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<title>{{ config('app.name') }} -> Login</title>

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
            <h4 class="text-center mb-4">Authentification</h4>
            {{-- on inclu le fichier qui contient les erreurs de toutes categorie --}}
                @include('alerts.alert-message')

                <form method="POST" action="{{ route('login')}}">
                    @csrf

                    @error('email')
                        <div class="alert alert-danger text-center" role="alert">
                            Login ou mot de passe incorrect
                        </div>
                    @enderror

                    @error('password')
                        <div class="alert alert-danger text-center" role="alert">
                            Login ou mot de passe incorrect
                        </div>
                    @enderror


                <div class="form-group mb-4">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" class="form-control" placeholder="Enter email" id="email" value="{{old('email')}}">
                </div>

                <div class="mb-sm-4 mb-3 position-relative">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" class="form-control">
                    <span class="show-pass eye">
                        <i class="fa fa-eye-slash"></i>
                        <i class="fa fa-eye"></i>
                    </span>
                </div>
                <div class="form-row d-flex flex-wrap justify-content-between mb-2">
                    <div class="form-group mb-sm-4 mb-1">
                        <div class="form-check custom-checkbox ms-1">
                            <input type="checkbox" class="form-check-input" name="souvenir" id="souvener" value="{{ old('souvener') ? 'checked' :'' }}">
                            <label class="form-check-label" for="souvener">souvener de moi</label>
                        </div>
                    </div>
                    <div class="form-group ms-2">
                        <a class="text-hover" href="{{ route('app_password_oublier') }}">mot de passe oublié ?</a>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block">Se connecté</button>
                </div>
            </form>
            <div class="new-account mt-3">
                <p>Tu n'as pas de compte ? <a class="text-primary" href="{{ route('register')}}">S'inscrire</a></p>
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
</body>
</html>