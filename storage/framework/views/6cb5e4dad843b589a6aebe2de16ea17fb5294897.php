

<?php $__env->startSection('title', ' | Liệt kê tin tức'); ?>

<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(asset('admins/css/sweetalert.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section class="content-header">
    <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Tin tức</strong></div>
        <div class="panel-body">
            <h1>
                Danh sách
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/khalaadmin')); ?>"><i class="fa fa-dashboard"></i> Quản lý</a></li>
                <li class="active">Tin tức</li>
            </ol>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
         <div class="panel panel-default">
            <div class="panel-heading"><strong class="panel-color-heading" >Danh sách tin tức</strong></div>
            <div class="panel-body">

                <?php echo $__env->make('admin.includes.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <a href="<?php echo e(url('/khalaadmin/news/create')); ?>" class="btn btn-success btn-sm pull-right" title="Add New user">
                    <i class="fa fa-plus" aria-hidden="true"></i> Thêm mới
                </a>

                <form method="GET" action="<?php echo e(url('/khalaadmin/news')); ?>" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search">

                    <div class="form-group mx-sm-3 mb-2">
                        <input type="text"  name="filter_by_title" class="form-control" placeholder="Từ khóa..." value="<?php echo e(request('filter_by_title')); ?>">

                    </div>
                    <input type="submit" value="Tìm kiếm" style="margin:0px 10px;" class="btn btn-primary mb-2">
                    <a href="<?php echo e(url('/khalaadmin/news')); ?>" class="btn btn-primary"> Làm mới</a>

                </form>

                <br/>
                <br/>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tiêu đề</th>
                                <th>Danh mục</th>
                                <th>Hình ảnh</th>
                                <th>Hiển thị</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                            <tr>
                                <td><?php echo e($item->id); ?></td>
                                <td><?php echo e($item->title); ?></td>
                                <td>
                                    <?php echo e(optional($item -> cat_news) -> title); ?>

                                </td>
                                <td>
                                    <?php if(!empty($item->image_name)): ?>

                                    <img src="<?php echo e(url('uploads/news/' . $item->image_name)); ?>"  width="200" height="200" />
                                    <?php else: ?>
                                    <p> Không có hình ảnh </p>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($item -> is_active == 1 ? 'Có':'Không'); ?></td>
                                <td>
                                    <!-- Xem -->
                                    <a href="<?php echo e(url('/khalaadmin/news/' . $item->id)); ?>" title="Xem chi tiết"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Xem</button></a>
                                    <!-- Sửa -->
                                    <a href="<?php echo e(url('/khalaadmin/news/' . $item->id . '/edit')); ?>" title="Sửa slider "><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>
                                    <!-- Xóa -->
                                   <a href="" data-url="<?php echo e(route('news.delete',['id' => $item -> id])); ?>" data-toggle="tooltip" data-original-title="Xóa" class="btn btn-danger btn-sm sa-warning"> <i class="fa fa-trash-o">Xóa</i> </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr><td colspan="6">Không có tin tức</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> <?php echo $news->appends(['search' => Request::get('search')])->render(); ?> </div>
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
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/news/index.blade.php ENDPATH**/ ?>