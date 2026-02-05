<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title><?php echo e(config('app.name')); ?> -> <?php echo $__env->yieldContent('title'); ?></title>

        <link rel="stylesheet" href="<?php echo e(asset('assets/app.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">

        
        <script src="<?php echo e(asset('js/app.js')); ?>"></script>
        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>

        <!-- tous le contenu de notre application -->
       <?php echo $__env->yieldContent('content'); ?>

       <?php echo $__env->make('script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\instagram\resources\views/base.blade.php ENDPATH**/ ?>