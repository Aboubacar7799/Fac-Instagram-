

<?php $__env->startSection('title', 'Contact'); ?>

<!-- La barre de navigation -->
<?php echo $__env->make('navbar/mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('navbar/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div>
            <h2 class="mb-3 text-uppercase">Contactez-moi</h2>
            <h3 class="text-muted ">Avez-vous un projet, une opportunité ou une question à me posé ?</h3>
            <h4 class="text-muted">N'hésitez pas à me contacter, par l'un de ces réseau social ou à consulter
                mon curriculum vitae dans l'onglet à propos.</h4>
        </div>


        <div class="contact-list">
            <row class="">

                
                <a href="https://wa.me/224625423650?text=Bonjour%20je%20souhaite%20vous%20contacter" target="_blank"
                    class="contact-item whatsapp">
                    <div class="left">
                        <i class="fa-brands fa-whatsapp fa-lg me-3"></i>
                        <span>WhatsApp</span>
                    </div>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

                
                <a href="https://mail.google.com/mail/?view=cm&fs=1&to=fodeaboubacar1997@email.com&su=Contact&body=Bonjour"
                    target="_blank" class="contact-item email">
                    <div class="left">
                        <i class="fa-solid fa-envelope fa-lg me-3"></i>
                        <span>Email</span>
                    </div>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

                
                <a href="https://m.me/aboubacarfobic.camara.73325" target="_blank" class="contact-item messenger">
                    <div class="left">
                        <i class="fa-brands fa-facebook-messenger fa-lg me-3"></i>
                        <span>Messenger</span>
                    </div>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

                
                <a href="https://www.instagram.com/direct/t/aboubacarfobic.camara.73325/" target="_blank"
                    class="contact-item instagram">
                    <div class="left">
                        <i class="fa-brands instagram fa-lg me-3"></i>
                        <span>Instagram</span>
                    </div>
                    <i class="fa-brands fa-arrow-right"></i>
                </a>

                
                <a href="https://www.linkedin.com/in/fode-aboubacar-camara-84a624378/" target="_blank"
                    class="contact-item linkedin">
                    <div class="left">
                        <i class="fa-brands fa-linkedin fa-lg me-3"></i>
                        <span>LinkedIn</span>
                    </div>
                    <i class="fa-solid fa-arrow-right"></i>
                </a>

                
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\instagram\resources\views/contact/index.blade.php ENDPATH**/ ?>