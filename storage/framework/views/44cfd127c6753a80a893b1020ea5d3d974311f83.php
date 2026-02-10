

<?php $__env->startSection('title', 'Messagerie'); ?>

<?php echo $__env->make('navbar.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('navbar/mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid mt-4">
        <h5 class="mb-3">Messages</h5>
        <div class="row">

            
            <?php if($onlineUsers->count()): ?>
                <div class="border-bottom mb-2 pb-2">
                    <small class="text-muted fw-bold px-2">En ligne</small>
                </div>
                <div class="d-flex gap-3 overflow-auto py-2 px-2">
                    <?php $__currentLoopData = $onlineUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $onlineUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="text-center">
                            <a href="<?php echo e(route('app_conversations_show', $onlineUser->id)); ?>">
                            <div class="position-relative">
                                <img src="<?php echo e($onlineUser->profil?->getImage()); ?>" width="50" height="50" alt=""
                                    class="rounded-circle">
            
                                <span class="online-dot-message"></span>
                            </div>
                        </a>
                            <small><?php echo e($onlineUser->name); ?></small>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            
            <?php echo $__env->make('conversations.partials.sidebar', [
                'users' => $users,
                'unread' => $unread,
            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


            
            <div class="col-md-8 col-lg-9 d-flex align-items-center justify-content-center">
                <div class="text-center text-muted">
                    <i class="bi bi-chat-dots" style="font-size: 3rem;"></i>
                    <h5 class="mt-3">Aucun message sélectionné</h5>
                    <p>Sélectionne une conversation pour commencer à discuter</p>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\instagram\resources\views/conversations/index.blade.php ENDPATH**/ ?>