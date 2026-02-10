
<?php echo $__env->make('navbar/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('navbar/mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-3">

        
        <img src="<?php echo e(asset('storage/' . $post->image)); ?>" class="img-fluid rounded mb-3">

        <div id="comment-anchor-<?php echo e($post->id); ?>">

        </div>

        
        <div class="card-body pt-2">


            
            <div id="comments-lists-<?php echo e($post->id); ?>" class="mb-3">

                <?php $__currentLoopData = $post->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="d-flex">
                        <a href="<?php echo e(route('app_profil', $comment->user->profil->id)); ?>" class="text-decoration-none">
                            <img src="<?php echo e($comment->user->profil->getImage()); ?>" class="rounded-circle me-2" width="35"
                                height="35">

                            <strong class="px-1"><?php echo e($comment->user->name); ?></strong>
                        </a>
                    </div>

                    <div class="rounded px-5 mb-3">
                        <?php echo e($comment->content); ?>

                        <small class="text-muted">
                            <?php echo e($comment->created_at->diffForHumans()); ?>

                        </small>
                        
                        <?php if($comment->user->id === auth()->id()): ?>
                            <button data-bs-toggle="offcanvas" data-bs-target="#commentButton">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>


            <div class="offcanvas offcanvas-end" id="commentButton">
                <button class="btn-close" data-bs-dismiss="offcanvas">
                </button>


                <div class="offcanvas-body">
                    <a href="<?php echo e(route('app_comment_edit', $comment->id)); ?>"
                        class="d-block mb-3 text-decoration-none dropdown-item">Modifier</a>

                    <button>Supprimer</button>
                </div>

            </div>

        </div>

        
        <form class="comment-form border-top pt-3" data-post-id="<?php echo e($post->id); ?>"
            action="<?php echo e(route('comments.store', $post->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="d-flex align-items-center">
                <img src="<?php echo e(auth()->user()->profil->getImage()); ?>" class="rounded-circle me-2" width="35"
                    height="35">

                <input type="text" name="content" class="form-control rounded-pill" placeholder="Écrire un commentaire…">
            </div>
        </form>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\instagram\resources\views/posts/comments.blade.php ENDPATH**/ ?>