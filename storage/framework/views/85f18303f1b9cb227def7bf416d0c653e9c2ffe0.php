

<?php $__env->startSection('title', ' | Create role'); ?>

<?php $__env->startSection('content'); ?>

<section class="content-header">
    <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Vai trò</strong></div>
        <div class="panel-body">
            <h1>
                Thêm mới
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/khalaadmin/')); ?>"><i class="fa fa-dashboard"></i> Quản lý</a></li>
                <li><a href="<?php echo e(url('/khalaadmin/roles')); ?>">Vai trò</a></li>
                <li class="active">Thêm mới</li>
            </ol>
            <a href="<?php echo e(url('/khalaadmin/roles')); ?>" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button></a>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong class="panel-color-heading" >Nhập các thông tin bên dưới</strong></div>
                <div class="panel-body">

                    <?php if($errors->any()): ?>
                    <ul class="alert alert-danger">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(url('/khalaadmin/roles')); ?>" accept-charset="UTF-8" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>


                        <?php echo $__env->make('admin.pages.roles.form', ['formMode' => 'create'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script src="<?php echo e(url('admins/views/roles/form.js')); ?>" type="text/javascript"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/roles/create.blade.php ENDPATH**/ ?>