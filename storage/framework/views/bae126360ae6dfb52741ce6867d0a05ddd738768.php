<?php $__env->startSection('title','Changer l\'adresse Email'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto mt-5">
                <h2 class="text-center text-muted mb-3 mt-5">Changer l'adresse email</h2>

                
                <?php echo $__env->make('alerts.alert-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <form action="<?php echo e(route('app_activation_code_changer_email',['token'=>$token])); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <label for="changer_email" class="form-label fw-bold">Nouvel email :</label>
                    <input
                            type="email" name="changer_email" id="changer_email"
                            class="form-control <?php if(Session::has('danger')): ?> is-invalid <?php endif; ?>"
                            value="<?php if(Session::has('changer_email')): ?> <?php echo e(Session::get('changer_email')); ?> <?php endif; ?>" placeholder="saisi l'email ici..." autofocus required>

                    <div class="d-grid gap-2 mt-3">
                        <button type="submit" class="btn btn-primary">Valider l'email</button>
                    </div>

                    <p class="text-center text-muted mt-4">
                        Retour à <a href="<?php echo e(route('app_activation_code',['token' =>$token])); ?>">l'activation code</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\instagram\resources\views/auth/activation_code_changer_email.blade.php ENDPATH**/ ?>