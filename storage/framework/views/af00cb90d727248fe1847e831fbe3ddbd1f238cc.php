

<?php $__env->startSection('title', ' | Show role'); ?>

<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Vai trò</strong></div>
        <div class="panel-body">
        <h1>
            Vai trò <strong class="panel-color-id" >#<?php echo e($role->id); ?></strong>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/khalaadmin/')); ?>"><i class="fa fa-dashboard"></i> Quản lý</a></li>
            <li><a href="<?php echo e(url('/khalaadmin/roles')); ?>">Vai trò</a></li>
            <li class="active">Hiển thị</li>
        </ol>
        <a href="<?php echo e(url('/khalaadmin/roles')); ?>" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button></a>
                        <a href="<?php echo e(url('/khalaadmin/roles/' . $role->id . '/edit')); ?>" title="Edit role"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>

                        <form method="POST" action="<?php echo e(url('khalaadmin/roles' . '/' . $role->id)); ?>" accept-charset="UTF-8" style="display:inline">
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                            <button type="submit" class="btn btn-danger btn-sm" title="Delete role" onclick="return confirm('Xác nhận xóa?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</button>
                        </form>
    </div>
</div>
    </section>


    <section class="content">
        <div class="row">
            <div class="col-md-12">
                 <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Thông tin chi tiết</strong></div>
        <div class="panel-body">

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td><?php echo e($role->id); ?></td>
                                    </tr>
                                    <tr><th> Tên </th><td> <?php echo e($role->name); ?> </td></tr>
                                    <tr>
                                        <th>Phân quyền</th>
                                        <td>
                                            <?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <i class="btn bg-navy" style="margin: 2px"><?php echo e(ucfirst(str_replace("_", " ", $permission->name))); ?></i>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/roles/show.blade.php ENDPATH**/ ?>