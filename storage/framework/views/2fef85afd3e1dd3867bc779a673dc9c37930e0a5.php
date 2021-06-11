<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="utf-8">
    <title>Quản lý <?php echo $__env->yieldContent('title'); ?></title>

    <meta name="csrf_token" content="<?php echo e(csrf_token()); ?>" />

    <?php echo $__env->make('admin.layout.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <script>
        var BASE_URL = '<?php echo e(url("/")); ?>';
    </script>

</head>
<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">
        <?php echo $__env->make('admin.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>

    <?php echo $__env->make('admin.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/layout/app.blade.php ENDPATH**/ ?>