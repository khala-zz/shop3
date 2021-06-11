

<?php $__env->startSection('title', ' | Edit My Profile'); ?>

<?php $__env->startSection('content'); ?>


    <section class="content-header">
        <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Tài khoản</strong></div>
        <div class="panel-body">
        <h1>
            Sửa trang cá nhân
        </h1>
        <a href="<?php echo e(url('/khalaadmin/my-profile')); ?>" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Quay lại</button></a>
    </div>
</div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
        <div class="panel-heading"><strong class="panel-color-heading" >Nhập các thông tin bên dưới</strong></div>
        <div class="panel-body">

                        <?php if($errors->any()): ?>
                            <ul class="alert alert-danger">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>

                        <form method="POST" action="<?php echo e(url('/khalaadmin/my-profile/edit/')); ?>" accept-charset="UTF-8" enctype="multipart/form-data">
                            <?php echo e(method_field('PATCH')); ?>

                            <?php echo e(csrf_field()); ?>


                            <div class="form-group <?php echo e($errors->has('name') ? 'has-error' : ''); ?>">
                                <label for="name" class="control-label"><?php echo e('Tên'); ?></label>
                                <input class="form-control" name="name" type="text" id="name" value="<?php echo e(isset($user->name) ? $user->name : ''); ?>" >
                                <?php echo $errors->first('name', '<p class="help-block">:message</p>'); ?>

                            </div>
                            <div class="form-group <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                                <label for="email" class="control-label"><?php echo e('Email'); ?></label>
                                <input class="form-control" name="email" type="text" id="email" value="<?php echo e(isset($user->email) ? $user->email : ''); ?>" >
                                <?php echo $errors->first('email', '<p class="help-block">:message</p>'); ?>

                            </div>
                            <div class="form-group <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                                <label for="password" class="control-label"><?php echo e('Mật khẩu'); ?></label>
                                <input class="form-control" name="password" type="password" id="password" value="" >
                                <?php echo $errors->first('password', '<p class="help-block">:message</p>'); ?>

                            </div>
                            

                            <?php if(!empty($user->image)): ?>
                                <img src="<?php echo e(url('uploads/users/' . $user->image)); ?>" width="200" height="180"/>
                            <?php endif; ?>

                            <div class="form-group <?php echo e($errors->has('image') ? 'has-error' : ''); ?>">
                                <label for="image" class="control-label"><?php echo e('Hình ảnh'); ?></label>
                                <input class="form-control" name="image" type="file" id="image" >
                                <?php echo $errors->first('image', '<p class="help-block">:message</p>'); ?>

                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" value="Cập nhật">
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/users/profile/edit.blade.php ENDPATH**/ ?>