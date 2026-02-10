@extends('base')

@section('title', 'Contact')

<!-- La barre de navigation -->
@include('navbar/mobile')
@include('navbar/navbar')

@section('content')
    <div class="container mt-4">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div>
            <h2 class="mb-3 text-uppercase">Contactez-moi</h2>
            <h3 class="text-muted ">Avez-vous un projet, une opportunité ou une question à me posé ?</h3>
            <h4 class="text-muted">N'hésitez pas à me contacter, par l'un de ces réseau social ou à consulter
                mon curriculum vitae dans l'onglet à propos.</h4>
        </div>


        <div class="contact-list">
            <row class="">

                {{-- WhatsApp --}}
                <a href="https://wa.me/224625423650?text=Bonjour%20je%20souhaite%20vous%20contacter" target="_blank"
                    class="contact-item whatsapp">
                    <div class="left">
                        <i class="fa-brands fa-whatsapp fa-lg me-3"></i>
                        <span>WhatsApp</span>
                    </div>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

                {{-- Email Gmail --}}
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=fodeaboubacar1997@email.com&su=Contact&body=Bonjour"
                    target="_blank" class="contact-item email">
                    <div class="left">
                        <i class="fa-solid fa-envelope fa-lg me-3"></i>
                        <span>Email</span>
                    </div>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

                {{-- Facebook Messenger --}}
                <a href="https://m.me/aboubacarfobic.camara.73325" target="_blank" class="contact-item messenger">
                    <div class="left">
                        <i class="fa-brands fa-facebook-messenger fa-lg me-3"></i>
                        <span>Messenger</span>
                    </div>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

                {{-- Instagram --}}
                <a href="https://www.instagram.com/direct/t/aboubacarfobic.camara.73325/" target="_blank"
                    class="contact-item instagram">
                    <div class="left">
                        <i class="fa-brands instagram fa-lg me-3"></i>
                        <span>Instagram</span>
                    </div>
                    <i class="fa-brands fa-arrow-right"></i>
                </a>

                {{-- LinkedIn --}}
                <a href="https://www.linkedin.com/in/fode-aboubacar-camara-84a624378/" target="_blank"
                    class="contact-item linkedin">
                    <div class="left">
                        <i class="fa-brands fa-linkedin fa-lg me-3"></i>
                        <span>LinkedIn</span>
                    </div>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

                {{-- Telegram --}}
                <a href="https://t.me/@Wizbut?text=Bonjour%20je%20souhaite%20vous%20contacter" target="_blank"
                    class="contact-item telegram">
                    <div class="left">
                        <i class="fa-brands fa-telegram fa-lg me-3"></i>
                        <span>Telegram</span>
                    </div>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

                <a href="tel:+224625423650" class="contact-item phone">
                    <div class="left">
                        <i class="fa-solid fa-phone fa-lg me-3"></i>
                        <span>Appel téléphonique</span>
                    </div>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

                <a href="sms:+224625423650" class="contact-item message">
                    <div class="left">
                        <i class="fa-solid fa-message fa-lg me-3"></i>
                        <span>Envoyer un SMS</span>
                    </div>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>


            </row>

        </div>

    </div>
@endsection
