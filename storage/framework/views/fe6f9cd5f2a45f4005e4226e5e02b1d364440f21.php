<?php $__env->startSection('title', ' | Dashboard'); ?>

<?php $__env->startSection('content'); ?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <section class="content">

        <?php if(\Auth::user()->is_super_admin == 1): ?>
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <?php if(count(getCategories()) > 0): ?>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><?php echo e(count(getCategories())); ?></h3>
j
                                <p>Contacts</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="<?php echo e(url('khalaadmin/categories')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                <?php endif; ?>

                <?php if(count(getProducts()) > 0): ?>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3><?php echo e(count(getProducts())); ?></h3>

                                <p>Leads</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="<?php echo e(url('khalaadmin/products')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                <?php endif; ?>

                
            </div>

            

        <?php else: ?>

            <div class="row">
                <?php if(user_can("list_products")): ?>

                    <?php if(count(getProducts()) > 0): ?>
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3><?php echo e(count(getProducts())); ?></h3>

                                <p>Contacts</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="<?php echo e(url('khalaadmin/products')); ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                <?php endif; ?>

                <?php endif; ?>
            </div>

            

        <?php endif; ?>

    </section>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/pages/home/index.blade.php ENDPATH**/ ?>