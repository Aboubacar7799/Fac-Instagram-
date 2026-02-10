<?php $__env->startSection('title','Activer Compte'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto mt-5">
                <h1 class="text-center text-muted mb-3 mt-5">Activation du compte</h1>

                
                <?php echo $__env->make('alerts.alert-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <form action="<?php echo e(route('app_activation_code',['token'=>$token])); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <label for="activation_code" class="form-label fw-bold">Activation code :</label>
                    <input
                            type="text"
                            name="activation_code"
                            class="form-control <?php if(Session::has('danger')): ?> is-invalid <?php endif; ?>"
                            id="activation_code"
                            value="<?php if(Session::has('activation_code')): ?> <?php echo e(Session::get('activation_code')); ?> <?php endif; ?>" placeholder="saisi le code ici..." autofocus required>

                    <div class="row mt-3">
                        <div class="col-md-6 text-start"><a href="<?php echo e(route('app_renvoi_code_activation',['token' => $token])); ?>">Renvoyer le code</a></div>

                        <div class="col-md-6 text-end"><a href="<?php echo e(route('app_activation_code_changer_email',['token' =>$token])); ?>">Changer l'email</a></div>
                    </div>

                    <div class="d-grid gap-2 mt-3">
                        <button type="submit" class="btn btn-primary">Activer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\instagram\resources\views/auth/activation_code.blade.php ENDPATH**/ ?>