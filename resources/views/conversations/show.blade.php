@extends('base')

@section('title', 'Messagerie')

@include('navbar.navbar')
@include('navbar/mobile')

@section('content')
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-8 col-lg-8">
                <div class="card h-100">
                    <div class="card-header fw-bold text-center">
                        {{ $user->name }}
                    </div>

                    @include('conversations.partials.messages')

                    @include('conversations.partials.form')
                </div>
            </div>
        </div>
    </div>
@endsection
