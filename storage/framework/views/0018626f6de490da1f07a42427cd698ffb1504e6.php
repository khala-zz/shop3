

<?php $__env->startSection('title', ' | Hiển thị chi tiết Liên hệ'); ?>

<?php $__env->startSection('content'); ?>

<section class="content-header">
    <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Liên hệ</strong></div>
        <div class="panel-body">
            <h1>
                Liên hệ <strong class="panel-color-id" >#<?php echo e($contact->id); ?></strong>

            </h1>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(url('/khalaadmin/')); ?>"><i class="fa fa-dashboard"></i> Quản lý</a></li>
                <li><a href="<?php echo e(url('/khalaadmin/contacts')); ?>">Liên hệ </a></li>
                <li class="active">Hiện</li>
            </ol>
            <a href="<?php echo e(url('/khalaadmin/contacts')); ?>" title="Quay lại"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button></a>

            <form method="POST" action="<?php echo e(url('khalaadmin/contacts' . '/' . $contact->id)); ?>" accept-charset="UTF-8" style="display:inline">
                <?php echo e(method_field('DELETE')); ?>

                <?php echo e(csrf_field()); ?>

                <button type="submit" class="btn btn-danger btn-sm" title="Xóa liên hệ" onclick="return confirm('Xác nhận xóa?');"><i class="fa fa-trash-o" aria-hidden="true"></i> Xóa</button>
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
                                    <th>ID</th><td><?php echo e($contact->id); ?></td>
                                </tr>
                                <tr>
                                    <th> Tên </th><td> <?php echo e($contact->name); ?> </td>
                                </tr>
                                <tr>
                                    <th> Điện thoại </th><td> <?php echo e($contact->mobile); ?> </td> 

                                </tr>
                                <tr>
                                    <th> Email </th><td> <?php echo e($contact->email); ?> </td> 

                                </tr>
                                <tr>
                                    <th> Nội dung </th><td> <?php echo $contact->message; ?> </td> 

                                </tr>
                                    
                                <tr>
                                    <th> Tình trạng </th><td> <?php echo e($contact -> status == 1 ? 'Đã xử lý':'Chưa xử lý'); ?> </td>
                                </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/contact/show.blade.php ENDPATH**/ ?>