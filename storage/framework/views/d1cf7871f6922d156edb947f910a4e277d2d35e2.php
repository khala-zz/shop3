

<?php $__env->startSection('title', ' | Liệt kê Liên hệ'); ?>

<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(asset('admins/css/sweetalert.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section class="content-header">
    <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Liên hệ</strong></div>
        <div class="panel-body">
            <h1>
                Danh sách
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/khalaadmin')); ?>"><i class="fa fa-dashboard"></i> Quản lý</a></li>
                <li class="active">Liên hệ</li>
            </ol>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading"><strong class="panel-color-heading" >Danh sách liên hệ</strong></div>
            <div class="panel-body">

                <?php echo $__env->make('admin.includes.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <form method="GET" action="<?php echo e(url('/khalaadmin/contacts')); ?>" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search">

                    <div class="form-group mx-sm-3 mb-2">
                        <input type="text"  name="filter_by_title" class="form-control" placeholder="Tên..." value="<?php echo e(request('filter_by_title')); ?>">

                    </div>
                    <input type="submit" value="Tìm kiếm" style="margin:0px 10px;" class="btn btn-primary mb-2">
                    <a href="<?php echo e(url('/khalaadmin/contacts')); ?>" class="btn btn-primary"> Làm mới</a>

                </form>

                <br/>
                <br/>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên</th>
                                <th>Điện thoại</th>
                                <th>Email</th>
                                <th>Tình trạng</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $contacts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td><?php echo e($item->id); ?></td>
                                <td><?php echo e($item->name); ?></td>
                                <td>
                                    <?php echo e($item->mobile); ?>

                                </td>
                                <td>
                                   <?php echo e($item->email); ?>

                                </td>
                                <td>
                                    
                                    <?php if($item -> status == 1): ?>
                                        <a href="<?php echo e(url('/khalaadmin/contacts/xuly/' . $item -> id.'/0')); ?>" title="Đã xử lý"><button class="btn btn-success btn-sm"> Đã xử lý</button></a>
                                    <?php else: ?>
                                        <a href="<?php echo e(url('/khalaadmin/contacts/xuly/' . $item -> id.'/1')); ?>" title="Chưa xử lý"><button class="btn btn-warning btn-sm"> Chưa xử lý</button></a>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <!-- Xem -->
                                    <a href="<?php echo e(url('/khalaadmin/contacts/' . $item->id)); ?>" title="Xem chi tiết"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Xem</button></a>
                                    
                                    <!-- Xóa -->
                                   <a href="" data-url="<?php echo e(route('contact.delete',['id' => $item -> id])); ?>" data-toggle="tooltip" data-original-title="Xóa" class="btn btn-danger btn-sm sa-warning"> <i class="fa fa-trash-o">Xóa</i> </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> <?php echo $contacts->appends(['search' => Request::get('search')])->render(); ?> </div>
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
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/contact/index.blade.php ENDPATH**/ ?>