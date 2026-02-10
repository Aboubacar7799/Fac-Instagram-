{{-- navbar/mobile.blade.php --}}
<nav class="d-md-none bg-white border-top">
    <div class="d-flex justify-content-around align-items-center py-2">
        <a class="navbar-brand" href="{{ route('app_post_index') }}">
            <img src="{{ asset('assets/svg/birin.png') }}" width="50"
                style="border-right:2px solid #333;padding-right:10px;">
            <span style="padding-left:2px;" class="fw-bold">{{ config('app.name') }}</span> </a>

        {{-- Home --}}
        <a href="{{ route('app_post_index') }}">
            <i class="fa-solid fa-house text-secondary"></i>
        </a>

        {{-- Amis --}}
        <a href="{{ route('app_relations_index', ['user' => auth()->user()->id]) }}">
            <i class="fa-solid fa-user-group text-secondary"></i>
        </a>

        {{-- Messages --}}
        <a href="{{ route('index') }}" class="position-relative">
            <i class="fa-solid fa-comment text-secondary"></i>
            @if ($unreadMessagesCount->sum() > 0)
                <span class="position-absolute top-5 translate-middle rounded-pill bg-danger fobic"></span>
            @endif
        </a>

        {{-- Notifications --}}
        <a href="{{ route('notifications.index') }}" class="position-relative">
            <i class="fa-solid fa-bell text-secondary"></i>
            @if ($unreadNotificationsCount > 0)
                <span
                    class="position-absolute top-5 start-75 translate-middle badge rounded-pill bg-danger">{{ $unreadNotificationsCount }}</span>
            @endif

        </a>

        {{-- Menu --}}
        <button data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
            <i class="fa-solid fa-ellipsis-vertical"></i>
        </button>

    </div>
</nav>


<div class="offcanvas offcanvas-end" id="mobileMenu">
    <div class="offcanvas-header">
        <h5>Menu</h5>
        <button class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body">
        <a href="{{ route('app_profil', ['user' => auth()->user()]) }}"
            class="d-block mb-3 text-decoration-none dropdown-item">
            <i class="fa-solid fa-user"></i> Profil
        </a>

        <a href="{{ route('app_about') }}" class="d-block mb-3 text-decoration-none dropdown-item">
            <i class="fa-solid fa-circle-info"></i> <span>A propos</span>
        </a>

        <a href="{{ route('app_contact_index') }}" class="d-block mb-3 text-decoration-none dropdown-item">
            <i class="fa-solid fa-envelope"></i> Contact
        </a>

        <hr>

        <a class="d-block mb-3 text-decoration-none" href="{{ route('app_logout') }}">
            <i class="fa-solid fa-right-from-bracket"></i> Déconnexion &nbsp;
        </a>
    </div>
    <div class="row fixed-bottom m-4 text-muted">
        <div>BIRIN Copyright © {{ date('Y') }} | Developpé par l'equipe Heluxix</div>
    </div>

</div>
