

<?php $__env->startSection('title', 'Notifications'); ?>
<!-- La barre de navigation -->
<?php echo $__env->make('navbar/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('navbar/mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">

    <h5 class="mb-3">Notifications</h5>

    <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <a href="<?php echo e(route('notifications.read', $notification->id)); ?>"
           class="d-block p-3 mb-2 rounded text-decoration-none
           <?php echo e($notification->is_read ? 'bg-white' : 'bg-primary bg-opacity-10'); ?>">
            
            <img src="<?php echo e($notification->fromUser->profil->getImage()); ?>" alt="" width="45" height="45" class="rounded-circle me-2">

            <strong><?php echo e($notification->fromUser->name); ?></strong>

            <?php if($notification->type === 'like'): ?>
                a aimé votre publication
            <?php elseif($notification->type === 'comment'): ?>
                a commenté votre publication
            <?php elseif($notification->type === 'follow'): ?>
                s’est abonné à vous
            <?php endif; ?>

            <div class="text-muted small">
                <?php echo e($notification->created_at->diffForHumans()); ?>

            </div>
        </a>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <p class="text-muted">Aucune notification</p>
    <?php endif; ?>

    <?php echo e($notifications->links()); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\instagram\resources\views/notifications/index.blade.php ENDPATH**/ ?>