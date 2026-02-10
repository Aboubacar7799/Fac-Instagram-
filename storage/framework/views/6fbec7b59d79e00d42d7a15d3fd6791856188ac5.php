<?php $__env->startSection('title', 'Profile'); ?>

<?php echo $__env->make('navbar/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('navbar/mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-4">

        
        <div class="row align-items-center">

            
           <div class="col-12 col-md-4 text-center mb-3 mb-md-0">
    <div class="profile-avatar mx-auto
        <?php echo e($user->isOnline() ? 'online' : 'offline'); ?>">
        
        <img src="<?php echo e($user->profil->getImage()); ?>"
             alt="Photo de profil"
             class="profile-img">
    </div>
</div>


            
            <div class="col-12 col-md-8" id="app">

                
                <div class="d-flex flex-column flex-sm-row align-items-sm-center gap-2">

                    <h4 class="fw-bolder mb-0"><?php echo e($user->name); ?></h4>

                    <div class="d-flex gap-2">
                        <?php if($user->id !== auth()->id()): ?>
                        <a href="<?php echo e(route('app_conversations_show', $user->id)); ?>" class="btn btn-secondary btn-sm">
                          <i class="fa-solid fa-comment"></i> <span>Message</span>  
                        </a>
                            
                        <?php endif; ?>

                        <followbutton profil-id="<?php echo e($user->profil->id); ?>" follows="<?php echo e($follows); ?>"
                            auth-profil-id="<?php echo e(auth()->user()->profil->id); ?>" />
                    </div>

                </div>

                
                <div class="d-flex justify-content-start gap-4 mt-3 flex-wrap">

                    <div>
                        <a href="#publication" class="text-decoration-none">
                            <span class="fw-bold"><?php echo e($postCount); ?></span> publications
                        </a>
                    </div>

                    <div>
                        <a href="<?php echo e(route('app_relations_index', [
                            'user' => $user->id,
                            'tab' => 'followers',
                        ])); ?>"
                            class="text-decoration-none">
                            <span class="fw-bold"><?php echo e($followsCount); ?></span> abonnés
                        </a>
                    </div>

                    <div>
                        <a href="<?php echo e(route('app_relations_index', [
                            'user' => $user->id,
                            'tab' => 'following',
                        ])); ?>"
                            class="text-decoration-none">
                            <span class="fw-bold"><?php echo e($followingCount); ?></span> suivis
                        </a>
                    </div>

                </div>

                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user->profil)): ?>
                    <div class="mt-3">
                        <a href="<?php echo e(route('app_profil_edit', ['user' => $user->id])); ?>"
                            class="btn btn-outline-secondary btn-sm">
                            Modifier mon profil
                        </a>
                    </div>
                <?php endif; ?>

                
                <div class="mt-3">
                    <div class="fw-bolder">Biographie</div>
                    <div><?php echo e($user->profil->description); ?></div>

                    <?php if($user->profil->lien): ?>
                        <a href="<?php echo e($user->profil->lien); ?>" target="_blank">
                            <?php echo e($user->profil->lien); ?>

                        </a>
                    <?php endif; ?>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user->profil)): ?>
                        <div class="mt-2">
                            <a class="btn btn-outline-primary btn-sm" href="<?php echo e(route('app_post_create')); ?>">
                                Créer une publication
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>

        <hr class="my-4">

        
        <div class="container mt-4" id="publication">
        <?php $__currentLoopData = $user->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                            <?php echo e($post->created_at->diffForHumans()); ?>

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

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\instagram\resources\views/profil/profil.blade.php ENDPATH**/ ?>