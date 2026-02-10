@extends('base')

@section('title','Liste des Followings')

<!-- La barre de navigation -->
@include('navbar/navbar')
@include('navbar/mobile')

@section('content')

    <div class="container mt-5">
        @foreach ($profils as $profil)

            {{-- Image et Date de Postulation --}}
            <div class="row">
                <div class="col-6 offset-3 mb-3">
                    <div>
                        <a href="#">
                            <img src="{{ asset('storage').'/'.$profil->image }}" class="rounded-circle w-25">
                        </a>
                        
                       <strong class="size-3">{{ $profil->user->name }}</strong>

                        {{-- <div class="col-8" id="app"> --}}
                            {{-- followbuttun appeller depuis le component --}}
                            {{-- <followbutton profil-id="{{$profil->u->id}}" follows="{{ $follows }}" />
                        </div> --}}

                
                    </div>
                </div>
            </div>
        
        @endforeach

    </div>
@endsection
