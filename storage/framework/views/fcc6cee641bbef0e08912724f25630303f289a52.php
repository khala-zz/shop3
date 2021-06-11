<?php $__env->startSection('title'); ?>
<title>Tài khoản</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<main class="main account">
            <div class="page-header"
                style="background-image: url(<?php echo e(asset('images/page-header.jpg')); ?>); background-color: #3C63A4;">
                <h1 class="page-title">Tài khoản</h1>
                <ul class="breadcrumb">
                    <li><a href="<?php echo e(url('/')); ?>"><i class="d-icon-home"></i></a></li>
                    <li>Tài khoản</li>
                </ul>
            </div>
            <!-- End PageHeader -->
            <div class="page-content mt-10 mb-10">
                <div class="container pt-1">
                    <div class="tab tab-vertical">
                        <ul class="nav nav-tabs mb-4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" href="#dashboard">Điều khiển</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#orders">Đơn hàng</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="#address">Địa chỉ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#account">Thông tin tài khoản</a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(url('/front-logout')); ?>">Đăng xuất</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <!--hien thi thong bao -->
                            <?php if(Session::has('flash_message_error')): ?>
                                <div class="alert alert-danger alert-dark alert-round alert-inline">
                                    
                                    <?php echo session('flash_message_error'); ?>

                                    <button type="button" class="btn btn-link btn-close">
                                        <i class="d-icon-times"></i>
                                    </button>
                                </div>
                            <?php endif; ?>

                            <?php if(Session::has('flash_message_success')): ?>
                                <div class="alert alert-success alert-dark alert-round alert-inline">
                                    <h4 class="alert-title">Thành công :</h4>
                                    <?php echo session('flash_message_success'); ?>

                                    <button type="button" class="btn btn-link btn-close">
                                        <i class="d-icon-times"></i>
                                    </button>
                                </div>
                            <?php endif; ?>
                            <!-- end hien thi thong bao -->
                            <div class="tab-pane active" id="dashboard">
                                <p class="mb-2">
                                    Chào <span><?php echo e($userDetails -> name); ?></span> 
                                </p>
                                <p>
                                    Từ bảng điều khiển này bạn có thể xem <a href="#orders"
                                        class="link-to-tab text-secondary">những đơn hàng gần đây</a>, quản lý thông tin <a
                                        href="#address" class="link-to-tab text-secondary">địa chỉ của bạn</a>, và <a href="#account" class="link-to-tab text-secondary">chỉnh sửa thông tin tài khoản của bạn</a>.
                                </p>
                            </div>
                            <div class="tab-pane" id="orders">
                                <?php if($orders -> isEmpty()): ?>
                                <p class=" b-2">Chưa có đơn hàng nào</p>
                                <a href="<?php echo e(url('/')); ?>" class="btn btn-primary">Mua sắm</a>
                                <?php else: ?>
                                <div class="table-responsive">
                                    <table class="table" >
                                        <thead>
                                            <tr>
                                                <th scope="col" >Mã đơn hàng</th>
                                                <th scope="col">Sản phẩm</th>
                                                <th scope="col">Phương thức thanh toán</th>
                                                <th scope="col">Tổng tiền thanh toán</th>
                                                <th scope="col">Ngày đặt hàng</th>

                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr style="border-bottom: 1px solid #eee;">
                                                <td scope="row" ><?php echo e($order -> ma_order); ?></td>
                                                <td>
                                                    <?php $__currentLoopData = $order -> orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                       
                                                    <div class="accordion  accordion-boxed accordion-plus">
                                                        <div class="card">
                                                            <div class="card-header">
                                                                <a href="#collapse2-1" class="expand"><?php echo e($pro -> product_code); ?>(<?php echo e($pro -> product_qty); ?>)</a>
                                                            </div>
                                                            <div id="collapse2-1" class="collapsed">
                                                                <div class="card-body">
                                                                    <p class="mb-0"><?php echo e($pro -> product_name); ?></p>
                                                                        <p>(<?php echo e($pro -> product_price); ?>)</p>
                                                                        <p>(<?php echo e($pro -> product_color); ?>)</p>
                                                                        <p>(<?php echo e($pro -> product_size); ?>)</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                     </div>   
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                                                </td>
                                                <td><?php echo e($order -> payment_method); ?></td>
                                                <td><?php echo e($order -> total_price); ?></td>
                                                <td><?php echo e($order -> created_at); ?></td>
                                                
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php endif; ?>

                            </div>
                            
                            <div class="tab-pane" id="address">
                                <p class="mb-2">Thông tin địa chỉ bên dưới dùng cho lúc giao hàng và thanh toán.
                                </p>
                                <div class="row">
                                    <div class="col-lg-6 mb-4">
                                        <div class="card card-address">
                                            <div class="card-body">
                                                <h5 class="card-title">Địa chỉ thanh toán</h5>
                                                <form method = "post" action="<?php echo e(url('change-address')); ?>" class="form" >
                                                    <?php echo csrf_field(); ?>
                                                    
                                                    <label>Tên *</label>
                                                    <input type="text" class="form-control mb-0" name="name" required value="<?php echo e($userDetails -> name); ?>">
                                                    <br />

                                                    <label>Email*</label>
                                                    <input type="email" class="form-control" name="email" required value="<?php echo e($userDetails -> email); ?>">

                                                    <label>Điện thoại *</label>
                                                    <input type="text" class="form-control" name="mobile" required value="<?php echo e($userDetails -> mobile); ?>">

                                                    <label>Tỉnh/Thành phố</label>
                                                    <select class="form-control" name="city">
                                                        <option value="0">Chọn thành phố/tỉnh</option>
                                                        <?php $__currentLoopData = $citys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option 
                                                        value="<?php echo e($city -> name); ?>" 
                                                        <?php echo e($city->name  == $userDetails -> city ?"selected":""); ?>>
                                                        <?php echo e($city -> name); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>       
                                                    </select>

                                                    <label>Quận/huyện</label>
                                                    <input type="text" class="form-control mb-0" name="state" required value="<?php echo e($userDetails -> state); ?>">
                                                    <br />
                                                   <label>Địa chỉ</label>
                                                    <input type="text" class="form-control mb-0" name="address" required value="<?php echo e($userDetails -> address); ?>">

                                                    
                                                    <br />
                                                    <button type="submit" class="btn btn-primary btn-reveal-right">LƯU THAY ĐỔI <i
                                                            class="d-icon-arrow-right"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-4">
                                        <div class="card card-address">
                                            <div class="card-body">
                                                <h5 class="card-title">Địa chỉ giao hàng</h5>
                                                <form method = "post" action="<?php echo e(url('change-address-ship')); ?>" class="form" >
                                                    <?php echo csrf_field(); ?>
                                                    
                                                    <label>Tên *</label>
                                                    <input type="text" class="form-control mb-0" name="name" required value="<?php echo e(isset($address_ship -> name)?$address_ship -> name:''); ?>">
                                                    <br />

                                                    <label>Email*</label>
                                                    <input type="email" class="form-control" name="email" required value="<?php echo e(isset($address_ship -> user_email)?$address_ship -> user_email:''); ?>">

                                                    <label>Điện thoại *</label>
                                                    <input type="text" class="form-control" name="mobile" required value="<?php echo e(isset($address_ship -> mobile)?$address_ship -> mobile:''); ?>">

                                                    <label>Tỉnh/Thành phố</label>

                                                    <select class="form-control" name="city">
                                                        <option value="0">Chọn thành phố/tỉnh</option>
                                                        <?php $__currentLoopData = $citys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if(isset($address_ship -> city)): ?>
                                                                <option 
                                                                value="<?php echo e($city -> name); ?>" 
                                                                <?php echo e($city->name  == $address_ship -> city ?"selected":""); ?>>
                                                                <?php echo e($city -> name); ?>

                                                                </option>
                                                            <?php else: ?>
                                                                 <option 
                                                                value="<?php echo e($city -> name); ?>" 
                                                                >
                                                                <?php echo e($city -> name); ?>

                                                                </option>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>       
                                                    </select>

                                                    <label>Quận/huyện</label>
                                                    <input type="text" class="form-control mb-0" name="state" required value="<?php echo e(isset($address_ship -> state)?$address_ship -> state:''); ?>">
                                                    <br />
                                                   <label>Địa chỉ</label>
                                                    <input type="text" class="form-control mb-0" name="address" required value="<?php echo e(isset($address_ship -> address)?$address_ship -> address:''); ?>">

                                                    
                                                    <br />
                                                    <input type="hidden" name="address_id" value="<?php echo e(isset($address_ship -> id)?$address_ship -> id:''); ?>">
                                                    <button type="submit" class="btn btn-primary btn-reveal-right">LƯU THAY ĐỔI <i
                                                            class="d-icon-arrow-right"></i></button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="account">
                                <form method = "post" action="<?php echo e(url('change-password')); ?>" class="form" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="old_pass" value="<?php echo e($userDetails -> password); ?>">
                                    <label>Tên *</label>
                                    <input type="text" class="form-control mb-0" name="name" required value="<?php echo e($userDetails -> name); ?>">
                                    

                                    <label>Email*</label>
                                    <input type="email" class="form-control" name="email" required value="<?php echo e($userDetails -> email); ?>">

                                    <label>Mật khẩu hiện tại (Để trống nếu bạn không muốn thay đổi)</label>
                                    <input type="password" class="form-control" name="current_password">

                                    <label>Mật khẩu mới(Để trống nếu bạn không muốn thay đổi)</label>
                                    <input type="password" class="form-control" name="new_password">

                                    <?php if(!empty($userDetails->image)): ?>
                                        <img src="<?php echo e(url('uploads/users/' . $userDetails->image)); ?>" width="200" height="180"/>
                                    <?php endif; ?>

                                    <div class="form-group <?php echo e($errors->has('image') ? 'has-error' : ''); ?>">
                                        <label for="image" class="control-label"><?php echo e('Hình ảnh'); ?></label>
                                        <input class="form-control" name="image" type="file" id="image" >
                                        
                                    </div>
                                    

                                    <button type="submit" class="btn btn-primary btn-reveal-right">LƯU THAY ĐỔI <i
                                            class="d-icon-arrow-right"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/frontend/user/account.blade.php ENDPATH**/ ?>