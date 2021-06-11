<?php $__env->startSection('title'); ?>
<title>Đăng kí</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<main class="main">
    <div class="page-content">

        <div class="col-lg-12 col-md-12 col-xs-12">
           
            <form class="ml-lg-2 pt-8 pb-10 pl-4 pr-4 pl-lg-6 pr-lg-6" method="POST" action="<?php echo e(route('front-register')); ?>">
                 <?php echo csrf_field(); ?>
                <h3 class="ls-m mb-1">Đăng kí tài khoản</h3>
                <p class="text-grey">Các thông tin có dấu * là bắt buộc nhập
                </p>
                <div class="row">
                    
                    <div class="col-md-12 mb-4">
                        <input class="form-control" name = "name" id="name" type="text" placeholder="Tên *" value = "<?php echo e(old('name')); ?>"required>
                        <?php echo $errors->first('name', '<p class="help-block" style="color:red;">:message</p>'); ?>

                    </div>
                    <div class="col-md-12 mb-4">
                        <input class="form-control" type="email" name = "email" id="email" placeholder="Email *" value = "<?php echo e(old('email')); ?>" required>
                        <?php echo $errors->first('email', '<p class="help-block" style="color:red;">:message</p>'); ?>

                    </div>
                    <div class="col-md-12 mb-4">
                        <input class="form-control" type="password" name = "password" id="password" placeholder="Mật khẩu *" required>
                        <?php echo $errors->first('password', '<p class="help-block" style="color:red;">:message</p>'); ?>

                    </div>
                    <div class="col-md-12 mb-4">
                        <input class="form-control" type="password" name = "password_confirmation" id="password_confirmation" placeholder="Nhập lại mật khẩu *" required>
                        <?php echo $errors->first('password_confirmation', '<p class="help-block" style="color:red;">:message</p>'); ?>

                    </div>


                </div>
                <button type = "submit" class="btn btn-md btn-primary mb-2">Đăng kí</button>
            </form>
        </div>


    </div>
</main>



<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/auth/register_front.blade.php ENDPATH**/ ?>