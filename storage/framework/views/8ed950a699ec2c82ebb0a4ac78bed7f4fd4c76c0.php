

<?php $__env->startSection('title', ' | Liệt kê email'); ?>

<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(asset('admins/css/sweetalert.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section class="content-header">
    <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Email Newsletters</strong></div>
        <div class="panel-body">
            <h1>
                Danh sách
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/khalaadmin')); ?>"><i class="fa fa-dashboard"></i> Quản lý</a></li>
                <li class="active">Newsletter</li>
            </ol>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading"><strong class="panel-color-heading" >Danh sách email newsletter</strong></div>
            <div class="panel-body">

                <?php echo $__env->make('admin.includes.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <form method="GET" action="<?php echo e(url('/khalaadmin/newsletters')); ?>" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search">

                    <div class="form-group mx-sm-3 mb-2">
                        <input type="text"  name="filter_by_title" class="form-control" placeholder="Tên..." value="<?php echo e(request('filter_by_title')); ?>">

                    </div>
                    <input type="submit" value="Tìm kiếm" style="margin:0px 10px;" class="btn btn-primary mb-2">
                    <a href="<?php echo e(url('/khalaadmin/newsletters')); ?>" class="btn btn-primary"> Làm mới</a>

                </form>

                <br/>
                <br/>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Email</th>
                                <th>Tình trạng</th>
                                <th>Hành động</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $newsletters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                            <tr>
                                <td><?php echo e($item->id); ?></td>
                                
                                <td>
                                   <?php echo e($item->email); ?>

                                </td>
                                <td>
                                    
                                    <?php if($item -> status == 1): ?>
                                        <a href="<?php echo e(url('/khalaadmin/newsletters/xuly/' . $item -> id.'/0')); ?>" title="Đã xử lý"><button class="btn btn-success btn-sm"> Đã xử lý</button></a>
                                    <?php else: ?>
                                        <a href="<?php echo e(url('/khalaadmin/newsletters/xuly/' . $item -> id.'/1')); ?>" title="Chưa xử lý"><button class="btn btn-warning btn-sm"> Chưa xử lý</button></a>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <!-- Xóa -->
                                   <a href="" data-url="<?php echo e(route('newsletter.delete',['id' => $item -> id])); ?>" data-toggle="tooltip" data-original-title="Xóa" class="btn btn-danger btn-sm sa-warning"> <i class="fa fa-trash-o">Xóa</i> </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr><td colspan="4">Chưa có dữ liệu</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> <?php echo $newsletters->appends(['search' => Request::get('search')])->render(); ?> </div>
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
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/newsletter/index.blade.php ENDPATH**/ ?>