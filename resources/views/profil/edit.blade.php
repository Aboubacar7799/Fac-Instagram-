@extends('base')

@section('title','Edition du Profile')

<!-- La barre de navigation -->
@include('navbar/navbar')
@include('navbar/mobile')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto mt-5" >
                <h3 class="text-center text-muted mb-3 mt-4">Modifier mes informations</h3>

                <form method="POST" action="{{ route('app_profil_update',['user' => $user])}}" class="row g-3" id="form-modif-profil" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" rows="3" name="description" id="description" value="" placeholder="ecrire quelque sur toi ici..."  autocomplete="description">{{ old('description') ?? $user->profil->description}}</textarea>
                        </div>
                        <small class="text-danger" id="desc_profil"></small>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="lien" class="form-label">Mon lien</label>
                            <input class="form-control @error('lien') is-invalid @enderror" id="lien" name="lien" id="lien" value="{{ old('lien') ?? $user->profil->lien}}" placeholder="www.google.com"  autocomplete="lien">
                        </div>
                        <small class="text-danger" id="lien_profil"></small>
                    </div>

                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <input type="file" name="image" id="image" class="form-control @error('image') is-invalid @enderror form-control">
                            <label class="input-group-text" for="image">Choisir une image</label>

                            @error('image')
                                <small class="invalid-feedback fw-bold" role="alert">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary" id="edit-profil">Valider mes informations</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
