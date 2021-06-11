

<?php $__env->startSection('title', ' | Liệt kê sản phẩm'); ?>

<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(asset('admins/css/sweetalert.css')); ?>" rel="stylesheet">

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section class="content-header">
    <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Sản phẩm</strong></div>
        <div class="panel-body">
            <h1>
                Danh sách
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/khalaadmin')); ?>"><i class="fa fa-dashboard"></i> Quản lý</a></li>
                <li class="active">Sản phẩm</li>
            </ol>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong class="panel-color-heading" >Danh sách sản phẩm</strong><a href="<?php echo e(url('/khalaadmin/products/create')); ?>" class="btn btn-success btn-sm pull-right" title="Thêm sản phẩm">
                    <i class="fa fa-plus" aria-hidden="true"></i> Thêm mới
                </a></div>
                <div class="panel-body">

                    <?php echo $__env->make('admin.includes.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <form method="GET" action="<?php echo e(url('/khalaadmin/products')); ?>" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search">
                        <!-- tieu de -->
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text"  name="title" class="form-control" placeholder="Tên sản phẩm..." value="<?php echo e(request('title')); ?>">
                        </div>
                        <!-- from price -->
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="number"  name="from_price" class="form-control" placeholder="Giá từ..." value="<?php echo e(request('from_price')); ?>">
                        </div>
                        <!-- to price -->
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="number"  name="to_price" class="form-control" placeholder="Đến giá..." value="<?php echo e(request('to_price')); ?>">
                        </div>
                        <!-- cdanh mục -->
                        <div class="form-group mx-sm-3 mb-2">
                           <select  name="category_id" style="margin:0px 10px" class="form-control mb-2">
                            <option value="">Chọn danh mục</option>
                            <?php echo $htmlOption; ?>

                        </select>
                        <!-- category search -->
                    </div>

                    <input type="submit" value="Tìm kiếm"  class="btn btn-primary mb-2">
                    <a href="<?php echo e(url('/khalaadmin/products')); ?>" class="btn btn-primary"> Làm mới</a>
                </form>

                <br/>
                <br/>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Giá</th>
                                <th>Kho</th>
                                <th>Danh mục</th>
                                <th>Hiển Thị</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td><?php echo e($item->id); ?></td>
                                <td><?php echo e($item->title); ?><br />
                                   
                                </td>

                                <td>
                                    <?php if(!empty($item->image)): ?>

                                    <img src="<?php echo e(url('uploads/products-daidien/' . $item->image)); ?>" width="200" height="200" />
                                    <?php else: ?>
                                    <p> Không có hình ảnh </p>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($item->price); ?></td>
                                <td><?php echo e($item->amount); ?></td>
                                <!-- optional($productItem -> category) dam bao chay ko lỗi khi productItem -> category ko co category tuong ung trong bang category -->
                                <td><?php echo e(optional($item -> category) -> title); ?></td>
                                <td><?php echo e($item -> is_active == 1 ? 'Có':'Không'); ?></td>
                                <td>
                                    <!-- Xem -->
                                    <a href="<?php echo e(url('/khalaadmin/products/' . $item->id)); ?>" title="Xem chi tiết"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Xem</button></a>
                                    <!-- Sửa -->
                                    <a href="<?php echo e(url('/khalaadmin/products/' . $item->id . '/edit')); ?>" title="Sửa slider "><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>
                                    <!-- Xóa -->
                                   <a href="" data-url="<?php echo e(route('product.delete',['id' => $item -> id])); ?>" data-toggle="tooltip" data-original-title="Xóa" class="btn btn-danger btn-sm sa-warning"> <i class="fa fa-trash-o">Xóa</i> </a>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> <?php echo $products->appends(['search' => Request::get('search')])->render(); ?> </div>
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
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/product/index.blade.php ENDPATH**/ ?>