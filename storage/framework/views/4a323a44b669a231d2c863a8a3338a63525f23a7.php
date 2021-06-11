

<?php $__env->startSection('title', ' | Hiển thị chi tiết danh mục tin tức'); ?>

<?php $__env->startSection('content'); ?>

<section class="content-header">
   <div class="panel panel-default">
    <div class="panel-heading"><strong class="panel-color-heading" >Danh mục tin tức</strong></div>
    <div class="panel-body">
        <h1>
            Danh mục tin tức <strong class="panel-color-id" >#<?php echo e($cat_news->id); ?></strong>

        </h1>

        <ol class="breadcrumb">
            <li><a href="<?php echo e(url('/khalaadmin/')); ?>"><i class="fa fa-dashboard"></i> Quản lý</a></li>
            <li><a href="<?php echo e(url('/khalaadmin/cat_news')); ?>"> Danh mục tin tức </a></li>
            <li class="active">Hiện</li>
        </ol>
        <a href="<?php echo e(url('/khalaadmin/cat_news')); ?>" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button></a>

        <a href="<?php echo e(url('/khalaadmin/cat_news/' . $cat_news->id . '/edit')); ?>" title="Edit user"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>

        
        <form method="POST" action="<?php echo e(url('khalaadmin/cat_news' . '/' . $cat_news->id)); ?>" accept-charset="UTF-8" style="display:inline">
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
                                <th>ID</th><td><?php echo e($cat_news->id); ?></td>
                            </tr>
                            <tr><th> Tên </th><td> <?php echo e($cat_news->title); ?> </td></tr>
                            <tr>
                                <th> Tên danh mục cha </th>
                                <?php
                                $parent_cates = DB::table('cat_news')->select('title')->where('id',$cat_news->parent_id)->get();
                                ?>
                                <td> 
                                    <?php if($cat_news -> parent_id != 0){ ?>
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
                                <img src="<?php echo e(url('uploads/cat_news/' . $cat_news->image)); ?>"  width="200" height="200" />
                            </td>
                        </tr>


                        <tr><th> Mô tả </th><td> <?php echo e($cat_news->description); ?> </td> 
                         
                        </tr>

                        
                        <tr><th> Hiển thị </th><td> <?php echo e($cat_news -> is_active == 1 ? 'Có':'Không'); ?> </td>
                            
                            
                            
                            
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/cat_news/show.blade.php ENDPATH**/ ?>