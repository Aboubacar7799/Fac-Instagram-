@extends('base')

@section('title', 'À propos')

<!-- La barre de navigation -->
@include('navbar/navbar')
@include('navbar/mobile')

@section('content')
<div class="container mt-4">
    <h3>À propos de moi</h3>

    <p>
        Développeur web passionné, spécialisé Laravel, Django. Orienté
        résolution de problèmes digital et applications modernes.
    </p>

    <div>
        Vous pouvez télécharger mon CV pour en savoir plus sur mon parcours, mes compétences et mes expériences.
        <a href="{{ asset('cv/Mon curriculum.pdf') }}" class="btn btn-outline-primary" download>
            
           Télécharger mon CV (PDF)
        </a>
    </div>
</div>
@endsection