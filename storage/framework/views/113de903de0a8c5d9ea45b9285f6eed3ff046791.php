
<?php echo $__env->make('navbar/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-3">

        
        <img src="<?php echo e(asset('storage/' . $post->image)); ?>" class="img-fluid rounded mb-3">

        <div id="comment-anchor-<?php echo e($post->id); ?>">

        </div>

        
        <div class="card-body pt-2">


            
            <div id="comments-lists-<?php echo e($post->id); ?>" class="mb-3">

                <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="mb-2 d-flex">
                        <img src="<?php echo e($comment->user->profil->getImage()); ?>" class="rounded-circle me-2" width="35"
                            height="35">

                        <div>
                            <div class="bg-light rounded px-3 py-2">
                                <strong><?php echo e($comment->user->name); ?></strong><br>
                                <?php echo e($comment->content); ?>

                            </div>
                            <small class="text-muted">
                                Il y’a <?php echo e($comment->created_at->diffForHumans()); ?>

                            </small>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>

            
            <form class="comment-form border-top pt-3" data-post-id="<?php echo e($post->id); ?>"
                action="<?php echo e(route('comments.store', $post->id)); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="d-flex align-items-center">
                    <img src="<?php echo e(auth()->user()->profil->getImage()); ?>" class="rounded-circle me-2" width="35"
                        height="35">

                    <input type="text" name="content" class="form-control rounded-pill"
                        placeholder="Écrire un commentaire…">
                </div>
            </form>

        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\instagram\resources\views/posts/comments.blade.php ENDPATH**/ ?>