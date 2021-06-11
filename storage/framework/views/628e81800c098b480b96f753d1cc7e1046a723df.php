

<?php $__env->startSection('title', ' | List users'); ?>
<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(asset('admins/css/sweetalert.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section class="content-header">
    <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Tài khoản</strong></div>
        <div class="panel-body">
            <h1>
                Danh sách tài khoản
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/khalaadmin')); ?>"><i class="fa fa-dashboard"></i> Quản lý</a></li>
                <li class="active">Tài khoản</li>
            </ol>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading"><strong class="panel-color-heading" >Tài khoản</strong></div>
            <div class="panel-body">

                <?php echo $__env->make('admin.includes.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <a href="<?php echo e(url('/khalaadmin/users/create')); ?>" class="btn btn-success btn-sm pull-right" title="Add New user">
                    <i class="fa fa-plus" aria-hidden="true"></i> Thêm mới
                </a>

                <form method="GET" action="<?php echo e(url('/khalaadmin/users')); ?>" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Tài khoản..." value="<?php echo e(request('search')); ?>">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>

                <br/>
                <br/>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên</th>
                                <th>Email</th>

                                <th>Admin</th>
                                <th>Active / Banned</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($item->id); ?></td>
                                <td><?php echo e($item->name); ?></td>
                                <td><?php echo e($item->email); ?></td>

                                <td><?php echo $item->is_admin == 1? '<i class="fa fa-check"></i>':'<i class="fa fa-times"></i>'; ?></td>
                                <td><?php echo $item->is_active == 1? '<i class="fa fa-check"></i>':'<i class="fa fa-ban"></i>'; ?></td>
                                <td><?php if(isset($item->roles[0])): ?> <span class="label label-success"><?php echo e($item->roles[0]->name); ?></span> <?php endif; ?></td>
                                <td>
                                    <a href="<?php echo e(url('/khalaadmin/users/' . $item->id)); ?>" title="View user"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Xem</button></a>
                                    <a href="<?php echo e(url('/khalaadmin/users/' . $item->id . '/edit')); ?>" title="Edit user"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>

                                    <a href="<?php echo e(url('/khalaadmin/users/role/' . $item->id)); ?>" title="Select role"><button class="btn bg-purple btn-sm"><i class="fa fa-user" aria-hidden="true"></i> Chọn vai trò</button></a>

                                    <?php if($item->is_admin == 0): ?>
                                    <!-- Xóa -->
                                   <a href="" data-url="<?php echo e(route('user.delete',['id' => $item -> id])); ?>" data-toggle="tooltip" data-original-title="Xóa" class="btn btn-danger btn-sm sa-warning"> <i class="fa fa-trash-o">Xóa</i> </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> <?php echo $users->appends(['search' => Request::get('search')])->render(); ?> </div>
                </div>

            </div>
        </div>
    </div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

<!-- Sweet-Alert  -->
<script src="<?php echo e(asset('admins/js/sweetalert.min.js')); ?>"></script>
<script src="<?php echo e(asset('admins/js/jquery.sweet-alert.custom.js')); ?>"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/users/index.blade.php ENDPATH**/ ?>