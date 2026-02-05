@extends('base')

@section('title','Messagerie | Show')

@include('navbar.navbar')

@section('content')
<br><br><br><br>
    <div class="row">
        @include('conversations.users',['users' => $users, 'unread' => $unread])
        <div class="col-md-5">
            <div class="card">
                <div class="card-header text-black"><strong>{{ $user->name }}</strong></div>
                <div class="card-body">

                    {{-- pour voir les messages précedents --}}
                    @if ($messages->hasMorePages())
                        <div class="text-center">
                            <a href="{{ $messages->nextPageUrl() }} " class="btn btn-light">
                                voir les messages précedents
                            </a>
                        </div>
                    @endif

                    @foreach (array_reverse($messages->items()) as $message)
                        <div class="row">
                            <div class="col-md-10 {{ $message->from->id !== $user->id ? 'offset-md-8 text-right' : '' }}">
                                <p>
                                    <strong class="text-black">{{$message->from->id !== $user->id ? 'Moi' : $message->from->name }}</strong><br>
                                    {{ $message->content  }}
                                </p>
                            </div>
                        </div>
                        <hr>
                    @endforeach

                    {{-- pour voir les messages suivants --}}
                    @if ($messages->hasMorePages())
                        <div class="text-center">
                            <a href="{{ $messages->previousPageUrl() }} " class="btn btn-light">
                                voir les messages précedents
                            </a>
                        </div>
                    @endif

                    <form action="{{ route('app_conversations_store', $user->id) }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">

                            <textarea name="content" class="form-control {{ $errors->has('content') ? 'is-invalid' : '' }}" placeholder="Saisi le message"></textarea>

                            @if ($errors->has('content'))
                                <div class="invalid-feedback">
                                    {{ implode(',', $errors->get('content')) }}
                                </div>
                            @endif

                            <button class="btn btn-primary mt-3" type="submit">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection