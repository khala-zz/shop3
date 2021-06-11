

<?php $__env->startSection('title', ' | Hiển thị chi tiết tin tức'); ?>

<?php $__env->startSection('content'); ?>

<section class="content-header">
    <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Tin tức</strong></div>
        <div class="panel-body">
            <h1>
                Tin tức <strong class="panel-color-id" >#<?php echo e($news->id); ?></strong>

            </h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/khalaadmin/')); ?>"><i class="fa fa-dashboard"></i> Quản lý</a></li>
                <li><a href="<?php echo e(url('/khalaadmin/news')); ?>">Tin tức </a></li>
                <li class="active">Hiện</li>
            </ol>
            <a href="<?php echo e(url('/khalaadmin/news')); ?>" title="Quay lại"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button></a>

            <a href="<?php echo e(url('/khalaadmin/news/' . $news->id . '/edit')); ?>" title="Edit user"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>


            <form method="POST" action="<?php echo e(url('khalaadmin/news' . '/' . $news->id)); ?>" accept-charset="UTF-8" style="display:inline">
                <?php echo e(method_field('DELETE')); ?>

                <?php echo e(csrf_field()); ?>

                <button type="submit" class="btn btn-danger btn-sm" title="Xóa tin tức" onclick="return confirm('Xác nhận xóa?');"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</button>
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
                                    <th width="50%">ID</th><td><?php echo e($news->id); ?></td>
                                </tr>
                                <tr>
                                    <th> Tiêu đề </th><td> <?php echo e($news->title); ?> </td>
                                </tr>

                                <tr>
                                        <th> Danh mục tin tức</th><td> <?php echo e(isset($news -> cat_news -> title)?$news -> cat_news -> title:"Không có danh mục"); ?> </td>
                                    </tr>

                                <tr>
                                    <th> Hình ảnh </th>

                                    <td> 
                                        <img src="<?php echo e(url('uploads/news/' . $news->image_name)); ?>"  width="200" height="200" />
                                    </td>
                                </tr>
                                <tr>
                                    <th> Mô tả </th><td> <?php echo e($news->description); ?> </td> 

                                </tr>
                                <tr>
                                    <th> Nội dung </th><td> <?php echo $news->content; ?> </td> 

                                </tr>

                                <tr><th> Hiển thị </th><td> <?php echo e($news -> is_active == 1 ? 'Có':'Không'); ?> </td></tr>

                            </tbody>
                        </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/news/show.blade.php ENDPATH**/ ?>