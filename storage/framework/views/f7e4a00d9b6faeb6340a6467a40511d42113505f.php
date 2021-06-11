

	<?php $__env->startSection('title'); ?>
		<title><?php echo e($category -> title); ?></title>
	<?php $__env->stopSection(); ?>
	<?php $__env->startSection('css'); ?>
		<link href="<?php echo e(asset('css/nouislider/nouislider.min.css')); ?>" rel="stylesheet">
		<link href="<?php echo e(asset('css/style.min.css')); ?>" rel="stylesheet">
		<link href="<?php echo e(asset('css/home.css')); ?>" rel="stylesheet">
	<?php $__env->stopSection(); ?>

	<?php $__env->startSection('js'); ?>
		<script src=" <?php echo e(asset('js/sticky/sticky.min.js')); ?> "></script>
		<script src=" <?php echo e(asset('js/nouislider/nouislider.min.js')); ?> "></script>
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
			<div class="page-header bg-dark"
				style="background-image: url('<?php echo e(asset('uploads/categories/'.$category -> image)); ?>'); background-color: #3C63A4;">
				<h3 class="page-subtitle"><?php echo e($category -> title); ?></h3>
				<h1 class="page-title"><?php echo e($category -> description); ?></h1>
				<ul class="breadcrumb">
					<li><a href="<?php echo e(route('home')); ?>"><i class="d-icon-home"></i></a></li>
					<li><?php echo e($category -> title); ?></li>
					
				</ul>
			</div>
			<!-- End PageHeader -->
			<div class="page-content mb-10">
				<div class="container">
					<div class="row main-content-wrap gutter-lg">
						<aside
							class="col-lg-3 sidebar sidebar-fixed sidebar-toggle-remain shop-sidebar sticky-sidebar-wrapper">
							<div class="sidebar-overlay">
								<a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
							</div>
							<div class="sidebar-content">
								<div class="sticky-sidebar" data-sticky-options="{'top': 10}">
									<div class="filter-actions">
										<a href="#"
											class="sidebar-toggle-btn toggle-remain btn btn-sm btn-outline btn-primary">Bộ lọc<i
												class="d-icon-arrow-left"></i></a>
										<a href="#" onclick="location.href='<?php echo e(url()->current()); ?>';" class="filter-clean text-primary">Bỏ lọc</a>
									</div>
									<div class="widget widget-collapsible">
										<h3 class="widget-title">Danh mục sản phẩm</h3>
										
										
										<!--- menu categorry -->
                                        <ul class="widget-body filter-items search-ul">
                                        	<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if( $item -> parent == null): ?>
                                            <li>
                                                <a href="<?php echo e(route('category.product',['slug' => slugify($item -> title,'-'),'id' => $item -> id])); ?>" class="<?php echo e(count($item->children) ? 'show' :''); ?> <?php echo e(Request::segment(3) == $item-> id ? 'active-filters' : ''); ?>"><?php echo e($item->title); ?></a>
                                                 
                                                 <?php if(count($item->children)): ?>
                                                 
								                    <?php echo $__env->make('frontend.news.menusub',['childs' => $item -> children], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
								                 <?php endif; ?>
                                                
                                            </li>
                                            <?php endif; ?>
                                           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                        <!--- end menu categorry -->
									</div>
									<!-- giá -->
									<div class="widget widget-collapsible">
										<h3 class="widget-title">Giá : </h3>
										<div class="widget-body">
											<form action="<?php echo e(url()->current()); ?>">
												<div class="filter-price-slider"></div>

												<div class="filter-actions">
													<button type="submit" class="btn btn-sm btn-primary">Tìm</button>

													<div class="filter-price-text">Giá :
															
															<span class="filter-price-range"></span>
															<textarea class="filter-price-range" name="price" hidden></textarea>
													

														
														<input type="hidden" name="brand_filter" value="<?php echo e(Request::get('brand_filter')?Request::get('brand_filter') : 0); ?>">
													</div>

												</div>
											</form><!-- End Filter Price Form -->
										</div>
									</div>
									
									<!-- danh sach brand -->
									<div class="widget widget-collapsible">
										<h3 class="widget-title">Nhãn hiệu</h3>
										<ul class="widget-body filter-items-khala">
											<?php $__currentLoopData = $brands_count; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<li><a href="<?php echo e(url()->current().'?brand_filter='.$brand -> id); ?>" class="<?php echo e(Request::get('brand_filter') == $brand -> id ? 'active-filters' :''); ?>"><?php echo e($brand -> title); ?><span><?php echo e($brand -> products_count); ?></span></a></li>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											
										</ul>
									</div>
									<!-- san pham noi bat -->
									<div class="widget widget-products mt-2">
										<h4 class="widget-title">Nổi bật</h4>
										<div class="widget-body">
											<div class="owl-carousel owl-nav-top row cols-1" data-owl-options="{
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
															<!-- hien thi label moi -->
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
												<!-- End Products Col -->
											</div>
										</div>
									</div><!-- End Widget Products -->
								</div>
							</div>
						</aside>
						<div class="col-lg-9 main-content">
							<nav class="toolbox sticky-toolbox sticky-content fix-top">
								<div class="toolbox-left">
									<a href="#"
										class="toolbox-item left-sidebar-toggle btn btn-sm btn-outline btn-primary d-lg-none">Bộ lọc<i
											class="d-icon-arrow-right"></i></a>
									<div class="toolbox-item toolbox-sort select-box">
										<label>Sắp xếp theo :</label>
										<form method = "get" action="<?php echo e(url()->current()); ?>">
											<select name="orderby" class="form-control" onchange="this.form.submit()">
												<option value="created_at" <?php echo e(Request::get('orderby') == 'created_at'?'selected':''); ?>>Mới nhất</option>
												
												<option value="pro_total_rating" <?php echo e(Request::get('orderby') == 'pro_total_rating'?'selected':''); ?>>Bình chọn cao</option>
												<option value="discount" <?php echo e(Request::get('orderby') == 'discount'?'selected':''); ?>>Giảm giá</option>
												<option value="noi_bat" <?php echo e(Request::get('orderby') == 'noi_bat'?'selected':''); ?>>Nổi bật</option>
												
											</select>
											<!-- gan filter theo nhan hieu và tổng sản phẩm hiện theo trang -->
											<input type="hidden" name="count" value="<?php echo e(Request::get('count')?Request::get('count') : 6); ?>">
											<input type="hidden" name="brand_filter" value="<?php echo e(Request::get('brand_filter')?Request::get('brand_filter') : 0); ?>">
											<input type="hidden" name="price" value="<?php echo e(Request::get('price')?Request::get('price') : 0); ?>">
											
											<!-- end gan filter theo nhan hieu và tổng sản phẩm hiện theo trang -->
										</form>
									</div>
								</div>
								<div class="toolbox-right">
									<div class="toolbox-item toolbox-show select-box">
										<label>Hiển thị :</label>
										<form method ="get" action="<?php echo e(url()->current()); ?>">
											<select name="count" class="form-control" onchange="this.form.submit()">
												<option value="6" <?php echo e(Request::get('count') == 6?'selected':''); ?>>6</option>
												<option value="12" <?php echo e(Request::get('count') == 12?'selected':''); ?>>12</option>
												<option value="18" <?php echo e(Request::get('count') == 18?'selected':''); ?>>18</option>
												<option value="24" <?php echo e(Request::get('count') == 24?'selected':''); ?>>24</option>
											</select>
											<!-- gan filter theo nhan hieu và sắp xếp theo giảm giá,mới nhất.. -->
											<input type="hidden" name="orderby" value="<?php echo e(Request::get('orderby')?Request::get('orderby') : 'created_at'); ?>">
											<input type="hidden" name="brand_filter" value="<?php echo e(Request::get('brand_filter')?Request::get('brand_filter') : 0); ?>">
											<input type="hidden" name="price" value="<?php echo e(Request::get('price')?Request::get('price') : 0); ?>">
											
											<!-- end gan filter theo nhan hieu và sắp xếp theo giảm giá,mới nhất.. -->
										</form>
									</div>
									
								</div>
							</nav>
							<!-- danh sach san pham -->
							<div class="row cols-2 cols-sm-3 product-wrapper">
								<?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<!-- kiem tra xem product co giam gia hay khong? -->
									<?php if(!empty($product -> discount)): ?>
				                        <?php $product_price = $product -> price * (100 - $product -> discount)/100; ?>        
	                                <?php else: ?>
	                                 	<?php $product_price = $product -> price; ?>
	                                <?php endif; ?>
	                                <!-- end kiem tra xem product co giam gia hay khong? -->
									<div class="product-wrap">
										<div class="product shadow-media">
											<figure class="product-media">
												<a href="<?php echo e(route('product.detail',['slug' => slugify($product -> title,'-'),'id' => $product -> id])); ?>" >
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
													<a href="<?php echo e(url('add-cart')); ?>" class="btn-product-icon btn-cart btn-add-cart"  title="Thêm vào giỏ hàng"
														value = "<?php echo e($product -> id.'khala'.$product -> product_code.'khala'.$product -> title.'khala'.$product_price); ?>" >
														<i class="d-icon-bag"></i>
													</a>
												</div>
												<div class="product-action">
													<a href="<?php echo e(route('product.detail',['slug' => slugify($product -> title,'-'),'id' => $product -> id])); ?>" class="btn-product" title="<?php echo e($product -> title); ?>">Xem chi tiết</a>
												</div>
											</figure>
											<div class="product-details">
												
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
	                                                <a href="<?php echo e(route('product.detail',['slug' => slugify($product -> title,'-'),'id' => $product -> id.'?r=product-tab-reviews'])); ?>" class="link-to-tab rating-reviews">( <?php echo e($product -> reviews -> count()); ?> Đánh giá )</a>
	                                            </div>
											</div>
										</div>
									</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									<div class="product-wrap">
										Không có sản phẩm phù hợp với thông tin bạn lọc vui lòng <a href="<?php echo e(url()->current()); ?>"><strong>tìm lại</strong> </a>, cám ơn !
									</div>
								<?php endif; ?>
								
								
							</div>
							
								<?php echo e($products->links()); ?>

							
							
						</div>
					</div>
				</div>
			</div>
		</main>
	
	

	<?php $__env->stopSection(); ?>

	
	
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/frontend/category/list.blade.php ENDPATH**/ ?>