<div class="card-footer">
    <form action="<?php echo e(route('app_conversations_store', $user->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="input-group" >
            <textarea name="content"
                      class="form-control rounded-3 <?php echo e($errors->has('content') ? 'is-invalid' : ''); ?> "
                      placeholder="Écris ton message..."></textarea>

                      <button class="btn btn-success">Envoyer</button>
                    </div>


        <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <div class="invalid-feedback d-block">
                <?php echo e($message); ?>

            </div>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
    </form>
</div><?php /**PATH C:\xampp\htdocs\instagram\resources\views/conversations/partials/form.blade.php ENDPATH**/ ?>