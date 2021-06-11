

<?php $__env->startSection('title', ' | Liệt kê danh mục sản phẩm'); ?>

<?php $__env->startSection('styles'); ?>
<link href="<?php echo e(asset('admins/css/sweetalert.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<section class="content-header">
    <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Danh mục sản phẩm</strong></div>
        <div class="panel-body">
            <h1>
                Danh sách
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/khalaadmin')); ?>"><i class="fa fa-dashboard"></i> Quản lý</a></li>
                <li class="active">Danh mục sản phẩm</li>
            </ol>
        </div>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"><strong class="panel-color-heading" >Danh sách danh mục sản phẩm</strong></div>
                <div class="panel-body">

                    <?php echo $__env->make('admin.includes.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <a href="<?php echo e(url('/khalaadmin/categories/create')); ?>" class="btn btn-success btn-sm pull-right" title="Add New user">
                        <i class="fa fa-plus" aria-hidden="true"></i> Thêm mới
                    </a>

                    <form method="GET" action="<?php echo e(url('/khalaadmin/categories')); ?>" accept-charset="UTF-8" class="form-inline my-2 my-lg-0" role="search">


                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text"  name="filter_by_title" class="form-control" placeholder="Tên danh mục..." value="<?php echo e(request('filter_by_title')); ?>">

                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                         <select  name="filter_by_parent_id" style="margin:0px 10px" class="form-control mb-2">
                            <option value="">Chọn danh mục cha</option>
                            <?php echo $htmlOption; ?>

                        </select>
                        <!-- category search -->
                        </div>

                    <input type="submit" value="Tìm kiếm" style="margin:0px 10px;" class="btn btn-primary mb-2">
                    <a href="<?php echo e(url('/khalaadmin/categories')); ?>" class="btn btn-primary"> Làm mới</a>


                </form>

                <br/>
                <br/>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên danh mục</th>
                                <th>Tên danh mục cha</th>
                                <th>Các đặc tính</th>
                                <th>Hiển thị</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $parent_cates = DB::table('categories')->select('title')->where('id',$item->parent_id)->get();
                            ?>
                            <tr>
                                <td><?php echo e($item->id); ?></td>
                                <td><?php echo e($item->title); ?></td>
                                <td>
                                    <?php if($item -> parent_id != 0){?>
                                    <?php $__currentLoopData = $parent_cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent_cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($parent_cate->title); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php 
                                }else{
                                    echo 'Không có danh mục cha';
                                }
                                ?>
                            </td>
                            <td><?php echo e($item -> featured == 1 ? 'Có':'Không'); ?></td>
                            <td><?php echo e($item -> is_active == 1 ? 'Có':'Không'); ?></td>
                            
                            
                            <td>

                                <!-- Xem -->
                                <a href="<?php echo e(url('/khalaadmin/categories/' . $item->id)); ?>" title="View user"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Xem</button></a>
                                <!-- Sửa -->
                                <a href="<?php echo e(url('/khalaadmin/categories/' . $item->id . '/edit')); ?>" title="Edit user"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>
                                <!-- Xóa -->
                                   <a href="" data-url="<?php echo e(route('category.delete',['id' => $item -> id])); ?>" data-toggle="tooltip" data-original-title="Xóa" class="btn btn-danger btn-sm sa-warning"> <i class="fa fa-trash-o">Xóa</i> </a>
                                
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="pagination-wrapper"> <?php echo $categories->appends(['search' => Request::get('search')])->render(); ?> </div>
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
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/category/index.blade.php ENDPATH**/ ?>