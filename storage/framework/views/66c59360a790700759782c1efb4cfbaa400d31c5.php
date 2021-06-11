

<?php $__env->startSection('title', ' | My Profile'); ?>

<?php $__env->startSection('content'); ?>

<section class="content-header">
    <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Tài khoản</strong></div>
        <div class="panel-body">
            <h1>
                Trang cá nhân
            </h1>
            <?php if(user_can('edit_profile')): ?>
            <a href="<?php echo e(url('khalaadmin/my-profile/edit')); ?>" title="Edit profile"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sửa</button></a>
            <?php endif; ?>
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

                                <?php if(!empty($user->image)): ?>
                                <tr>
                                    <td>
                                        <img src="<?php echo e(url('uploads/users/' . $user->image)); ?>" class="pull-right" width="200" height="200" />
                                    </td>
                                </tr>
                                <?php endif; ?>

                                <tr><th> Tên </th><td> <?php echo e($user->name); ?> </td>
                                </tr><tr><th> Email </th><td> <?php echo e($user->email); ?> </td></tr>
                                

                            </tbody>
                        </table>

                        <hr/>

                        

                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/users/profile/view.blade.php ENDPATH**/ ?>