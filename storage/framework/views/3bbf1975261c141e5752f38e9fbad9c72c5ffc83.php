

<?php $__env->startSection('title', 'Edition Commentaire'); ?>

<!-- La barre de navigation -->
<?php echo $__env->make('navbar/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('navbar/mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto mt-5">
                <h3 class="text-center text-muted mb-3 mt-4">Modifie ton commentaire</h3>



                
                <form class="comment-form border-top pt-3" data-comment-id="<?php echo e($comments->id); ?>" action="<?php echo e(route('app_comment_update',['comments' => $comments])); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="d-flex align-items-center">
                        <img src="<?php echo e(auth()->user()->profil->getImage()); ?>" class="rounded-circle me-2" width="35"
                            height="35">

                        <input type="text" name="content" class="form-control rounded-pill"
                            placeholder="Écrire un commentaire…" value="<?php echo e($comments->content); ?>">
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\instagram\resources\views/posts/comments/edit.blade.php ENDPATH**/ ?>