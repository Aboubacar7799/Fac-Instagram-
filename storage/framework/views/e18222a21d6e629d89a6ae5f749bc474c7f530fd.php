<?php $__env->startSection('title', 'Publication'); ?>

<!-- La barre de navigation -->
<?php echo $__env->make('navbar/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container mt-4" id="app">
        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row justify-content-center mb-4">
                <div class="col-md-8 col-lg-6">

                    <div class="card shadow-sm rounded-3">

                        
                        <div class="card-body pb-2">
                            <div class="d-flex align-items-center">
                                <a href="<?php echo e(route('app_profil', ['user' => $post->user])); ?>"
                                    class="d-flex align-items-center text-decoration-none text-dark">

                                    <img src="<?php echo e($post->user->profil->getImage()); ?>" class="rounded-circle me-2"
                                        width="45" height="45">

                                    <div>
                                        <strong><?php echo e($post->user->name); ?></strong><br>
                                        <small class="text-muted">
                                            Il y’a <?php echo e($post->created_at->diffForHumans()); ?>

                                        </small>
                                    </div>
                                </a>

                            </div>

                            <p class="mt-3 mb-2">
                                <?php echo e($post->description); ?>

                            </p>
                        </div>

                        
                        <a href="<?php echo e(route('app_affiche_image', ['post' => $post->id])); ?>">
                            <img src="<?php echo e(asset('storage/' . $post->image)); ?>" class="img-fluid"
                                style="max-height:450px; object-fit:cover;">
                        </a>


                        <div class="px-3 py-2 text-muted small d-flex justify-content-between">

                            <div id="counts-<?php echo e($post->id); ?>">
                                👍 <?php echo e($post->likes->where('type', 'like')->count()); ?>

                                ❤️ <?php echo e($post->likes->where('type', 'love')->count()); ?>

                                😢 <?php echo e($post->likes->where('type', 'sad')->count()); ?>

                                😡 <?php echo e($post->likes->where('type', 'angry')->count()); ?>

                                😮 <?php echo e($post->likes->where('type', 'wow')->count()); ?>

                            </div>

                            <div>
                                <?php echo e($post->comments->count()); ?> commentaires
                            </div>

                        </div>

                        <div class="d-flex justify-content-between px-3 py-2 border-top">

                            
                            <div class="reaction-wrapper" data-post="<?php echo e($post->id); ?>">

                                <?php
                                    $reaction = $post->userLike()?-> type;
                                ?>
                                <button type="button" class="btn btn-light btn-sm" id="btn-<?php echo e($post->id); ?>">
                                    <?php switch($reaction):
                                        case ('love'): ?> ❤️ J'adore <?php break; ?>
                                        <?php case ('sad'): ?> 😢 Triste <?php break; ?>
                                        <?php case ('angry'): ?> 😡 Furieux <?php break; ?>
                                        <?php case ('wow'): ?> 😮 Wouah <?php break; ?>
                                    
                                        <?php default: ?> 👍 J’aime
                                    <?php endswitch; ?>
                                    
                                </button>

                                <div class="reaction-options">
                                    <?php $__currentLoopData = ['like' => '👍', 'love' => '❤️', 'sad' => '😢', 'angry' => '😡', 'wow' => '😮']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type => $emoji): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span onclick="sendReaction('<?php echo e($type); ?>', <?php echo e($post->id); ?>)">
                                            <?php echo e($emoji); ?>

                                        </span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>

                            
                            <a href="<?php echo e(route('posts.comments', $post->id)); ?>" class="btn btn-light btn-sm"
                                data-post-id="<?php echo e($post->id); ?>">
                                💬 Commenter
                            </a>


                        </div>

                    </div>

                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <script>
        window.REACTION_URL = "<?php echo e(route('reaction.ajax')); ?>"
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\instagram\resources\views/posts/index.blade.php ENDPATH**/ ?>