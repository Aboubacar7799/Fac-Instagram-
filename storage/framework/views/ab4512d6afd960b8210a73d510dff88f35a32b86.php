<div class="card-body overflow-auto" style="height: 60vh">
    <?php $__currentLoopData = array_reverse($messages->items()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="d-flex mb-3 <?php echo e($message->from_id === auth()->id() ? 'justify-content-end' : ''); ?>">

            <?php if(auth()->id() !== $message->from_id): ?>
                <img src="<?php echo e($message->from->profil?->getImage() ?? 'https:://ui-avatars.com/api/?name=' . urlencode($message->name)); ?>"
                    class="rounded-circle" width="30" height="30">
            <?php endif; ?>
            <div class="p-2 rounded-5
                <?php echo e($message->from_id === auth()->id() ? 'bg-secondary text-white' : 'bg-light'); ?> mx-2 "
                style="max-width: 75%">

                

                <div><?php echo e($message->content); ?></div>

            </div>
            <?php if($message->from_id === auth()->id()): ?>
                <div class="text-bottom">
                    <small class="text-muted d-block text-end">
                        <?php echo e($message->created_at->format('H:i')); ?>

                    </small>
                    <small class="<?php echo e($message->isRead() ? 'text-primary' : 'text-warning'); ?>">
                        <?php echo e($message->isRead() ? 'vu' : 'Envoyé'); ?>

                    </small>

                </div>
            <?php endif; ?>

        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\xampp\htdocs\instagram\resources\views/conversations/partials/messages.blade.php ENDPATH**/ ?>