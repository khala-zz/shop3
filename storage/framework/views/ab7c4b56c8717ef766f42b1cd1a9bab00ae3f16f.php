
	<?php $__env->startSection('title'); ?>
		<title><?php echo e($product -> title); ?></title>
	<?php $__env->stopSection(); ?>
	<?php $__env->startSection('css'); ?>
		<link href="<?php echo e(asset('css/photoswipe/photoswipe.min.css')); ?>" rel="stylesheet">
		
		<link href="<?php echo e(asset('css/photoswipe/default-skin/default-skin.min.css')); ?>" rel="stylesheet">
		<link href="<?php echo e(asset('css/home.css')); ?>" rel="stylesheet">
		

		
	<?php $__env->stopSection(); ?>

	<?php $__env->startSection('js'); ?>
		<script src=" <?php echo e(asset('js/sticky/sticky.min.js')); ?> "></script>
		<script src=" <?php echo e(asset('js/photoswipe/photoswipe.min.js')); ?> "></script>
		<script src=" <?php echo e(asset('js/photoswipe/photoswipe-ui-default.min.js')); ?> "></script>
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
	<main class="main mt-2">
			<div class="page-content mb-10">
				<div class="container">
					<div class="product-navigation">
						<ul class="breadcrumb breadcrumb-lg">
							<li><a href="<?php echo e(url('/')); ?>"><i class="d-icon-home"></i></a></li>
							<li><a href="<?php echo e(route('category.product',['slug' => slugify($product -> category -> title,'-'),'id' => $product -> category -> id])); ?>" class="active"><?php echo e($product -> category -> title); ?></a></li>
							<li><?php echo e($product -> title); ?></li>
						</ul>
					
					</div>
					<div class="row gutter-lg">
						<aside class="col-lg-3 right-sidebar sidebar-fixed sticky-sidebar-wrapper">
							<div class="sidebar-overlay">
								<a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
							</div>
							<a href="#" class="sidebar-toggle"><i class="fas fa-chevron-left"></i></a>
							<div class="sidebar-content">
								<div class="sticky-sidebar">
									<!-- hien thi setting -->
									<div class="service-list mb-4">
										<?php $__currentLoopData = $settings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $setting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										
										<div class="icon-box icon-box-side icon-box<?php echo e($index + 1); ?>">
											<span class="icon-box-icon">
												<i class="<?php echo e($setting -> setting_key == 'Bảo mật'?'d-icon-secure':($setting -> setting_key == 'Vận chuyển'?'d-icon-truck':'d-icon-money')); ?>">
												</i>
											</span>
											<div class="icon-box-content">
												<?php echo $setting -> setting_value; ?>

											</div>
										</div>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<!-- end hien thi setting -->	
										
									</div>
									<div class="banner banner-fixed mb-4">
										<figure>
											<a href="<?php echo e(url('cua-hang')); ?>">
											<img src="<?php echo e(asset('images/product-banner.jpg')); ?>" alt="banner" width="280"
												height="320" title="Cửa hàng">
												</a>
										</figure>
									</div>
									<!-- san pham noi bat -->
									<div class="widget widget-products">
										<h4 class="widget-title">Nổi bật</h4>
										<div class="widget-body">
											<div class="owl-carousel owl-nav-top" data-owl-options="{
												'items': 1,
												'loop': true,
												'nav': true,
												'dots': false,
