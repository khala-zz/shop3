

<?php $__env->startSection('title', ' | Hiển thị chi tiết danh mục sản phẩm'); ?>

<?php $__env->startSection('content'); ?>

<section class="content-header">
   <div class="panel panel-default">
    <div class="panel-heading"><strong class="panel-color-heading" >Danh mục sản phẩm</strong></div>
    <div class="panel-body">
        <h1>
            Danh mục sản phẩm <strong class="panel-color-id" >#<?php echo e($category->id); ?></strong>

        </h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/khalaadmin/')); ?>"><i class="fa fa-dashboard"></i> Quản lý</a></li>
            <li><a href="<?php echo e(url('/khalaadmin/categories')); ?>"> Danh mục sản phẩm </a></li>
            <li class="active">Hiện</li>
        </ol>
        <a href="<?php echo e(url('/khalaadmin/categories')); ?>" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button></a>

        <a href="<?php echo e(url('/khalaadmin/categories/' . $category->id . '/edit')); ?>" title="Edit user"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>

        
        <form method="POST" action="<?php echo e(url('khalaadmin/categories' . '/' . $category->id)); ?>" accept-charset="UTF-8" style="display:inline">
            <?php echo e(method_field('DELETE')); ?>

            <?php echo e(csrf_field()); ?>

            <button type="submit" class="btn btn-danger btn-sm" title="Xóa danh mục sản phẩm" onclick="return confirm('Xác nhận xóa?');"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</button>
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

                <?php echo $__env->make('admin.includes.flash_message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="table-responsive">
                    <table class="table">
                        <tbody>

                            <tr>
                                <th>ID</th><td><?php echo e($category->id); ?></td>
                            </tr>
                            <tr><th> Tên </th><td> <?php echo e($category->title); ?> </td></tr>
                            <tr>
                                <th> Tên danh mục cha </th>
                                <?php
                                $parent_cates = DB::table('categories')->select('title')->where('id',$category->parent_id)->get();
                                ?>
                                <td> 
                                    <?php if($category -> parent_id != 0){?>
                                    <?php $__currentLoopData = $parent_cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent_cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($parent_cate->title); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php 
                                }else{
                                    echo 'Không có danh mục cha';
                                }
                                ?> 
                            </td>
                        </tr>
                        <tr>
                            <th> Hình ảnh </th>
                            
                            <td> 
                                <img src="<?php echo e(url('uploads/categories/' . $category->image)); ?>"  width="200" height="200" />
                            </td>
                        </tr>


                        <tr><th> Mô tả </th><td> <?php echo e($category->description); ?> </td> 
                         
                        </tr>

                        
                        <tr><th> Hiển thị </th><td> <?php echo e($category -> is_active == 1 ? 'Có':'Không'); ?> </td>
                            <tr><th colspan="2">Các đặc tính</th></tr>
                            
                            <?php $__currentLoopData = $category -> features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr><td></td><td><?php echo e($feature -> field_title); ?></td></tr>
                            
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            
                            
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/category/show.blade.php ENDPATH**/ ?>