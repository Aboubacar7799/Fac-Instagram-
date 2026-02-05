<nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm" id="navbar">
    <div class="container">

        <a class="navbar-brand" href="{{ route('app_post_index') }}">
            <img src="{{ asset('assets/svg/instagram.svg') }}" width="40"
                style="border-right:2px solid #333;padding-right:10px;">
            <span style="padding-left:10px;">{{ config('app.name') }}</span> </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu"
            aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse pl-5" id="navbarMenu">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link @if (Request::route()->getName() == 'app_post_index') active @endif"
                        href="{{ route('app_post_index') }}">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link @if (Request::route()->getName() == 'app_relations_index') active @endif"
                        href="{{ route('app_relations_index') }}"> Mes amis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link @if (Request::route()->getName() == 'index') active @endif"
                        href="{{ route('index') }}"> Messages</a>
                </li>
                
            </ul>
        </div>

        <!-- La partie est visible si tu n'es pas connecter, Pour s'enregistrer si tu n'est pas connecter -->
        @guest
            <ul class="navbar-nav">
                <a class="nav-item nav-link" href="{{ route('login') }}">
                    <span class="text-white fw-bold"> Login </span>&nbsp;
                </a>
                <a class="nav-item nav-link" href="{{ route('register') }}">
                    <span class="text-white fw-bold"> s'inscrire </span>&nbsp;
                </a>
            </ul>
        @endguest
        {{-- et là si tu est connecté --}}
        @auth
            <ul class="navbar-nav">
                <a class="nav-item nav-link text-white fw-bold"
                    href="{{ route('app_profil', ['user' => auth()->user()]) }}">
                    Profile &nbsp;
                </a>

                <a class="nav-item nav-link text-white fw-bold" href="{{ route('app_logout') }}">
                    Deconnexion &nbsp;
                </a>

            </ul>
        @endauth
    </div>
</nav>
