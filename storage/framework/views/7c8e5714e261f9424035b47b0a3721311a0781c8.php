
	<?php $__env->startSection('title'); ?>
		<title><?php echo e($keyword); ?></title>
	<?php $__env->stopSection(); ?>
	<?php $__env->startSection('css'); ?>
		<link href="<?php echo e(asset('css/nouislider/nouislider.min.css')); ?>" rel="stylesheet">
		<link href="<?php echo e(asset('css/style.min.css')); ?>" rel="stylesheet">
		<link href="<?php echo e(asset('css/home.css')); ?>" rel="stylesheet">
	<?php $__env->stopSection(); ?>

	<?php $__env->startSection('js'); ?>
		<script src=" <?php echo e(asset('js/sticky/sticky.min.js')); ?> "></script>
		<script src=" <?php echo e(asset('js/nouislider/nouislider.min.js')); ?> "></script>
	<?php $__env->stopSection(); ?>

	<?php $__env->startSection('content'); ?>
	<main class="main">
		<div class="page-header bg-dark"
			style="background-image: url('<?php echo e(asset('images/page-header.jpg')); ?>'); background-color: #3C63A4;">
			


			<h1 class="page-title"  style="color: black;"><?php echo e($keyword); ?></h1>
			<ul class="breadcrumb">
				<li><a href="<?php echo e(route('home')); ?>" style="color: black;"><i class="d-icon-home"></i></a></li>
				<li  style="color: black;"><?php echo e($keyword); ?></li>
				
			</ul>
		</div>
		<!-- End PageHeader -->
		


		<div class="page-content mb-10">
				<div class="container">
					<div class="main-content">
						
						<br />	
						<div class="row cols-2 cols-sm-3 cols-md-4 cols-xl-5 product-wrapper">
							<?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
							<div class="product-wrap">
								<div class="product shadow-media">
									<figure class="product-media">
										<a href="<?php echo e(route('product.detail',['slug' => slugify($product -> title,'-'),'id' => $product -> id])); ?>">
											<img src="<?php echo e(asset('uploads/products-daidien/'.$product -> image)); ?>" alt="<?php echo e($product -> title); ?>" title="<?php echo e($product -> title); ?>" width="280" height="315">
										</a>
										<div class="product-label-group">
											<label class="product-label label-new">new</label>
										</div>
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
											<a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
												data-target="#addCartModal" title="Add to cart"><i
													class="d-icon-bag"></i></a>
										</div>
										<div class="product-action">
											<a href="<?php echo e(route('product.detail',['slug' => slugify($product -> title,'-'),'id' => $product -> id])); ?>" class="btn-product" title="<?php echo e($product -> title); ?>">Xem chi tiết</a>
										</div>
									</figure>
									<div class="product-details">
										<a href="#" class="btn-wishlist" title="Add to wishlist"><i
												class="d-icon-heart"></i></a>
										
										<h3 class="product-name">
											<a href="<?php echo e(route('product.detail',['slug' => slugify($product -> title,'-'),'id' => $product -> id])); ?>"><?php echo e($product -> title); ?></a>
										</h3>
										<?php if(!empty($product -> discount)): ?>
		                                <div class="product-price">
		                                    <ins class="new-price">
		                                        
		                                        <?php echo e($product -> price * (100 - $product -> discount)/100); ?>đ
		                                    </ins><del class="old-price"><?php echo e($product -> price); ?> đ</del>
		                                </div>
		                                <?php else: ?>
		                                 <div class="product-price">
		                                    <ins class="new-price"><?php echo e($product -> price); ?> đ</ins>
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
                                            <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( 6
                                                reviews )</a>
                                        </div>
									</div>
								</div>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
							<div>Không tìm thấy sản phẩm với từ khóa <b> <?php echo e($keyword); ?></b></div>
							
							<?php endif; ?>
							

							
							
						</div>
						<nav class="toolbox toolbox-pagination">
							<p class="show-info">Showing <span>12 of 56</span> Products</p>
							<ul class="pagination">
								<li class="page-item disabled">
									<a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1"
										aria-disabled="true">
										<i class="d-icon-arrow-left"></i>Prev
									</a>
								</li>
								<li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a>
								</li>
								<li class="page-item"><a class="page-link" href="#">2</a></li>
								<li class="page-item"><a class="page-link" href="#">3</a></li>
								<li class="page-item page-item-dots"><a class="page-link" href="#">6</a></li>
								<li class="page-item">
									<a class="page-link page-link-next" href="#" aria-label="Next">
										Next<i class="d-icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</nav>
					</div>
					
				</div>
			</div>
	</main>
	
	

	<?php $__env->stopSection(); ?>

	
	
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/frontend/product/search.blade.php ENDPATH**/ ?>