'margin': 20											}">
												<?php $__currentLoopData = $products_featured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyFeatured => $productsFeatured): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<?php if($keyFeatured % 3 == 0): ?>
													<div class="products-col">
												<?php endif; ?>
													<div class="product product-list-sm">
														<figure class="product-media">
															<a href="<?php echo e(route('product.detail',['slug' => slugify($productsFeatured -> title,'-'),'id' => $productsFeatured -> id])); ?>">
																<img src = "<?php echo e(asset('uploads/products-daidien/'.$productsFeatured -> image)); ?>" alt="<?php echo e($productsFeatured -> title); ?>" title="<?php echo e($productsFeatured -> title); ?>"
																	width="100" height="100">
															</a>
															<!-- hien thi label mới -->
															<?php if($productsFeatured -> new == 1): ?>
			                                                <div class="product-label-group product-label-group-small">
			                                                    <label class="product-label label-new product-label-small">Mới</label>
			                                                </div>
			                                                <?php endif; ?>
			                                                <!-- hien thi label giam gia -->
			                                                <?php if(!empty($productsFeatured -> discount)): ?>
			                                                <div class="product-label-group product-label-group-small-price">
			                                                    <label class="product-label label-sale product-label-small"><?php echo e($productsFeatured -> discount); ?> %</label>
			                                                </div>
			                                                <?php endif; ?>
														</figure>
														<div class="product-details">
															<h3 class="product-name">
																<a href="<?php echo e(route('product.detail',['slug' => slugify($productsFeatured -> title,'-'),'id' => $productsFeatured -> id])); ?>"><?php echo e($productsFeatured -> title); ?></a>
															</h3>
															<!-- hien thi gia -->
			                                                <?php if(!empty($productsFeatured -> discount)): ?>
			                                                <div class="product-price">
			                                                    <ins class="new-price">
			                                                        
			                                                        <?php echo e(formatMoney($productsFeatured -> price * (100 - $productsFeatured -> discount)/100)); ?>

			                                                    </ins><del class="old-price"><?php echo e(formatMoney($productsFeatured -> price)); ?></del>
			                                                </div>
			                                                <?php else: ?>
			                                                 <div class="product-price">
			                                                    <ins class="new-price"><?php echo e(formatMoney($productsFeatured -> price)); ?></ins>
			                                                </div>
			                                                <?php endif; ?>
			                                                <!-- end hien thi gia -->
															<div class="ratings-container">
																<!-- hien thi rating -->
																<?php 
																	$avg_featured = 0;
																	if($productsFeatured -> pro_total_rating){
																		$avg_featured = round($productsFeatured -> pro_total_number/$productsFeatured -> pro_total_rating,2);
																	}
																	
																?>
																
																<span class="rating-stars selected">
																	<?php for($i = 1; $i <= 5; $i++): ?>
																	<a class="star-<?php echo e($i); ?> <?php echo e($i <= $avg_featured ? 'active':''); ?> "><?php echo e($i); ?></a>
																	<?php endfor; ?>
																	
																</span>
																<!-- end hien thi rating -->
																
																	<a href="<?php echo e(route('product.detail',['slug' => slugify($productsFeatured -> title,'-'),'id' => $productsFeatured -> id.'?r=product-tab-reviews'])); ?>" class="link-to-tab rating-reviews">( <?php echo e($productsFeatured -> reviews -> count()); ?> Đánh giá )</a>
															</div>
														</div>
													</div>
												<?php if($keyFeatured % 3 == 2): ?>	
												</div>
												<?php endif; ?>
												
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</div>
										</div>
									</div><!-- End Widget Products -->
								</div>
							</div>
						</aside>
						<div class="col-lg-9">
							<!-- image gallery -->
							<div class="product product-single row mb-4">
								<div class="col-md-6">
									<div class="product-gallery">
										<div
											class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1">
											<?php $__currentLoopData = $product -> gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imageGallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<figure class="product-image">
												<img src="<?php echo e(asset('uploads/'.$product->id.'/medium/'.$imageGallery -> image)); ?>"
													data-zoom-image="<?php echo e(asset('uploads/'.$product->id.'/large/'.$imageGallery -> image)); ?>"
													alt="<?php echo e($product -> title.'-'.$imageGallery -> image); ?>" width="800" height="900">
											</figure>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											
										</div>
										<div class="product-thumbs-wrap">
											<div class="product-thumbs">
												<?php $__currentLoopData = $product -> gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $imageGallerySmall): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<div class="product-thumb <?php echo e($index == 0 ? 'active' : ''); ?>">
													<img src="<?php echo e(asset('uploads/'.$product->id.'/small/'.$imageGallerySmall -> image)); ?>"
														alt="<?php echo e($product -> title.'-'.$imageGallerySmall -> image); ?>" width="109" height="122">
												</div>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												
											</div>
											<button class="thumb-up disabled"><i
													class="fas fa-chevron-left"></i></button>
											<button class="thumb-down disabled"><i
													class="fas fa-chevron-right"></i></button>
										</div>
									</div>
								</div>
								<!-- thong tin san pham -->
								<div class="col-md-6">
									<!-- form dung de add to cart -->
									<form name = "addToCart" method = "post" action = "<?php echo e(url('/add-cart')); ?>">
										<?php echo csrf_field(); ?>
										<!-- cac input field dể add đến cart -->
										<input type="hidden" name="product_id" value="<?php echo e($product -> id); ?>">
										<input type="hidden" name="product_name" value="<?php echo e($product -> title); ?>">
										<input type="hidden" name="product_code" value="<?php echo e($product -> product_code); ?>">
										<!-- end input field -->
										<div class="product-details">
											<!--hien thi thong bao -->
											<?php if(Session::has('flash_message_error')): ?>
												<div class="alert alert-danger alert-dark alert-round alert-inline">
				                                    
				                                    <?php echo session('flash_message_error'); ?>

				                                    <button type="button" class="btn btn-link btn-close">
				                                        <i class="d-icon-times"></i>
				                                    </button>
				                                </div>
											<?php endif; ?>
											<!-- end hien thi thong bao -->
											<h1 class="product-name"><?php echo e($product -> title); ?></h1>
											<div class="product-meta">
												Mã sản phẩm: <span class="product-sku"><?php echo e($product -> product_code); ?></span>
												Nhãn hiệu: <span class="product-brand"><?php echo e($product -> brand -> title); ?></span>
											</div>
											
											<!-- hien thi gia -->

			                                <?php if(!empty($product -> discount)): ?>
			                                <div class="product-price">
			                                    <ins class="new-price">
			                                        <?php $product_price_reset = $product -> price * (100 - $product -> discount)/100; ?>
			                                        <?php echo e(formatMoney($product -> price * (100 - $product -> discount)/100)); ?>

			                                        <input type="hidden" id = "product_price" name="product_price" value="<?php echo e($product -> price * (100 - $product -> discount)/100); ?>">
			                                    </ins><del class="old-price"><?php echo e(formatMoney($product -> price)); ?></del>
			                                </div>
			                                <?php else: ?>
			                                 <div class="product-price">
			                                 	 <?php $product_price_reset = $product -> price; ?>
			                                 	 <ins class="new-price">
			                                 	<?php echo e(formatMoney($product -> price)); ?>

			                                 	<input type="hidden" id = "product_price" name="product_price" value="<?php echo e($product -> price); ?>">
			                                 </ins>
			                                 </div>
			                                <?php endif; ?>

				                            <!-- end hien thi gia -->

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

											<p class="product-short-desc"><?php echo $product -> description_short; ?></p>
											<!-- mau san pham -->
											<?php if($categoryFeatures): ?>	
												<div class="product-form product-color">
													<label>Màu:</label>
													<div class="product-variations ">

														<?php $__empty_1 = true; $__currentLoopData = $categoryFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryColorFeature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
															
														<!-- kiem tra xem gia tri co bat dau bang # neu bang # la ma mau de hien thi cac mau cho sp -->
															<?php if($categoryColorFeature -> field_type == 2): ?>
																<a class="color change-color" data-src="images/demos/demo7/products/big1.jpg"
																href="#"  style="background-color: <?php echo e($categoryColorFeature -> field_title); ?>" data-value ="<?php echo e($categoryColorFeature -> field_title); ?>"></a>
																
															<?php endif; ?>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
															<p>Đang cập nhật</p>	
														<?php endif; ?>
														
													</div>
												</div>
												

												<!-- size san pham -->
												<div class="product-form product-size">
													<label>Size:</label>
													<div class="product-form-group">
														<div class="product-variations">
															
															<?php $__empty_1 = true; $__currentLoopData = $categoryFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorySizeFeature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
																
																<!-- kiem tra field_type =1 la ma text de hien thi text cho sp -->
																<?php if($categorySizeFeature -> field_type == 1): ?>
																<a class="size change-price" href="#" data-url="<?php echo e(route('change-price',['value' => $categorySizeFeature -> id])); ?>"><?php echo e($categorySizeFeature -> field_title); ?></a>
																
																<?php endif; ?>	
															<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
															<p>Đang cập nhật</p>	
															<?php endif; ?>
														</div>
														
														<a href="#" class="product-variation-clean change-price" data-url="<?php echo e(route('change-price-reset',['value' => $product_price_reset])); ?>">Giá ban đầu</a>
													</div>
												</div>
											<?php endif; ?>

											<!--<div class="product-variation-price">
												<span>$239.00</span>
											</div>-->

											<hr class="product-divider">

											<div class="product-form product-qty">
												<label>Số lượng:</label>
												<div class="product-form-group">
													<div class="input-group">
														<button type ="button" class="quantity-minus d-icon-minus"></button>
														<input class="quantity form-control" type="number" min="1"
															max="1000000" name="product_quantity">
														<button type ="button" class="quantity-plus d-icon-plus"></button>
													</div>
													<button type = "submit" class="btn-product btn-cart-khala" ><i class="d-icon-bag"></i>Thêm vào giỏ hàng</button>
												</div>
											</div>



											<hr class="product-divider mb-3">

											<div class="product-footer">
												<div class="social-links mr-2">
													<a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
													<a href="#" class="social-link social-twitter fab fa-twitter"></a>
													<a href="#" class="social-link social-vimeo fab fa-vimeo-v"></a>
												</div>
												
											</div>
										</div>

									</form>
								</div>
							</div>

							<div class="tab tab-nav-simple product-tabs mb-4">

								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a class="nav-link  <?php echo e(request()-> has('r')?'':'active'); ?>" href="#product-tab-description">Mô tả sản phẩm</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#product-tab-additional">Thông tin thêm</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#product-tab-shipping-returns">Quy định giao và trả hàng</a>
									</li>
									<li class="nav-item">
										<a class="nav-link <?php echo e(request()-> has('r')?'active':''); ?>" href="#product-tab-reviews">Các đánh giá (<?php echo e($reviews -> count()); ?>)</a>
									</li>
								</ul>
								<div class="tab-content">
									 
									<div class="tab-pane  <?php echo e(request()-> has('r')?'':'in active'); ?> " id="product-tab-description">

										<?php echo $product -> description; ?>

									</div>
									<div class="tab-pane" id="product-tab-additional">

										<?php echo $product -> additional; ?>

									</div>
									<div class="tab-pane" id="product-tab-shipping-returns">
										<?php echo $setting_chinh_sach -> setting_value; ?>


									</div>
									<div class="tab-pane <?php echo e(request()-> has('r') ?'in active':''); ?>" id="product-tab-reviews">
										
										<div class="d-flex align-items-center mb-5">
											<h4 class="mb-0 mr-2">Đánh giá:</h4>
											<div class="ratings-container average-rating mb-0">
												
												<!-- hien thi rating -->
												
												<span class="rating-stars selected">
													<?php for($i = 1; $i <= 5; $i++): ?>
													<a class="star-<?php echo e($i); ?> <?php echo e($i <= $avg ? 'active-tab-review':''); ?> "><?php echo e($i); ?></a>
													<?php endfor; ?>
													
												</span>
												<!-- end hien thi rating -->

											</div>
										</div>

										<div class="comments mb-6">
											<?php if($reviews -> count() > 0): ?>
											<ul>
												<?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<li>
													<div class="comment">
														<figure class="comment-media">
															<a href="#">
																<img src="<?php echo e(url('uploads/users/' . $review -> user -> image)); ?>" alt="<?php echo e($review -> user -> name); ?>" title="<?php echo e($review -> user -> name); ?>">
															</a>
														</figure>
														
														<div class="comment-body">
															<div class="comment-rating ratings-container mb-0">
																<span class="rating-stars selected">
																	<?php for($i = 1; $i <= 5; $i++): ?>
																	<a class="star-<?php echo e($i); ?> <?php echo e($i <= $review -> rating ? 'active-tab-review':''); ?> "><?php echo e($i); ?></a>
																	<?php endfor; ?>
																	
																</span>
																
															</div>
															<div class="comment-user">
																<h4><a href="#"><?php echo e($review -> user -> name); ?></a></h4>
																<span class="comment-date"><?php echo e($review -> created_at); ?></span>
															</div>

															<div class="comment-content">
																<p><?php echo e($review -> comment); ?></p>
															</div>
														</div>
													</div>
												</li>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												
											</ul>
											<?php else: ?>
											<p>Chưa có đánh giá</p>
											<?php endif; ?>
										</div>
										<!-- End Comments -->
										<!-- kiem tra neu dang nhap moi cho gui danh gia -->
											<?php if(Auth::check()): ?>
										<div class="reply">
											<div class="title-wrapper text-left">
												<h3 class="title title-simple text-left text-normal">Thêm đánh giá</h3>
												
											</div>
											
											<div class="rating-form">
												<label for="rating">Đánh giá của bạn: </label>
												<span class="rating-stars selected">
													<?php for($i = 1; $i <= 5; $i++): ?>
													<a class="star-<?php echo e($i); ?> start-a" href="#" data-key = "<?php echo e($i); ?>"><?php echo e($i); ?></a>
													<?php endfor; ?>
													
												</span>


												<select name="rating" id="rating" required="" style="display: none;">
													<option value="">Rate…</option>
													<option value="5">Tuyệt vời quá</option>
													<option value="4">Rất tốt</option>
													<option value="3">Bình thường</option>
													<option value="2">Tạm được</option>
													<option value="1">Không thích</option>
												</select>

											</div>

											<form action="#">
												<input type="hidden"  class="number_rating">
												<textarea id="reply-message" cols="30" rows="4"
													class="form-control mb-4" placeholder="Đánh giá của bạn"
													required></textarea>
												
												
												<a href="<?php echo e(route('post.review.product',$product -> id)); ?>" class="btn btn-primary btn-md" id="submit_review">Gửi<i
														class="d-icon-arrow-right" ></i></a>
											</form>
											
											
										</div>
										<?php else: ?>
										
           
								            <form class="" method="POST" action="<?php echo e(route('front-login')); ?>">
								                 <?php echo csrf_field(); ?>
								                <h3 class="ls-m mb-1">Đăng nhập</h3>
								                <p class="text-grey">Vui lòng đăng nhập để đánh giá
								                </p>
								                <div class="row">
								                    
								                    <?php if($errors): ?>
								                        <div class="col-md-12 mb-4">
								                           
								                            <?php echo $errors->first('email', '<p class="help-block" style="color:red;">:message</p>'); ?>

								                            <?php echo $errors->first('password', '<p class="help-block" style="color:red;">:message</p>'); ?>

								                        </div>
								                    <?php endif; ?>
								                    <div class="col-md-12 mb-4">
								                        <input class="form-control" type="email" name = "email" id="email" placeholder="Email *" value = "<?php echo e(old('email')); ?>" required>
								                        
								                    </div>
								                    <div class="col-md-12 mb-4">
								                        <input class="form-control" type="password" name = "password" id="password" placeholder="Mật khẩu *" required>
								                        
								                    </div>
								                   


								                </div>
								                <button type = "submit" class="btn btn-md btn-primary mb-2">Đăng nhập</button>
								            </form>
								        
										<?php endif; ?>
										<!--end  kiem tra neu dang nhap moi cho gui danh gia -->
										<!-- End Reply -->
									</div>
								</div>
							</div>

							<section>
								<h2 class="title title-link mb-4">Sản phẩm liên quan
									<a href="<?php echo e(url('cua-hang?category_id='.$product -> category_id)); ?>" class="btn btn-link btn-slide-right">Xem tất cả<i
											class="fa fa-chevron-right"></i></a>
								</h2>

								<div class="owl-carousel owl-theme owl-nav-full row cols-2 cols-md-3 cols-lg-4"
									data-owl-options="{
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
									<?php $__empty_1 = true; $__currentLoopData = $products_related; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product_new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<!-- kiem tra xem product co giam gia hay khong? -->
										<?php if(!empty($product_new -> discount)): ?>
					                        <?php $product_price = $product_new -> price * (100 - $product_new -> discount)/100; ?>        
		                                <?php else: ?>
		                                 	<?php $product_price = $product_new -> price; ?>
		                                <?php endif; ?>
		                                <!-- end kiem tra xem product co giam gia hay khong? -->
										<div class="product shadow-media">
											<figure class="product-media">
												<a href="<?php echo e(route('product.detail',['slug' => slugify($product_new -> title,'-'),'id' => $product_new -> id])); ?>">
													<img src="<?php echo e(asset('uploads/products-daidien/'.$product_new -> image )); ?>" alt="<?php echo e($product_new -> title); ?>" title="<?php echo e($product_new -> title); ?>" width="280"
														height="315">
												</a>
												 <!-- hien thi label giam gia -->
				                                <?php if(!empty($product_new -> discount)): ?>
				                                <div class="product-label-group product-label-group-price">
				                                    <label class="product-label label-sale"><?php echo e($product_new -> discount); ?> %</label>
				                                </div>
				                                <?php endif; ?>
				                                <!-- end hien thi label giam gia -->
												<div class="product-action-vertical">
													<a href="<?php echo e(url('add-cart')); ?>" class="btn-product-icon btn-cart btn-add-cart"  title="Thêm vào giở hàng"
													value = "<?php echo e($product_new -> id.'khala'.$product_new -> product_code.'khala'.$product_new -> title.'khala'.$product_price); ?>">
														<i class="d-icon-bag"></i>
													</a>
												</div>
												<div class="product-action">
													<a href="<?php echo e(route('product.detail',['slug' => slugify($product_new -> title,'-'),'id' => $product_new -> id])); ?>" class="btn-product" title="<?php echo e($product_new -> title); ?>">Xem chi tiết</a>
												</div>
											</figure>
											<div class="product-details">
												
												
												<h3 class="product-name">
													<a href="<?php echo e(route('product.detail',['slug' => slugify($product_new -> title,'-'),'id' => $product_new -> id])); ?>"><?php echo e($product_new -> title); ?></a>
												</h3>
												<!-- hien thi gia -->
				                                <?php if(!empty($product_new -> discount)): ?>
				                                <div class="product-price">
				                                    <ins class="new-price">
				                                        
				                                        <?php echo e(formatMoney($product_new -> price * (100 - $product_new -> discount)/100)); ?>

				                                    </ins><del class="old-price"><?php echo e(formatMoney($product_new -> price)); ?></del>
				                                </div>
				                                <?php else: ?>
				                                 <div class="product-price">
				                                    <ins class="new-price"><?php echo e(formatMoney($product_new -> price)); ?></ins>
				                                </div>
				                                <?php endif; ?>
				                                <!-- end hien thi gia -->
												<div class="ratings-container">
													<!-- hien thi rating -->
													<?php 
														$avg_new = 0;
														if($product_new -> pro_total_rating){
															$avg_new = round($product_new -> pro_total_number/$product_new -> pro_total_rating,2);
														}
													?>
													
													<span class="rating-stars selected">
														<?php for($i = 1; $i <= 5; $i++): ?>
														<a class="star-<?php echo e($i); ?> <?php echo e($i <= $avg_new ? 'active':''); ?> "><?php echo e($i); ?></a>
														<?php endfor; ?>
														
													</span>
													<!-- end hien thi rating -->
													<a href="<?php echo e(route('product.detail',['slug' => slugify($product_new -> title,'-'),'id' => $product_new -> id.'?r=product-tab-reviews'])); ?>" class="link-to-tab rating-reviews">( <?php echo e($product_new -> reviews -> count()); ?> Đánh giá )</a>
												</div>
											</div>
										</div>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<div class="product shadow-media">
											Chưa có sản phẩm mới
										</div>
									<?php endif; ?>
									
								</div>
							</section>
						</div>
					</div>
				</div>
			</div>
		</main>
	
	

	<?php $__env->stopSection(); ?>

	
	
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/frontend/product/detail.blade.php ENDPATH**/ ?>