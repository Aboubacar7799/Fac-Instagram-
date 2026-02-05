@extends('base')

@section('title','Profile')

<!-- La barre de navigation -->
@include('navbar/navbar')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-4 text-center">
                <img src="{{ $user->profil->getImage() }}" alt="ça ne va pas hein" width="170" class="rounded-circle">
            </div>
            <div class="col-8" id="app">
                <div class="d-flex align-items-baseline">

                    <div class="h4 pt-2 fw-bolder" style="margin-right: 15px">{{ $user->name }}</div>

                    <a href="{{ route('app_conversations_show',$user->id) }}" class="btn btn-primary btn-sm">Messages</a>
                    {{-- followbuttun appeller depuis le component --}}
                    <followbutton user-id="{{$user->id}}" follows="{{ $follows }}" auth-id="{{ auth()->id() }}" />

                </div>

                <div class="d-flex mt-3">

                    <div style="margin-right: 15px"><a href="#publication" style="text-decoration: none"> <span class="fw-bold">{{ $postCount }}</span> publications</a></div>

                    <div style="margin-right: 15px"><a href="{{ route('app_relations_index',['tab' => 'followers']) }}" style="text-decoration: none"> <span class="fw-bold">{{ $followsCount }}</span> abonnés</a></div>

                    <div style="margin-right: 15px"><a href="{{ route('app_relations_index',['tab' => 'following']) }}" style="text-decoration: none"> <span class="fw-bold">{{ $followingCount }}</span> suivis</a></div>

                </div>

                <hr style="box-shadow: 3px; border-bottom: 1px solid rgba(rgb(124, 109, 109), rgb(182, 218, 182)69, 224, 169), rgb(147, 147, 170), 0.5)" style="margin-right: 100rem">

                {{-- Tu a le droit de voir ce button sauf si c'est ton compte--}}
                @can('update', $user->profil)
                    <a href="{{ route('app_profil_edit',['user' => $user->email]) }}" class="btn btn-outline-secondary mt-3">Modifier mes informations</a>
                @endcan

                <div class="mt-3">
                    <div class="fw-bolder">Ma Biographie</div>
                    <div>{{ $user->profil->description }}</div>
                    <div><a href="{{ $user->profil->lien }}" target="_blank">{{ $user->profil->lien }}</a></div>

                    @can('update', $user->profil)
                        <div class="mt-2"><a class="btn btn-outline-primary sm" href="{{ route('app_post_create') }}">Créer une publication</a></div>
                    @endcan

                </div>

            </div>
        </div>
        <hr style="box-shadow: 3px; border-bottom: 1px solid rgba(rgb(124, 109, 109), rgb(182, 218, 182)69, 224, 169), rgb(147, 147, 170), 0.5)">
        <div class="row mt-5" id="publication">

            @foreach ( $user->posts as $post )
                <div class="col-4 mb-3">
                    <a href="{{ route('app_affiche_image',['post' => $post->id]) }}"><img src="{{ $post->getImageUrl() }}" alt="Je la vois pas" class="w-100 h-100"></a>
                </div>
            @endforeach

        </div>
    </div>
@endsection
