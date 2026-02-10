<?php $__env->startSection('title','Login'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h1 class="text-center text-muted mb-3 mt-5">AUTHENTIFICATION</h1>
                <div class="d-flex justify-content-center mb-3">
                    <img src="<?php echo e(asset('assets/svg/birin.png')); ?>" width="100" height="100" class="text-center">
                </div>

                
                <?php echo $__env->make('alerts.alert-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger text-center" role="alert">
                            Login ou mot de passe incorrect
                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="alert alert-danger text-center" role="alert">
                            Login ou mot de passe incorrect
                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <label class="form-label" for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control mb-3" value="<?php echo e(old('email')); ?>" placeholder="email" autocomplete="email" autofocus required>

                    <label class="form-label" for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control mb-3" placeholder="Password" required>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="souvener" id="souvener" role="switch" value="<?php echo e(old('souvener') ? 'checked' :''); ?>">
                                <label for="souvener" class="form-check-label">souvener de moi</label>
                            </div>
                        </div>

                        <div class="col-md-6 text-end">
                        <a href="<?php echo e(route('app_password_oublier')); ?>">mot de passe oublié</a>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Se connecté</button>
                    </div>

                    <p class="text-muted text-center mt-5">Tu n'as pas de compte ? <a href="<?php echo e(route('register')); ?>">S'inscrire</a></p>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\instagram\resources\views/auth/login.blade.php ENDPATH**/ ?>