<?php $__env->startSection('title','Register'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h1 class="text-center text-muted mb-3 mt-4">Créer votre compte</h1>
                <div class="d-flex justify-content-center mb-3">
                    <img src="<?php echo e(asset('assets/svg/birin.png')); ?>" width="75" height="75" class="text-center">
                </div>

                <form method="POST" action="<?php echo e(route('register')); ?>" class="row g-3" id="form-registre">
                    <?php echo csrf_field(); ?>

                    <div class="col-md-6">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input class="form-control" type="text" name="prenom" id="prenom" value="<?php echo e(old('prenom')); ?>"  autocomplete="prenom">
                        <small class="text-danger" id="error-register-prenom"></small>
                    </div>

                    <div class="col-md-6">
                        <label for="nom" class="form-label">Nom</label>
                        <input class="form-control" type="text" name="nom" id="nom" value="<?php echo e(old('nom')); ?>"  autocomplete="nom">
                        <small class="text-danger" id="error-register-nom"></small>
                    </div>

                    <div class="col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input class="form-control" type="email" name="email" id="email" value="<?php echo e(old('email')); ?>"  autocomplete="email" url-emailExist="<?php echo e(route('app_existe_email')); ?>" token="<?php echo e(csrf_token()); ?>">
                        <small class="text-danger" id="error-register-email"></small>
                    </div>

                    <div class="col-md-6">
                        <label for="password" class="form-label">Mot de Passe</label>
                        <input class="form-control" type="password" name="password" id="password" value="<?php echo e(old('password')); ?>"  autocomplete="password">
                        <small class="text-danger" id="error-register-password"></small>
                    </div>

                    <div class="col-md-6">
                        <label for="password-confirm" class="form-label">Confirmé Mot de Passe</label>
                        <input class="form-control" type="password" name="password-confirm" id="password-confirm" value="<?php echo e(old('password-confirm')); ?>"  autocomplete="password-confirm">
                        <small class="text-danger" id="error-register-password-confirm"></small>
                    </div>

                    <div class="col-md-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="terme" id="terme">
                            <label for="terme" class="form-check-label">Accepter les termes de conditions: </label><br>
                            <small class="text-danger" id="error-register-terme"></small>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary" id="register-user">S'inscrire</button>
                    </div>

                    <p class="text-muted text-center mt-4">Tu as déja un compte ? <a href="<?php echo e(route('login')); ?>">Login</a></p>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\instagram\resources\views/auth/register.blade.php ENDPATH**/ ?>