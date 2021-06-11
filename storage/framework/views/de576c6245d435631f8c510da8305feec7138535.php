

<?php $__env->startSection('title', ' | Show permission'); ?>

<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <h1>
            Phân Quyền #<?php echo e($permission->id); ?>

        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/khalaadmin/')); ?>"><i class="fa fa-dashboard"></i> Quản lý</a></li>
            <li><a href="<?php echo e(url('/khalaadmin/permissions')); ?>">Phân Quyền</a></li>
            <li class="active">Hiển thị</li>
        </ol>
    </section>


    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <a href="<?php echo e(url('/khalaadmin/permissions')); ?>" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button></a>
                       
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td><?php echo e($permission->id); ?></td>
                                    </tr>
                                    <tr><th> Tên </th><td> <?php echo e($permission->name); ?> </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/permission/show.blade.php ENDPATH**/ ?>