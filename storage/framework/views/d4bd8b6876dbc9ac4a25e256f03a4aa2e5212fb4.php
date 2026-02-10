 

<div class="col-md-4 col-lg-3 border-end">
    <div class="list-group list-group-flush">
        <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $conversationUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <a href="<?php echo e(route('app_conversations_show', $conversationUser->id)); ?>"
               class="list-group-item list-group-item-action d-flex justify-content-between align-items-center bg-light 
               <?php echo e(isset($user) && $user->id === $conversationUser->id ? 'active' : ''); ?>">

                <div class="d-flex align-items-center">
                    <img src="<?php echo e($conversationUser->profil?->getImage() ?? 'https:://ui-avatars.com/api/?name=' . urlencode($conversationUser->name)); ?>"
                    class="rounded-circle border "
                    width="45" height="45">

                    <span class="fw-semibold text-dark p-1"><?php echo e($conversationUser->name); ?></span>
                </div>

                <?php if(isset($unread[$conversationUser->id])): ?>
                    <span class="badge bg-warning text-dark rounded-pill">
                        <?php echo e($unread[$conversationUser->id]); ?>

                    </span>
                <?php endif; ?>
            </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-center text-muted p-3">
                Aucune conversation
            </div>
        <?php endif; ?>
    </div>
</div><?php /**PATH C:\xampp\htdocs\instagram\resources\views/conversations/partials/sidebar.blade.php ENDPATH**/ ?>