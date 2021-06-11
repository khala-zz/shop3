

<?php $__env->startSection('title', ' | Hiển thị chi tiết sản phẩm'); ?>

<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(asset('admins/css/sweetalert.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Sản phẩm</strong></div>
        <div class="panel-body">
        <h1>
            Sản phẩm <strong class="panel-color-id" >#<?php echo e($product->id); ?></strong>

        </h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/khalaadmin/')); ?>"><i class="fa fa-dashboard"></i> Quản lý</a></li>
            <li><a href="<?php echo e(url('/khalaadmin/products')); ?>">Danh sách sản phẩm </a></li>
            <li class="active">Hiện</li>
        </ol>
        <a href="<?php echo e(url('/khalaadmin/products')); ?>" title="Quay lại"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button></a>

                        <a href="<?php echo e(url('/khalaadmin/products/' . $product->id . '/edit')); ?>" title="Sửa sản phẩm"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>

                        <!-- Xóa -->
                                  

                        <form method="POST" action="<?php echo e(url('khalaadmin/products' . '/' . $product->id)); ?>" accept-charset="UTF-8" style="display:inline">
                            <?php echo e(method_field('DELETE')); ?>

                            <?php echo e(csrf_field()); ?>

                            <button type="submit" class="btn btn-danger btn-sm" title="Xóa sản phẩm" onclick="return confirm('Xác nhận xóa?');"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</button>
                        </form>
    </div></div>
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
                                        <th width="50%">ID</th><td><?php echo e($product->id); ?></td>
                                    </tr>
                                    <tr>
                                        <th> Tên sản phẩm </th><td> <?php echo e($product -> title); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Mã sản phẩm </th><td> <?php echo e($product -> product_code); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Sản phẩm mới ? </th><td> <?php echo e($product -> new == 1 ? 'Có':'Không'); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Nổi bật ? </th><td> <?php echo e($product -> noi_bat == 1 ? 'Có':'Không'); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Số lượng </th><td> <?php echo e($product -> amount); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Nhãn hiệu </th><td> <?php echo e(isset($product -> brand -> title)?$product -> brand -> title:"Không có nhãn hiệu"); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Hình ảnh đại diện </th>
                                        
                                        <td> 
                                            <img src="<?php echo e(url('uploads/products-daidien/' . $product->image)); ?>" width="200" height="200" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> Giá </th><td> <?php echo e($product -> price); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Giảm giá </th><td> <?php echo e($product -> discount); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Ngày bắt đầu giảm giá </th><td> <?php echo e($product -> discount_start_date); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Ngày kết thúc giảm giá </th><td> <?php echo e($product -> discount_end_date); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Danh mục sản phẩm </th><td> <?php echo e(isset($product -> category -> title)?$product -> category -> title:"Không có danh mục"); ?> </td>
                                    </tr>
                                    <tr>
                                        <th> Các đặc tính </th>
                                        <td> 
            
                                            <?php if($product -> features->isEmpty()): ?>
                                                <p>Không có đặc tính</p>
                                            <?php else: ?>
                                                <?php $__currentLoopData = $product -> features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php echo e($feature -> field_value); ?>---
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?> 
                                        </td>
                                    </tr>
                                    
                                    <tr><th> Mô tả </th><td> <?php echo e($product->description); ?> </td> 
                                       
                                    </tr>
                                    <tr>
                                        <th> Gallery </th>
                                        
                                        <td> 
                                             <?php $__currentLoopData = $product -> gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image_gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                           
                                            <img src="<?php echo e(url('uploads/'.$product -> id.'/small/' . $image_gallery->image)); ?>"  width="100" height="100" />
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                            
                                        </td>
                                    </tr>
                                   
                                    
                                    <tr><th> Hiển thị </th><td> <?php echo e($product -> is_active == 1 ? 'Có':'Không'); ?> </td>
                                    <tr><th> Hiển thị các đặc tính </th><td> <?php echo e($product -> featured == 1 ? 'Có':'Không'); ?> </td>    
                                    
                                   
                                    
                                    
                                    
                                    
                                </tbody>
                            </table>
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
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/product/show.blade.php ENDPATH**/ ?>