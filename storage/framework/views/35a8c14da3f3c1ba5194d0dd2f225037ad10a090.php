

<?php $__env->startSection('title', ' | Edit permission'); ?>

<?php $__env->startSection('content'); ?>


<section class="content-header">
    <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Phân quyền</strong></div>
        <div class="panel-body">
            <h1>
                Sửa phân quyền <strong class="panel-color-id" >#<?php echo e($permission->id); ?></strong>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/khalaadmin/')); ?>"><i class="fa fa-dashboard"></i> Quản lý</a></li>
                <li class="<?php echo e(url('/khalaadmin/permissions')); ?>">Phân quyền</li>
                <li class="active">Sửa</li>
            </ol>
             <a href="<?php echo e(url('/khalaadmin/permissions')); ?>" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button></a>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <?php if($errors->any()): ?>
                    <ul class="alert alert-danger">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(url('/khalaadmin/permissions/' . $permission->id)); ?>" accept-charset="UTF-8" enctype="multipart/form-data">
                        <?php echo e(method_field('PATCH')); ?>

                        <?php echo e(csrf_field()); ?>

                        <?php echo $__env->make('admin.pages.permission.form', ['formMode' => 'edit'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/permission/edit.blade.php ENDPATH**/ ?>