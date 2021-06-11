<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <?php echo $__env->yieldContent('title'); ?>

    <meta name="keywords" content="shop online" />
    <meta name="description" content="khala chuyen shop online">
    <meta name="author" content="khala">
    <!-- dung cho ajax token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/icons/favicon.png">

    <script>
        WebFontConfig = {
            google: { families: ['Open+Sans:400,600,700', 'Poppins:400,600,700'] }
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = 'js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>
    <link href="<?php echo e(asset('css/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/animate/animate.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/owl-carousel/owl.carousel.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/demo1.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/style.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/detail.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldContent('css'); ?>


</head>

<body class="home">

    <div class="page-wrapper">
        
        <?php echo $__env->make('frontend.components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('frontend.components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>

    <!-- Sticky Footer -->
    <div class="sticky-footer sticky-content fix-bottom">
        <a href="<?php echo e(url('/')); ?>" class="sticky-link active">
            <i class="d-icon-home"></i>
            <span>Trang chủ</span>
        </a>
        <a href="<?php echo e(url('cua-hang')); ?>" class="sticky-link">
            <i class="d-icon-officebag"></i>
            <span>Cửa hàng</span>
        </a>
        <a href="<?php echo e(url('tin-tuc')); ?>" class="sticky-link">
            <i class="d-icon-volume"></i>
            <span>Tin tức</span>
        </a>
        <?php if(empty(Auth::check())): ?>
            <a href="<?php echo e(url('front-register')); ?>" class="sticky-link">
            <i class="d-icon-user"></i>
            <span>Đăng kí</span>
        </a>
        <?php else: ?>
            <a href="<?php echo e(url('/my-account')); ?>" class="sticky-link">
            <i class="d-icon-user"></i>
            <span>Tài khoản</span>
        </a>
        <?php endif; ?>
        
        <div class="dropdown cart-dropdown dir-up">
            <a href="<?php echo e(url('/cart')); ?>" class="sticky-link cart-toggle">
                <i class="d-icon-bag"></i>
                <span>Giỏ hàng</span>
            </a>
            <!-- End of Cart Toggle -->
            <div class="dropdown-box">
                <div class="product product-cart-header">
                    <span class="product-cart-counts"><?php echo e(count(getProductCart())); ?> Sản phẩm</span>
                    <span><a href="<?php echo e(url('/cart')); ?>">Giỏ hàng</a></span>
                </div>
                <div class="products scrollable">
                    <!-- Cart Product -->
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
                                <!-- cai cu dung button 
                                 <button class="btn btn-link btn-close">
                                    <i class="fas fa-times"></i>
                                </button>
                                -->
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
            <!-- End of Dropdown Box -->
        </div>
    </div>
    <!-- Scroll Top -->
    <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="fas fa-chevron-up"></i></a>

    <!-- MobileMenu -->
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-overlay">
        </div>
        <!-- End of Overlay -->
        <a class="mobile-menu-close" href="#"><i class="d-icon-times"></i></a>
        <!-- End of CloseButton -->
        <div class="mobile-menu-container scrollable">
            <form action="<?php echo e(route('search.product')); ?>" class="input-wrapper" method="post">
                <?php echo csrf_field(); ?>
                <input type="text" class="form-control" name="search_product" autocomplete="off"
                placeholder="Từ khóa..." required />
                <button class="btn btn-search" type="submit">
                    <i class="d-icon-search"></i>
                </button>
            </form>

            
            <!-- End of Search Form -->
            <ul class="mobile-menu mmenu-anim">
                <li class="active">
                    <a href="<?php echo e(url('/')); ?>">Trang chủ</a>
                </li>
                <li>
                    <a href="<?php echo e(url('cua-hang')); ?>">Cửa hàng</a>
                    
                </li>
                <li>
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
                <li>
                    <a href="<?php echo e(url('tin-tuc')); ?>">Tin tức</a>
                 
                </li>
                <li>
                   <a href="<?php echo e(route('new.detail',['slug' => 'gioi-thieu','id' => 6])); ?>">Giới thiệu</a>
                   
                </li>
                           
                <li>
                    <a href="<?php echo e(url('lien-he')); ?>">Liên hệ</a>
                </li>
                        </ul>
                        <!-- End of MobileMenu -->
             <ul class="mobile-menu mmenu-anim">
                <?php if(empty(Auth::check())): ?>
                    <li><a href="<?php echo e(url('/front-login')); ?>">Đăng nhập</a></li>
                    <li><a href="<?php echo e(url('/front-register')); ?>">Đăng kí</a></li>
                <?php else: ?>
                    <li><a href="<?php echo e(url('/my-account')); ?>">Tài khoản</a></li>
                    <li><a href="<?php echo e(url('/front-logout')); ?>">Đăng xuất</a></li>
                <?php endif; ?>
               
                <li><a href="<?php echo e(url('/cart')); ?>">Giỏ hàng</a></li>
            </ul>
            <!-- End of MobileMenu -->
        </div>
    </div>

    


    <script src="<?php echo e(asset('js/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/parallax/parallax.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/imagesloaded/imagesloaded.pkgd.min.js')); ?>"></script>
    
    <script src="<?php echo e(asset('js/elevatezoom/jquery.elevatezoom.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/owl-carousel/owl.carousel.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('js/webfont.js')); ?>"></script>
    <script src=" <?php echo e(asset('js/product_detail.js')); ?> "></script>
    <?php echo $__env->yieldContent('js'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\shop2\resources\views/frontend/layouts/master.blade.php ENDPATH**/ ?>