<div class="col-md-3">
    <div class="list-group">
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a class="list-group-item d-flex justify-content-between align-items-center"
                href="<?php echo e(route('app_conversations_show', $user->id)); ?>">
                <?php echo e($user->name); ?>


                <?php if(isset($unread[$user->id])): ?>
                    <span class="badge badge-pill badge-warning">
                        <?php echo e($unread[$user->id]); ?>

                    </span>
                <?php endif; ?>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\instagram\resources\views/conversations/users.blade.php ENDPATH**/ ?>