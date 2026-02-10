<?php $__env->startSection('title','Edition du Profile'); ?>

<!-- La barre de navigation -->
<?php echo $__env->make('navbar/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('navbar/mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto mt-5" >
                <h3 class="text-center text-muted mb-3 mt-4">Modifier mes informations</h3>

                <form method="POST" action="<?php echo e(route('app_profil_update',['user' => $user])); ?>" class="row g-3" id="form-modif-profil" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PATCH'); ?>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" rows="3" name="description" id="description" value="" placeholder="ecrire quelque sur toi ici..."  autocomplete="description"><?php echo e(old('description') ?? $user->profil->description); ?></textarea>
                        </div>
                        <small class="text-danger" id="desc_profil"></small>
                    </div>

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="lien" class="form-label">Mon lien</label>
                            <input class="form-control <?php $__errorArgs = ['lien'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="lien" name="lien" id="lien" value="<?php echo e(old('lien') ?? $user->profil->lien); ?>" placeholder="www.google.com"  autocomplete="lien">
                        </div>
                        <small class="text-danger" id="lien_profil"></small>
                    </div>

                    <div class="col-md-12">
                        <div class="input-group mb-3">
                            <input type="file" name="image" id="image" class="form-control <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> form-control">
                            <label class="input-group-text" for="image">Choisir une image</label>

                            <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <small class="invalid-feedback fw-bold" role="alert">
                                    <?php echo e($message); ?>

                                </small>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary" id="edit-profil">Valider mes informations</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\instagram\resources\views/profil/edit.blade.php ENDPATH**/ ?>