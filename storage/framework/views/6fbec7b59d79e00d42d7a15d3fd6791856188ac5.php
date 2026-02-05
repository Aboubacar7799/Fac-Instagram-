<?php $__env->startSection('title','Profile'); ?>

<!-- La barre de navigation -->
<?php echo $__env->make('navbar/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-4 text-center">
                <img src="<?php echo e($user->profil->getImage()); ?>" alt="ça ne va pas hein" width="170" class="rounded-circle">
            </div>
            <div class="col-8" id="app">
                <div class="d-flex align-items-baseline">

                    <div class="h4 pt-2 fw-bolder" style="margin-right: 15px"><?php echo e($user->name); ?></div>

                    <a href="<?php echo e(route('app_conversations_show',$user->id)); ?>" class="btn btn-primary btn-sm">Messages</a>
                    
                    <followbutton user-id="<?php echo e($user->id); ?>" follows="<?php echo e($follows); ?>" auth-id="<?php echo e(auth()->id()); ?>" />

                </div>

                <div class="d-flex mt-3">

                    <div style="margin-right: 15px"><a href="#publication" style="text-decoration: none"> <span class="fw-bold"><?php echo e($postCount); ?></span> publications</a></div>

                    <div style="margin-right: 15px"><a href="<?php echo e(route('app_relations_index',['tab' => 'followers'])); ?>" style="text-decoration: none"> <span class="fw-bold"><?php echo e($followsCount); ?></span> abonnés</a></div>

                    <div style="margin-right: 15px"><a href="<?php echo e(route('app_relations_index',['tab' => 'following'])); ?>" style="text-decoration: none"> <span class="fw-bold"><?php echo e($followingCount); ?></span> suivis</a></div>

                </div>

                <hr style="box-shadow: 3px; border-bottom: 1px solid rgba(rgb(124, 109, 109), rgb(182, 218, 182)69, 224, 169), rgb(147, 147, 170), 0.5)" style="margin-right: 100rem">

                
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user->profil)): ?>
                    <a href="<?php echo e(route('app_profil_edit',['user' => $user->email])); ?>" class="btn btn-outline-secondary mt-3">Modifier mes informations</a>
                <?php endif; ?>

                <div class="mt-3">
                    <div class="fw-bolder">Ma Biographie</div>
                    <div><?php echo e($user->profil->description); ?></div>
                    <div><a href="<?php echo e($user->profil->lien); ?>" target="_blank"><?php echo e($user->profil->lien); ?></a></div>

                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update', $user->profil)): ?>
                        <div class="mt-2"><a class="btn btn-outline-primary sm" href="<?php echo e(route('app_post_create')); ?>">Créer une publication</a></div>
                    <?php endif; ?>

                </div>

            </div>
        </div>
        <hr style="box-shadow: 3px; border-bottom: 1px solid rgba(rgb(124, 109, 109), rgb(182, 218, 182)69, 224, 169), rgb(147, 147, 170), 0.5)">
        <div class="row mt-5" id="publication">

            <?php $__currentLoopData = $user->posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-4 mb-3">
                    <a href="<?php echo e(route('app_affiche_image',['post' => $post->id])); ?>"><img src="<?php echo e($post->getImageUrl()); ?>" alt="Je la vois pas" class="w-100 h-100"></a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\instagram\resources\views/profil/profil.blade.php ENDPATH**/ ?>