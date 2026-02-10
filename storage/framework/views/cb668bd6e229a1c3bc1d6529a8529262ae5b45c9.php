<?php $__env->startSection('title','Mot de passe Oublier'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h1 class="text-center text-muted text-capitalize mb-3 mt-5">mot de passe oublier</h1>
                <p class="text-center text-muted mb-5">Renseigne ton adresse email pour recuperer ton mot de passe</p>

                
                <?php echo $__env->make('alerts.alert-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <form method="POST" action="<?php echo e(route('app_password_oublier')); ?>">
                    <?php echo csrf_field(); ?>

                    <label for="envoi_email" class="form-label fw-bold">Email :</label>
                    <input
                        type="email" name="envoi_email" id="envoi_email"
                        class="form-control  <?php $__errorArgs = ['email-success'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>) is-valid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>  <?php $__errorArgs = ['email-error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>) is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        value="<?php if(Session::has('old-email')): ?> <?php echo e(Session::get('old-email')); ?> <?php endif; ?>" placeholder="saisi l'email ici..." autofocus required>

                    <div class="d-grid gap-2 mt-3 mb-5">
                        <button type="submit" class="btn btn-primary">Initialisé le mot de passe</button>
                    </div>

                    <p class="text-center text-muted">
                        Retour à <a href="<?php echo e(route('login')); ?>">login</a>
                    </p>

                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\instagram\resources\views/auth/password_oublier.blade.php ENDPATH**/ ?>