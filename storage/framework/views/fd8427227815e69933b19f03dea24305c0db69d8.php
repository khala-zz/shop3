
	<?php $__env->startSection('title'); ?>
		<title>Trang chu</title>
	<?php $__env->stopSection(); ?>
	<?php $__env->startSection('css'); ?>
		
		<link href="<?php echo e(asset('css/home.css')); ?>" rel="stylesheet">
	<?php $__env->stopSection(); ?>
    <?php $__env->startSection('js'); ?>
       
        <script type="text/javascript">
            //dung cho ajax review
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <?php $__env->stopSection(); ?>
	

	<?php $__env->startSection('content'); ?>
	 <main class="main">
            <div class="page-content">
                <?php if(Session::has('flash_message_success')): ?>
                                <div class="alert alert-success alert-dark alert-round alert-inline">
                                    <h4 class="alert-title">Thành công :</h4>
                                    <?php echo session('flash_message_success'); ?>

                                    <button type="button" class="btn btn-link btn-close">
                                        <i class="d-icon-times"></i>
                                    </button>
                                </div>
                            <?php endif; ?>
	<!-- slider -->
		<?php echo $__env->make('frontend.home.components.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<!-- /slider -->
	
	     <section class="grey-section pt-10 pb-10 appear-animate" data-animation-options="{
                    'delay': '.3s'
                }">
                    <div class="container pt-3">
                        <h2 class="title">danh mục sản phẩm ưa chuộng</h2>
                        <div class="row">

                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           
                            <div class="col-md-3 col-6 mb-4">
                                <div
                                    class="category category-default category-default-1 category-absolute overlay-zoom">
                                    <a href="<?php echo e(route('category.product',['slug' => slugify($category -> title,'-'),'id' => $category -> id])); ?>">
                                        <figure class="category-media">
                                            <img src="uploads/categories/<?php echo e($category -> image); ?>" alt="<?php echo e($category -> title); ?>"
                                                width="280" height="280" title="<?php echo e($category -> title); ?>"/>
                                        </figure>
                                    </a>
                                    <div class="category-content">
                                        <h4 class="category-name"><a href="<?php echo e(route('category.product',['slug' => slugify($category -> title,'-'),'id' => $category -> id])); ?>"><?php echo e($category -> title); ?></a></h4>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </section>
                <!-- san pham ban chay -->
                <section class="product-wrapper container appear-animate mt-10 pt-3 pb-8" data-animation-options="{
                    'delay': '.3s'
                }">
                    <h2 class="title">Sản phẩm bán chạy</h2>
                    <div class="owl-carousel owl-theme row owl-nav-full cols-2 cols-md-3 cols-lg-4" data-owl-options="{
                        'items': 5,
                        'nav': false,
                        'loop': false,
                        'dots': true,
                        'margin': 20,
                        'responsive': {
                            '0': {
                                'items': 2
                            },
                            '768': {
                                'items': 3
                            },
                            '992': {
                                'items': 4,
                                'dots': false,
                                'nav': true
                            }
                        }
                    }">
                        <?php $__currentLoopData = $products_selling; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <!-- kiem tra xem product co giam gia hay khong? -->
                        <?php if(!empty($product -> discount)): ?>
                            <?php $product_price = $product -> price * (100 - $product -> discount)/100; ?>        
                        <?php else: ?>
                            <?php $product_price = $product -> price; ?>
                        <?php endif; ?>
                        <!-- end kiem tra xem product co giam gia hay khong? -->
                        <div class="product">
                            <figure class="product-media">
                                <a href="<?php echo e(route('product.detail',['slug' => slugify($product -> title,'-'),'id' => $product -> id])); ?>">
                                    <img src="uploads/products-daidien/<?php echo e($product -> image); ?>" alt="<?php echo e($product -> title); ?>" title="<?php echo e($product -> title); ?>"
                                        width="280" height="315">
                                </a>
                                <!-- hien thi label moi -->
                                <?php if($product -> new == 1): ?>
                                <div class="product-label-group">
                                    <label class="product-label label-new">Mới</label>
                                </div>
                                <?php endif; ?>
                                <!-- hien thi label giam gia -->
                                <?php if(!empty($product -> discount)): ?>
                                <div class="product-label-group product-label-group-price">
                                    <label class="product-label label-sale"><?php echo e($product -> discount); ?> %</label>
                                </div>
                                <?php endif; ?>
                                <div class="product-action-vertical">
                                    <a href="<?php echo e(url('add-cart')); ?>" class="btn-product-icon btn-cart btn-add-cart"  title="Thêm vào giỏ hàng"
                                    value = "<?php echo e($product -> id.'khala'.$product -> product_code.'khala'.$product -> title.'khala'.$product_price); ?>">
                                        <i class="d-icon-bag"></i>
                                    </a>
                                </div>
                                <div class="product-action">
                                    <a href="<?php echo e(route('product.detail',['slug' => slugify($product -> title,'-'),'id' => $product -> id])); ?>" class="btn-product" title="<?php echo e($product -> title); ?>">Xem chi tiết</a>
                                </div>
                            </figure>

                            <div class="product-details">
                              
                                <div class="product-cat">
                                    <a href="<?php echo e(route('category.product',['slug' => slugify($product -> catTitle,'-'),'id' => $product -> catId])); ?>"><?php echo e($product -> catTitle); ?></a>
                                </div>
                                <h3 class="product-name">
                                    <a href="<?php echo e(route('product.detail',['slug' => slugify($product -> title,'-'),'id' => $product -> id])); ?>"><?php echo e($product -> title); ?></a>
                                </h3>
                                <?php if(!empty($product -> discount)): ?>
                                <div class="product-price">
                                    <ins class="new-price">
                                        
                                        <?php echo e(formatMoney($product_price)); ?>

                                    </ins><del class="old-price"><?php echo e(formatMoney($product -> price)); ?></del>
                                </div>
                                <?php else: ?>
                                 <div class="product-price">
                                    <ins class="new-price"><?php echo e(formatMoney($product_price)); ?></ins>
                                </div>
                                <?php endif; ?>
                                <div class="ratings-container">
                                    <!-- hien thi rating -->
                                    <?php 
                                        $avg = 0;
                                        if($product -> pro_total_rating){
                                            $avg = round($product -> pro_total_number/$product -> pro_total_rating,2);
                                        }
                                        
                                    ?>
                                    
                                    <span class="rating-stars selected">
                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                        <a class="star-<?php echo e($i); ?> <?php echo e($i <= $avg ? 'active':''); ?> "><?php echo e($i); ?></a>
                                        <?php endfor; ?>
                                        
                                    </span>
                                    <!-- end hien thi rating -->
                                    <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( <?php echo e($product -> reviews -> count()); ?> Đánh giá )</a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </div>
                </section>
               
                <!-- san pham noi bat -->
                <section class="product-wrapper pb-10 container appear-animate" data-animation-options="{
                    'delay': '.6s'
                }">
                    <h2 class="title">Sản phẩm nổi bật</h2>
                    <div class="owl-carousel owl-theme row cols-2 cols-md-3 cols-lg-4 cols-xl-5" data-owl-options="{
                        'items': 5,
                        'nav': false,
                        'loop': false,
                        'dots': true,
                        'margin': 20,
                        'responsive': {
                            '0': {
                                'items': 2
                            },
                            '768': {
                                'items': 3
                            },
                            '992': {
                                'items': 4
                            },
                            '1200': {
                                'items': 5,
                                'dots': false,
                                'nav': true
                            }
                        }
                    }">
                        <?php $__currentLoopData = $products_featured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productFeature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <!-- kiem tra xem product co giam gia hay khong? -->
                        <?php if(!empty($productFeature -> discount)): ?>
                            <?php $product_price = $productFeature -> price * (100 - $productFeature -> discount)/100; ?>        
                        <?php else: ?>
                            <?php $product_price = $productFeature -> price; ?>
                        <?php endif; ?>
                        <!-- end kiem tra xem product co giam gia hay khong? -->
                        <div class="product">
                            <figure class="product-media">
                                <a href="<?php echo e(route('product.detail',['slug' => slugify($productFeature -> title,'-'),'id' => $productFeature -> id])); ?>">
                                    <img src="<?php echo e(asset('uploads/products-daidien/'.$productFeature -> image )); ?>" alt="<?php echo e($productFeature -> title); ?>" title="<?php echo e($productFeature -> title); ?>"
                                        width="220" height="245">
                                </a>
                                <!-- hien thi label moi -->
                                <?php if($productFeature -> new == 1): ?>
                                <div class="product-label-group">
                                    <label class="product-label label-new">Mới</label>
                                </div>
                                <?php endif; ?>
                                <!-- hien thi label giam gia -->
                                <?php if(!empty($productFeature -> discount)): ?>
                                <div class="product-label-group product-label-group-price">
                                    <label class="product-label label-sale"><?php echo e($productFeature -> discount); ?> %</label>
                                </div>
                                <?php endif; ?>
                                <!-- end hien thi giam gia -->
                                <div class="product-action-vertical">
                                    <a href="<?php echo e(url('/add-cart')); ?>" class="btn-product-icon btn-cart btn-add-cart"  title="Thêm vào giỏ hàng" value = "<?php echo e($productFeature -> id.'khala'.$productFeature -> product_code.'khala'.$productFeature -> title.'khala'.$product_price); ?>"><i class="d-icon-bag"></i></a>
                                </div>
                                <div class="product-action">
                                    <a href="<?php echo e(route('product.detail',['slug' => slugify($productFeature -> title,'-'),'id' => $productFeature -> id])); ?>" class="btn-product" title="<?php echo e($productFeature -> title); ?>}">Xem chi tiết</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                
                                <div class="product-cat">
                                    <a href="<?php echo e(route('category.product',['slug' => slugify(optional($productFeature -> category) -> title,'-'),'id' => optional($productFeature -> category) -> id])); ?>"><?php echo e(optional($productFeature -> category) -> title); ?></a>
                                </div>
                                <h3 class="product-name">
                                    <a href="<?php echo e(route('product.detail',['slug' => slugify($productFeature -> title,'-'),'id' => $productFeature -> id])); ?>"><?php echo e($productFeature -> title); ?></a>
                                </h3>
                                <!-- hien thi gia -->
                                <?php if(!empty($productFeature -> discount)): ?>
                                <div class="product-price">
                                    <ins class="new-price">
                                        
                                        <?php echo e(formatMoney($product_price)); ?>

                                    </ins><del class="old-price"><?php echo e(formatMoney($productFeature -> price)); ?></del>
                                </div>
                                <?php else: ?>
                                 <div class="product-price">
                                    <ins class="new-price"><?php echo e(formatMoney($product_price)); ?></ins>
                                </div>
                                <?php endif; ?>
                                <!-- end hien thi gia -->
                                <div class="ratings-container">
                                    <!-- hien thi rating -->
                                    <?php 
                                        $avg_featured = 0;
                                        if($productFeature -> pro_total_rating){
                                            $avg_featured = round($productFeature -> pro_total_number/$productFeature -> pro_total_rating,2);
                                        }
                                        
                                    ?>
                                    
                                    <span class="rating-stars selected">
                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                        <a class="star-<?php echo e($i); ?> <?php echo e($i <= $avg_featured ? 'active':''); ?> "><?php echo e($i); ?></a>
                                        <?php endfor; ?>
                                        
                                    </span>
                                    <!-- end hien thi rating -->
                                    <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( <?php echo e($productFeature -> reviews -> count()); ?> Đánh giá )</a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </div>
                </section>


                <section class="grey-section pt-10 pb-5">
                    <div class="container mt-3 mb-4">
                        <h2 class="title">Tin mới nhất</h2>
                        <div class="owl-carousel owl-theme row cols-md-2 cols-1" data-owl-options="{
                            'items': 2,
                            'nav': false,
                            'dots': true,
                            'loop': false,
                            'margin': 20,
                            'responsive': {
                                '0': {
                                    'items': 1
                                },
                                '768': {
                                    'items': 2,
                                    'dots': false
                                }
                            }
                        }">
                            <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="post post-list overlay-dark overlay-zoom appear-animate" data-animation-options="{
                                'name': 'fadeInRightShorter',
                                'delay': '.<?php echo e($index + 2); ?>s'
                            }">
                                <figure class="post-media">
                                    <a href="<?php echo e(route('new.detail',['slug' => slugify($new -> title,'-'),'id' => $new -> id])); ?>">
                                        <img src="<?php echo e(asset('uploads/news/'.$new -> image_name )); ?>" alt="<?php echo e($new -> title); ?>" title="<?php echo e($new -> title); ?>" width="280" height="206"
                                            />
                                    </a>
                                    
                                </figure>
                                <div class="post-details">
                                    <h4 class="post-title"><a href="<?php echo e(route('new.detail',['slug' => slugify($new -> title,'-'),'id' => $new -> id])); ?>"><?php echo e($new -> title); ?></a>
                                    </h4>
                                    <p class="post-content"><?php echo e($new -> description); ?></p>
                                    <a href="<?php echo e(route('new.detail',['slug' => slugify($new -> title,'-'),'id' => $new -> id])); ?>"
                                        class="btn btn-outline btn-md btn-dark btn-icon-right">Chi tiết<i
                                            class="d-icon-arrow-right"></i></a>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </section>

                <section class="pt-10 pb-10 appear-animate">
                    <div class="container">
                        <div class="row">
                            <!-- san pham moi --->
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="widget widget-products appear-animate" data-animation-options="{
                                    'name': 'fadeInLeftShorter',
                                    'delay': '.5s'
                                }">
                                    <h4 class="widget-title">Mới nhất</h4>
                                    <div class="products-col">
                                        <?php $__currentLoopData = $products_latest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productLatest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="product product-list-sm">
                                            <figure class="product-media">
                                                <a href="<?php echo e(route('product.detail',['slug' => slugify($productLatest -> title,'-'),'id' => $productLatest -> id])); ?>">
                                                    <img src="uploads/products-daidien/<?php echo e($productLatest -> image); ?>" alt="<?php echo e($productLatest -> title); ?>" title="<?php echo e($productLatest -> title); ?>"
                                                        width="100" height="100">
                                                </a>
                                                <!-- hien thi label moi -->

                                                <?php if($productLatest -> new == 1): ?>
                                                <div class="product-label-group product-label-group-small">
                                                    <label class="product-label label-new product-label-small">Mới</label>
                                                </div>
                                                <?php endif; ?>
                                                <!-- hien thi label giam gia -->
                                                <?php if(!empty($productLatest -> discount)): ?>
                                                <div class="product-label-group product-label-group-small-price">
                                                    <label class="product-label label-sale product-label-small"><?php echo e($productLatest -> discount); ?> %</label>
                                                </div>
                                                <?php endif; ?>
                                            </figure>
                                            <div class="product-details">
                                                <h3 class="product-name">
                                                    <a href="<?php echo e(route('product.detail',['slug' => slugify($productLatest -> title,'-'),'id' => $productLatest -> id])); ?>"><?php echo e($productLatest -> title); ?></a>
                                                </h3>
                                                <!-- hien thi gia -->
                                                <?php if(!empty($productLatest -> discount)): ?>
                                                <div class="product-price">
                                                    <ins class="new-price">
                                                        
                                                        <?php echo e(formatMoney($productLatest -> price * (100 - $productLatest -> discount)/100)); ?>

                                                    </ins><del class="old-price"><?php echo e(formatMoney($productLatest -> price)); ?></del>
                                                </div>
                                                <?php else: ?>
                                                 <div class="product-price">
                                                    <ins class="new-price"><?php echo e(formatMoney($productLatest -> price)); ?> </ins>
                                                </div>
                                                <?php endif; ?>
                                               
                                                <div class="ratings-container">
                                                    <!-- hien thi rating -->
                                                    <?php 
                                                        $avg_latest = 0;
                                                        if($productLatest -> pro_total_rating){
                                                            $avg_latest = round($productLatest -> pro_total_number/$productLatest -> pro_total_rating,2);
                                                        }
                                                        
                                                    ?>
                                                    
                                                    <span class="rating-stars selected">
                                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                                        <a class="star-<?php echo e($i); ?> <?php echo e($i <= $avg_latest ? 'active':''); ?> "><?php echo e($i); ?></a>
                                                        <?php endfor; ?>
                                                        
                                                    </span>
                                                    <!-- end hien thi rating -->
                                                    <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( <?php echo e($productLatest -> reviews -> count()); ?> Đánh giá)</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      
                                    </div>
                                </div>
                            </div>
                            <!-- san pham ban chay -->
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="widget widget-products appear-animate" data-animation-options="{
                                    'name': 'fadeInLeftShorter',
                                    'delay': '.3s'
                                }">
                                    <h4 class="widget-title">Bán chạy</h4>
                                    <div class="products-col">
                                       <?php $__currentLoopData = $products_selling; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $productSelling): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                       <?php if($key == 3): ?>
                                        <?php break; ?>
                                       <?php endif; ?>

                                        <div class="product product-list-sm">
                                            <figure class="product-media">
                                                <a href="<?php echo e(route('product.detail',['slug' => slugify($productSelling -> title,'-'),'id' => $productSelling -> id])); ?>">
                                                    <img src="uploads/products-daidien/<?php echo e($productSelling -> image); ?>" alt="<?php echo e($productSelling -> title); ?>" title="<?php echo e($productSelling -> title); ?>"
                                                        width="100" height="100">
                                                </a>
                                                <!-- hien thi label moi -->

                                                <?php if($productSelling -> new == 1): ?>
                                                <div class="product-label-group product-label-group-small">
                                                    <label class="product-label label-new product-label-small">Mới</label>
                                                </div>
                                                <?php endif; ?>
                                                <!-- hien thi label giam gia -->
                                                <?php if(!empty($productSelling -> discount)): ?>
                                                <div class="product-label-group product-label-group-small-price">
                                                    <label class="product-label label-sale product-label-small"><?php echo e($productSelling -> discount); ?> %</label>
                                                </div>
                                                <?php endif; ?>
                                            </figure>
                                            <div class="product-details">
                                                <h3 class="product-name">
                                                    <a href="<?php echo e(route('product.detail',['slug' => slugify($productSelling -> title,'-'),'id' => $productSelling -> id])); ?>"><?php echo e($productSelling -> title); ?></a>
                                                </h3>
                                                <!-- hien thi gia -->
                                                <?php if(!empty($productSelling -> discount)): ?>
                                                <div class="product-price">
                                                    <ins class="new-price">
                                                        
                                                        <?php echo e(formatMoney($productSelling -> price * (100 - $productSelling -> discount)/100)); ?>

                                                    </ins><del class="old-price"><?php echo e(formatMoney($productSelling -> price)); ?></del>
                                                </div>
                                                <?php else: ?>
                                                 <div class="product-price">
                                                    <ins class="new-price"><?php echo e(formatMoney($productSelling -> price)); ?> </ins>
                                                </div>
                                                <?php endif; ?>
                                                <div class="ratings-container">
                                                    <!-- hien thi rating -->
                                                    <?php 
                                                        $avg_selling = 0;
                                                        if($productSelling -> pro_total_rating){
                                                            $avg_selling = round($productSelling -> pro_total_number/$productSelling -> pro_total_rating,2);
                                                        }
                                                        
                                                    ?>
                                                    
                                                    <span class="rating-stars selected">
                                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                                        <a class="star-<?php echo e($i); ?> <?php echo e($i <= $avg_selling ? 'active':''); ?> "><?php echo e($i); ?></a>
                                                        <?php endfor; ?>
                                                        
                                                    </span>
                                                    <!-- end hien thi rating -->
                                                    <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( <?php echo e($productSelling -> reviews -> count()); ?>

                                                        Đánh giá )</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- sản phẩm rating cao -->
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="widget widget-products appear-animate" data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'delay': '.3s'
                                }">
                                    <h4 class="widget-title">Bình chọn cao</h4>
                                    <div class="products-col">
                                          <?php $__currentLoopData = $products_rate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productRate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="product product-list-sm">
                                            <figure class="product-media">
                                                <a href="<?php echo e(route('product.detail',['slug' => slugify($productRate -> title,'-'),'id' => $productRate -> id])); ?>">
                                                    <img src="uploads/products-daidien/<?php echo e($productRate -> image); ?>" alt="<?php echo e($productRate -> title); ?>" title="<?php echo e($productRate -> title); ?>"
                                                        width="100" height="100">
                                                </a>
                                                <!-- hien thi label moi -->

                                                <?php if($productRate -> new == 1): ?>
                                                <div class="product-label-group product-label-group-small">
                                                    <label class="product-label label-new product-label-small">Mới</label>
                                                </div>
                                                <?php endif; ?>
                                                <!-- hien thi label giam gia -->
                                                <?php if(!empty($productRate -> discount)): ?>
                                                <div class="product-label-group product-label-group-small-price">
                                                    <label class="product-label label-sale product-label-small"><?php echo e($productRate -> discount); ?> %</label>
                                                </div>
                                                <?php endif; ?>
                                            </figure>
                                            <div class="product-details">
                                                <h3 class="product-name">
                                                    <a href="<?php echo e(route('product.detail',['slug' => slugify($productRate -> title,'-'),'id' => $productRate -> id])); ?>"><?php echo e($productRate -> title); ?></a>
                                                </h3>
                                                <!-- hien thi gia -->
                                                <?php if(!empty($productRate -> discount)): ?>
                                                <div class="product-price">
                                                    <ins class="new-price">
                                                        
                                                        <?php echo e(formatMoney($productRate -> price * (100 - $productRate -> discount)/100)); ?>

                                                    </ins><del class="old-price"><?php echo e(formatMoney($productRate -> price)); ?></del>
                                                </div>
                                                <?php else: ?>
                                                 <div class="product-price">
                                                    <ins class="new-price"><?php echo e(formatMoney($productRate -> price)); ?></ins>
                                                </div>
                                                <?php endif; ?>
                                                <div class="ratings-container">
                                                    <!-- hien thi rating -->
                                                    <?php 
                                                        $avg_rate = 0;
                                                        if($productRate -> pro_total_rating){
                                                            $avg_rate = round($productRate -> pro_total_number/$productRate -> pro_total_rating,2);
                                                        }
                                                        
                                                    ?>
                                                    
                                                    <span class="rating-stars selected">
                                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                                        <a class="star-<?php echo e($i); ?> <?php echo e($i <= $avg_rate ? 'active':''); ?> "><?php echo e($i); ?></a>
                                                        <?php endfor; ?>
                                                        
                                                    </span>
                                                    <!-- end hien thi rating -->
                                                    <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( <?php echo e($productRate -> reviews -> count()); ?>

                                                        Đánh giá )</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                            <!-- sản phẩm giảm giá -->
                            <div class="col-lg-3 col-md-6 mb-4">
                                <div class="widget widget-products appear-animate" data-animation-options="{
                                    'name': 'fadeInRightShorter',
                                    'delay': '.5s'
                                }">
                                    <h4 class="widget-title">Giảm giá</h4>
                                    <div class="products-col">
                                         <?php $__currentLoopData = $products_sale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $productSale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="product product-list-sm">
                                            <figure class="product-media">
                                                <a href="<?php echo e(route('product.detail',['slug' => slugify($productSale -> title,'-'),'id' => $productSale -> id])); ?>">
                                                    <img src="uploads/products-daidien/<?php echo e($productSale -> image); ?>" alt="<?php echo e($productSale -> title); ?>" title="<?php echo e($productSale -> title); ?>"
                                                        width="100" height="100">
                                                </a>
                                                <!-- hien thi label moi -->

                                                <?php if($productSale -> new == 1): ?>
                                                <div class="product-label-group product-label-group-small">
                                                    <label class="product-label label-new product-label-small">Mới</label>
                                                </div>
                                                <?php endif; ?>
                                                <!-- hien thi label giam gia -->
                                                <?php if(!empty($productSale -> discount)): ?>
                                                <div class="product-label-group product-label-group-small-price">
                                                    <label class="product-label label-sale product-label-small"><?php echo e($productSale -> discount); ?> %</label>
                                                </div>
                                                <?php endif; ?>
                                            </figure>
                                            <div class="product-details">
                                                <h3 class="product-name">
                                                    <a href="<?php echo e(route('product.detail',['slug' => slugify($productSale -> title,'-'),'id' => $productSale -> id])); ?>"><?php echo e($productSale -> title); ?></a>
                                                </h3>
                                               <!-- hien thi gia -->
                                                <?php if(!empty($productSale -> discount)): ?>
                                                <div class="product-price">
                                                    <ins class="new-price">
                                                        
                                                        <?php echo e(formatMoney($productSale -> price * (100 - $productSale -> discount)/100)); ?>

                                                    </ins><del class="old-price"><?php echo e(formatMoney($productSale -> price)); ?></del>
                                                </div>
                                                <?php else: ?>
                                                 <div class="product-price">
                                                    <ins class="new-price"><?php echo e(formatMoney($productSale -> price)); ?></ins>
                                                </div>
                                                <?php endif; ?>
                                                <div class="ratings-container">
                                                    <!-- hien thi rating -->
                                                    <?php 
                                                        $avg_sale = 0;
                                                        if($productSale -> pro_total_rating){
                                                            $avg_sale = round($productSale -> pro_total_number/$productSale -> pro_total_rating,2);
                                                        }
                                                        
                                                    ?>
                                                    
                                                    <span class="rating-stars selected">
                                                        <?php for($i = 1; $i <= 5; $i++): ?>
                                                        <a class="star-<?php echo e($i); ?> <?php echo e($i <= $avg_sale ? 'active':''); ?> "><?php echo e($i); ?></a>
                                                        <?php endfor; ?>
                                                        
                                                    </span>
                                                    <!-- end hien thi rating -->
                                                    <a href="#product-tab-reviews" class="link-to-tab rating-reviews">(<?php echo e($productSale -> reviews -> count()); ?>

                                                        Đánh giá)</a>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
	
	

	<?php $__env->stopSection(); ?>



<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/frontend/home/home.blade.php ENDPATH**/ ?>