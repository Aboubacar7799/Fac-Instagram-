@extends('base')

@section('title', 'Messagerie')

@include('navbar.navbar')

@section('content')
    <br><br><br><br>
    @include('conversations.users', ['users' => $users, 'unread' => $unread])
@endsection
