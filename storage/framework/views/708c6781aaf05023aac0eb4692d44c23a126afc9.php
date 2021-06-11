
<header class="header">
    
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <p class="welcome-msg">Chào mừng bạn đến với cửa hàng <b>khala</b>!</p>
                    </div>
                    <div class="header-right">
                        <p class="welcome-msg">Hotline <b>0906.077.097</b></p>
                        <!-- End of DropDownExpanded Menu -->
                    </div>
                </div>
            </div>
            <!-- End of HeaderTop -->
            <div class="header-middle sticky-header fix-top sticky-content">
                <div class="container">
                    <div class="header-left">
                        <a href="#" class="mobile-menu-toggle">
                            <i class="d-icon-bars2"></i>
                        </a>
                    </div>
                    <div class="header-center">
                        <a href="<?php echo e(route('home')); ?>" class="logo">
                            <img src="<?php echo e(asset("images/logo.png")); ?>" alt="logo" width="163" height="39" />
                        </a>
                        <!-- End of Logo -->
                        <nav class="main-nav">
                            <ul class="menu">
                                <li class="<?php echo e(Request::segment(1)?'':'active'); ?>">
                                    <a href="<?php echo e(url('/')); ?>">Trang chủ</a>
                                </li>
                                <li class="<?php echo e(Request::segment(1) == 'cua-hang'?'active':''); ?>">
                                    <a href="<?php echo e(route('shop')); ?>">Cửa hàng</a>
                                </li>
                                <li class="<?php echo e(Request::segment(1) == 'danh-muc-san-pham' ? 'active':''); ?>">
                                    <a href="#">Danh mục sản phẩm</a>
                                       <ul>
                                            <!-- category share dung vies share trong app service provider -->
                                            <?php $__currentLoopData = $categories_share; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                    <?php if($item -> parent == null): ?>
                                                    <li >
                                                        <a href="<?php echo e(route('category.product',['slug' => slugify($item -> title,'-'),'id' => $item -> id])); ?>" ><?php echo e($item->title); ?></a>
                                                           <?php if(count($item->children)): ?>
                                                         <ul>

                                                            <?php echo $__env->make('frontend.sub_category',['childs' => $item -> children], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                 
                                                        </ul>
                                                        <?php endif; ?>
                                                    </li>
                                                    <?php endif; ?>
                                               
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                           
                                       </ul>
                                        
                                    
                                </li>
                                <li class="<?php echo e(Request::segment(1) == 'tin-tuc' && !Request::segment(2) ? 'active':''); ?>">
                                    <a href="<?php echo e(route('list.news')); ?>">Tin tức</a>
                                </li>
                               <li class="<?php echo e(Request::segment(2) == 'gioi-thieu' ? 'active':''); ?>">
                                    <a href="<?php echo e(route('new.detail',['slug' => 'gioi-thieu','id' => 6])); ?>">Giới thiệu</a>
                                </li>
    

                                <li class="<?php echo e(Request::segment(1) == 'lien-he'?'active':''); ?>">
                                    <a href="<?php echo e(url('lien-he')); ?>">Liên hệ</a>
                                </li>
                            </ul>
                        </nav>
                        <span class="divider"></span>
                        <!-- End of Divider -->
                        <div class="header-search hs-toggle">
                            <a href="#" class="search-toggle">
                                <i class="d-icon-search"></i>
                            </a>
                            <form action="<?php echo e(route('search.product')); ?>" class="input-wrapper" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="text" class="form-control" name="search_product" autocomplete="off"
                                    placeholder="Từ khóa..." required />
                                <button class="btn btn-search" type="submit">
                                    <i class="d-icon-search"></i>
                                </button>
                            </form>
                        </div>
                        <!-- End of Header Search -->
                    </div>
                    <div class="header-right">
                        <!-- link login,logou account -->
                        <?php if(empty(Auth::check())): ?>
                            <a class="login-khala" href="<?php echo e(url('/front-login')); ?>">
                                <i class="d-icon-user"></i>
                                <span>Đăng nhập</span>
                            </a>

                            <a class="login-khala" href="<?php echo e(url('/front-register')); ?>">
                               
                                <span>Đăng kí</span>
                            </a>
                        <?php else: ?>
                            <a class="login-khala" href="<?php echo e(url('/my-account')); ?>">
                                <i class="d-icon-user"></i>
                                <span>Tài khoản</span>
                            </a>

                            <a class="login-khala" href="<?php echo e(url('/front-logout')); ?>">
                               
                                <span>Đăng xuất</span>
                            </a>
                        <?php endif; ?>
                        <!-- End of link login,logou account -->
                        <span class="divider"></span>
                        <div class="dropdown cart-dropdown">
                            <a href="<?php echo e(url('/cart')); ?>" class="cart-toggle">
                                <span class="cart-label">
                                    <span class="cart-name">Giỏ hàng</span>

                                    <span class="cart-price"><?php echo e(formatMoney(getTotalCart())); ?> </span>
                                </span>
                                <i class="minicart-icon">
                                    <span class="cart-count"><?php echo e(count(getProductCart())); ?></span>
                                </i>
                            </a>
                            <!-- End of Cart Toggle -->
                            <?php if(count(getProductCart()) > 0): ?>
                            <div class="dropdown-box">
                                <div class="product product-cart-header">
                                    <span class="product-cart-counts"><?php echo e(count(getProductCart())); ?> Sản phẩm</span>
                                    <span><a href="<?php echo e(url('/cart')); ?>">Giỏ hàng</a></span>
                                </div>
                                <div class="products scrollable">
                                    <!-- liet ke san pham trong gio hang -->
                                    <?php $__empty_1 = true; $__currentLoopData = getProductCart(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="product product-cart">
                                            <div class="product-detail">
                                                <a href="<?php echo e(route('product.detail',['slug' => slugify($item -> product_name,'-'),'id' => $item -> product_id])); ?>" class="product-name"><?php echo e($item -> product_name); ?></a>
                                                <div class="price-box">
                                                    <span class="product-quantity"><?php echo e($item -> quantity); ?></span>
                                                    <span class="product-price"><?php echo e(formatMoney($item -> price)); ?> </span>
                                                </div>
                                            </div>
                                            <figure class="product-media">
                                                <a href="<?php echo e(route('product.detail',['slug' => slugify($item -> product_name,'-'),'id' => $item -> product_id])); ?>">
                                                    <img src="<?php echo e(asset('uploads/products-daidien/'.$item -> image)); ?>" alt="<?php echo e($item -> product_name); ?>" title="<?php echo e($item -> product_name); ?>" width="90"
                                                        height="90" />
                                                </a>
                                                
                                                <a href="<?php echo e(url('/cart/delete-product/'.$item -> id)); ?>" class="btn btn-link btn-close product-remove" title="Xóa sản phẩm này">
                                                            <i class="fas fa-times"></i>
                                                        </a>
                                            </figure>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <div class="product product-cart">
                                            Không có sản phẩm trong giỏ hàng
                                        </div>
                                    <?php endif; ?>
                                    <!-- end liet ke san pham trong gio hang -->
                                    <!-- End of Cart Product -->
                                   
                                </div>
                                <!-- End of Products  -->
                                <div class="cart-total">
                                    <label>Tổng:</label>
                                    <span class="price"><?php echo e(formatMoney(getTotalCart())); ?></span>
                                </div>
                                <!-- End of Cart Total -->
                                <div class="cart-action">
                                    <a href="<?php echo e(url('checkout')); ?>" class="btn btn-dark"><span>Thanh toán</span></a>
                                </div>
                                <!-- End of Cart Action -->
                            </div>
                            <?php endif; ?>
                            <!-- End of Dropdown Box -->
                        </div>

                        <div class="header-search hs-toggle mobile-search">
                            <a href="#" class="search-toggle">
                                <i class="d-icon-search"></i>
                            </a>
                            <form action="<?php echo e(route('search.product')); ?>" class="input-wrapper" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="text" class="form-control" name="search_product" autocomplete="off"
                                    placeholder="Từ khóa..." required />
                                <button class="btn btn-search" type="submit">
                                    <i class="d-icon-search"></i>
                                </button>
                            </form>
                        </div>
                        <!-- End of Header Search -->


                    </div>
                </div>
            </div>
        </header><?php /**PATH C:\xampp\htdocs\shop2\resources\views/frontend/components/header.blade.php ENDPATH**/ ?>