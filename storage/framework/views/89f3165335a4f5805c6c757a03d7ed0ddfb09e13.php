

<?php $__env->startSection('title', 'À propos'); ?>

<!-- La barre de navigation -->
<?php echo $__env->make('navbar/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('navbar/mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h3>À propos de moi</h3>

    <p>
        Développeur web passionné, spécialisé Laravel, Django. Orienté
        résolution de problèmes digital et applications modernes.
    </p>

    <div>
        Vous pouvez télécharger mon CV pour en savoir plus sur mon parcours, mes compétences et mes expériences.
        <a href="<?php echo e(asset('cv/Mon curriculum.pdf')); ?>" class="btn btn-outline-primary" download>
            
           Télécharger mon CV (PDF)
        </a>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\instagram\resources\views/about/index.blade.php ENDPATH**/ ?>