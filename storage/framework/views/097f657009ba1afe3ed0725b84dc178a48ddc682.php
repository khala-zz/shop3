<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php if(\Auth::user()->image != null): ?>
                <img src="<?php echo e(url('uploads/users/' . \Auth::user()->image)); ?>" class="img-circle" alt="User Image">
                <?php else: ?>
                <img src="<?php echo e(url('theme/dist/img/image_placeholder.png')); ?>" class="img-circle" alt="User Image">
                <?php endif; ?>
            </div>
            <div class="pull-left info">
                <p><?php echo e(\Auth::user()->name); ?></p>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php echo e(Request::segment(2) == ""?"active":""); ?>">
                <a href="<?php echo e(url('/khalaadmin')); ?>">
                    <i class="fa fa-dashboard"></i> <span>Quản lý</span>
                </a>
            </li>
            <!-- link danh muc san pham -->
            <?php if(user_can('list_category') || user_can('create_category')): ?>
            <li class="treeview <?php echo e(Request::segment(2) == 'categories'? 'active':''); ?>">
                <a href="#">
                    <i class="fa fa-address-card"></i> <span>Danh mục sản phẩm</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php if(user_can('list_category')): ?>
                    <li class="<?php echo e(Request::segment(2) == "categories" && Request::segment(3) == ""?"active":""); ?>">
                        <a href="<?php echo e(url('/khalaadmin/categories')); ?>"><i class="fa fa-list"></i> Danh sách</a>
                    </li>
                    <?php endif; ?>
                    <?php if(user_can('create_category')): ?>
                    <li class="<?php echo e(Request::segment(2) == "categories" && Request::segment(3) == "create"?"active":""); ?>">
                        <a href="<?php echo e(url('/khalaadmin/categories/create')); ?>"><i class="fa fa-leaf"></i> Thêm</a>
                    </li>
                    <?php endif; ?>
                    
                </ul>
            </li>
            <?php endif; ?>

            <!-- link product -->
            <?php if(user_can('list_product') || user_can('create_product')): ?>
            <li class="treeview <?php echo e(Request::segment(2) == 'products'? 'active':''); ?>">
                <a href="#">
                    <i class="fa fa-address-card"></i> <span>Sản phẩm</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php if(user_can('list_product')): ?>
                    <li class="<?php echo e(Request::segment(2) == "products" && Request::segment(3) == ""?"active":""); ?>">
                        <a href="<?php echo e(url('/khalaadmin/products')); ?>"><i class="fa fa-list"></i> Danh sách</a>
                    </li>
                    <?php endif; ?>
                    <?php if(user_can('create_product')): ?>
                    <li class="<?php echo e(Request::segment(2) == "products" && Request::segment(3) == "create"?"active":""); ?>">
                        <a href="<?php echo e(url('/khalaadmin/products/create')); ?>"><i class="fa fa-leaf"></i> Thêm</a>
                    </li>
                    <?php endif; ?>
                    
                </ul>
            </li>
            <?php endif; ?>

            <!-- link danh muc tin tuc -->
            <?php if(user_can('list_cat_news') || user_can('create_cat_news')): ?>
            <li class="treeview <?php echo e(Request::segment(2) == 'cat_news'? 'active':''); ?>">
                <a href="#">
                    <i class="fa fa-address-card"></i> <span>Danh mục tin tức</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php if(user_can('list_cat_news')): ?>
                    <li class="<?php echo e(Request::segment(2) == "cat_news" && Request::segment(3) == ""?"active":""); ?>">
                        <a href="<?php echo e(url('/khalaadmin/cat_news')); ?>"><i class="fa fa-list"></i> Danh sách</a>
                    </li>
                    <?php endif; ?>
                    <?php if(user_can('create_cat_news')): ?>
                    <li class="<?php echo e(Request::segment(2) == "cat_news" && Request::segment(3) == "create"?"active":""); ?>">
                        <a href="<?php echo e(url('/khalaadmin/cat_news/create')); ?>"><i class="fa fa-leaf"></i> Thêm </a>
                    </li>
                    <?php endif; ?>
                    
                </ul>
            </li>
            <?php endif; ?>

            <!-- link tin tức -->
            <?php if(user_can('list_news') || user_can('create_news')): ?>
            <li class="treeview <?php echo e(Request::segment(2) == 'news'? 'active':''); ?>">
                <a href="#">
                    <i class="fa fa-address-card"></i> <span>Tin tức</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php if(user_can('list_news')): ?>
                    <li class="<?php echo e(Request::segment(2) == "news" && Request::segment(3) == ""?"active":""); ?>">
                        <a href="<?php echo e(url('/khalaadmin/news')); ?>"><i class="fa fa-list"></i> Danh sách</a>
                    </li>
                    <?php endif; ?>
                    <?php if(user_can('create_news')): ?>
                    <li class="<?php echo e(Request::segment(2) == "news" && Request::segment(3) == "create"?"active":""); ?>">
                        <a href="<?php echo e(url('/khalaadmin/news/create')); ?>"><i class="fa fa-leaf"></i> Thêm</a>
                    </li>
                    <?php endif; ?>
                    
                </ul>
            </li>
            <?php endif; ?>

            <!-- link cac nhan hieu -->
            <?php if(user_can('list_brand') || user_can('create_brand')): ?>
            <li class="treeview <?php echo e(Request::segment(2) == 'brands'? 'active':''); ?>">
                <a href="#">
                    <i class="fa fa-address-card"></i> <span>Nhãn hiệu</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php if(user_can('create_brand')): ?>
                    <li class="<?php echo e(Request::segment(2) == "brands" && Request::segment(3) == ""?"active":""); ?>">
                        <a href="<?php echo e(url('/khalaadmin/brands')); ?>"><i class="fa fa-list"></i> Danh sách</a>
                    </li>
                    <?php endif; ?>
                    <?php if(user_can('create_brand')): ?>
                    <li class="<?php echo e(Request::segment(2) == "brands" && Request::segment(3) == "create"?"active":""); ?>">
                        <a href="<?php echo e(url('/khalaadmin/brands/create')); ?>"><i class="fa fa-leaf"></i> Thêm</a>
                    </li>
                    <?php endif; ?>
                    
                </ul>
            </li>
            <?php endif; ?>

            <!-- link cac tag -->
            <?php if(user_can('list_tag') || user_can('create_tag')): ?>
            <li class="treeview <?php echo e(Request::segment(2) == 'tags'? 'active':''); ?>">
                <a href="#">
                    <i class="fa fa-address-card"></i> <span>Tags</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php if(user_can('create_tag')): ?>
                    <li class="<?php echo e(Request::segment(2) == "tags" && Request::segment(3) == ""?"active":""); ?>">
                        <a href="<?php echo e(url('/khalaadmin/tags')); ?>"><i class="fa fa-list"></i> Danh sách</a>
                    </li>
                    <?php endif; ?>
                    <?php if(user_can('create_tag')): ?>
                    <li class="<?php echo e(Request::segment(2) == "tags" && Request::segment(3) == "create"?"active":""); ?>">
                        <a href="<?php echo e(url('/khalaadmin/tags/create')); ?>"><i class="fa fa-leaf"></i> Thêm</a>
                    </li>
                    <?php endif; ?>
                    
                </ul>
            </li>
            <?php endif; ?>
           
            <!-- link slider -->
            <?php if(user_can('list_slider') || user_can('create_slider')): ?>
            <li class="treeview <?php echo e(Request::segment(2) == 'sliders'? 'active':''); ?>">
                <a href="#">
                    <i class="fa fa-address-card"></i> <span>Slider</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php if(user_can('list_slider')): ?>
                    <li class="<?php echo e(Request::segment(2) == "sliders" && Request::segment(3) == ""?"active":""); ?>">
                        <a href="<?php echo e(url('/khalaadmin/sliders')); ?>"><i class="fa fa-list"></i> Danh sách</a>
                    </li>
                    <?php endif; ?>
                    <?php if(user_can('create_slider')): ?>
                    <li class="<?php echo e(Request::segment(2) == "sliders" && Request::segment(3) == "create"?"active":""); ?>">
                        <a href="<?php echo e(url('/khalaadmin/sliders/create')); ?>"><i class="fa fa-leaf"></i> Thêm</a>
                    </li>
                    <?php endif; ?>
                    
                </ul>
            </li>
            <?php endif; ?>

             <!-- link review -->
            <?php if(user_can('list_review')): ?>
            
                <li class="<?php echo e(Request::segment(2) == "reviews" ?"active":""); ?>">
                    <a href="<?php echo e(url('/khalaadmin/reviews')); ?>"><i class="fa fa-list"></i> Đánh giá</a>
                            
                </li>

            <?php endif; ?>

            <!-- link coupon -->
            <?php if(user_can('list_coupon') || user_can('create_coupon')): ?>
            <li class="treeview <?php echo e(Request::segment(2) == 'coupons'? 'active':''); ?>">
                <a href="#">
                    <i class="fa fa-address-card"></i> <span>Mã giảm giá</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php if(user_can('list_coupon')): ?>
                    <li class="<?php echo e(Request::segment(2) == "coupons" && Request::segment(3) == ""?"active":""); ?>">
                        <a href="<?php echo e(url('/khalaadmin/coupons')); ?>"><i class="fa fa-list"></i> Danh sách</a>
                    </li>
                    <?php endif; ?>
                    <?php if(user_can('create_coupon')): ?>
                    <li class="<?php echo e(Request::segment(2) == "coupons" && Request::segment(3) == "create"?"active":""); ?>">
                        <a href="<?php echo e(url('/khalaadmin/coupons/create')); ?>"><i class="fa fa-leaf"></i> Thêm</a>
                    </li>
                    <?php endif; ?>
                    
                </ul>
            </li>
            <?php endif; ?>

            <!-- link order -->
            <?php if(user_can('list_order')): ?>
            
                <li class="<?php echo e(Request::segment(2) == "orders" ?"active":""); ?>">
                    <a href="<?php echo e(url('/khalaadmin/orders')); ?>"><i class="fa fa-list"></i> Đơn hàng
                            <span class="label label-success"><?php echo e(count(getUnreadOrder())); ?></span></a>
                </li>

            <?php endif; ?>

            <!-- link setting -->
            <?php if(user_can('list_setting') || user_can('create_setting')): ?>
            <li class="treeview <?php echo e(Request::segment(2) == 'settings'? 'active':''); ?>">
                <a href="#">
                    <i class="fa fa-address-card"></i> <span>Setting</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <?php if(user_can('list_setting')): ?>
                    <li class="<?php echo e(Request::segment(2) == "settings" && Request::segment(3) == ""?"active":""); ?>">
                        <a href="<?php echo e(url('/khalaadmin/settings')); ?>"><i class="fa fa-list"></i> Danh sách</a>
                    </li>
                    <?php endif; ?>
                    <?php if(user_can('create_setting')): ?>
                    <li class="<?php echo e(Request::segment(2) == "settings" && Request::segment(3) == "create"?"active":""); ?>">
                        <a href="<?php echo e(url('/khalaadmin/settings/create?type=Text')); ?>"><i class="fa fa-leaf"></i> Thêm settings loại text</a>
                    </li>
                    <li class="<?php echo e(Request::segment(2) == "settings" && Request::segment(3) == "create"?"active":""); ?>">
                        <a href="<?php echo e(url('/khalaadmin/settings/create?type=Textarea')); ?>"><i class="fa fa-leaf"></i> Thêm settings loại textarea</a>
                    </li>
                    <?php endif; ?>
                    
                </ul>
            </li>
            <?php endif; ?>

            <!-- link contact -->
            <?php if(user_can('list_contact')): ?>
            
                <li class="<?php echo e(Request::segment(2) == "contacts" ?"active":""); ?>">
                    <a href="<?php echo e(url('/khalaadmin/contacts')); ?>"><i class="fa fa-list"></i> Liên hệ</a>
                            
                </li>

            <?php endif; ?>

             <!-- link newsletter -->
            <?php if(user_can('list_newsletter')): ?>
            
                <li class="<?php echo e(Request::segment(2) == "newsletters" ?"active":""); ?>">
                    <a href="<?php echo e(url('/khalaadmin/newsletters')); ?>"><i class="fa fa-list"></i>Newsletters</a>
                            
                </li>

            <?php endif; ?>

            <?php if(\Auth::user()->is_super_admin == 1): ?>
            <li class="<?php echo e(in_array(Request::segment(2), ['users', 'permissions', 'roles'])?"active":""); ?> treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Quản lý tài khoản</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php echo e(Request::segment(2) == "users"?"active":""); ?>">
                        <a href="<?php echo e(url('/khalaadmin/users')); ?>"><i class="fa fa-user-o"></i> Tài khoản </a>
                    </li>

                    <li class="<?php echo e(Request::segment(2) == "permissions"?"active":""); ?>">
                        <a href="<?php echo e(url('/khalaadmin/permissions')); ?>"><i class="fa fa-ban"></i> Phân quyền</a>
                    </li>
                    <li class="<?php echo e(Request::segment(2) == "roles"?"active":""); ?>">
                        <a href="<?php echo e(url('/khalaadmin/roles')); ?>"><i class="fa fa-list"></i> Vai trò</a>
                    </li>
                </ul>
            </li>
            <?php endif; ?>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside><?php /**PATH C:\xampp\htdocs\shop2\resources\views/admin/layout/sidebar.blade.php ENDPATH**/ ?>