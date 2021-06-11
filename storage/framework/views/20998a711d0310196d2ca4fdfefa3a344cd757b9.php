
	<?php $__env->startSection('title'); ?>
		<title>Shop | Checkout</title>
	<?php $__env->stopSection(); ?>
	<?php $__env->startSection('css'); ?>
		<link href="<?php echo e(asset('css/photoswipe/photoswipe.min.css')); ?>" rel="stylesheet">
		
		<link href="<?php echo e(asset('css/photoswipe/default-skin/default-skin.min.css')); ?>" rel="stylesheet">
		<link href="<?php echo e(asset('css/detail.css')); ?>" rel="stylesheet">

		
	<?php $__env->stopSection(); ?>

	<?php $__env->startSection('js'); ?>
		<script src=" <?php echo e(asset('js/sticky/sticky.min.js')); ?> "></script>
		<script src=" <?php echo e(asset('js/photoswipe/photoswipe.min.js')); ?> "></script>
		<script src=" <?php echo e(asset('js/photoswipe/photoswipe-ui-default.min.js')); ?> "></script>
		<script src=" <?php echo e(asset('js/product_detail.js')); ?> "></script>
		
	<?php $__env->stopSection(); ?>

	<?php $__env->startSection('content'); ?>
	<main class="main checkout">
			<!-- <div class="page-header bg-dark"
				style="background-image: url('images/shop/page-header-back.jpg'); background-color: #3C63A4;">
				<h1 class="page-title">Checkout</h1>
				<ul class="breadcrumb">
					<li><a href="demo1.html"><i class="d-icon-home"></i></a></li>
					<li>Checkout</li>
				</ul>
			</div> -->
			<!-- End PageHeader -->
			<div class="page-content pt-10 pb-10">
				<div class="step-by pt-2 pb-2 pr-4 pl-4">
					<h3 class="title title-simple title-step visited"><a href="<?php echo e(url('/cart')); ?>">1. Giỏ hàng</a></h3>
					<h3 class="title title-simple title-step active"><a href="<?php echo e(url('/checkout')); ?>">2. Thanh toán</a></h3>
					<h3 class="title title-simple title-step"><a href="<?php echo e(url('/order')); ?>">3. Đặt hàng</a></h3>
				</div>
				<div class="container mt-8">
					<form method = "post" action="<?php echo e(url('/checkout')); ?>" class="form">
						<?php echo csrf_field(); ?>
						<div class="row gutter-lg">
							<!-- thong tin thanh toan -->
							<div class="col-lg-7 mb-6">
								<h3 class="title title-simple text-left">Thông tin thanh toán</h3>
								
								<label>Tên *</label>
								<input type="text" class="form-control" name="billing_name" required value="<?php echo e($userDetails -> name); ?>" />
								<label>Email *</label>
								<input type="email" class="form-control"  name="billing_email" required value="<?php echo e($userDetails -> email); ?>" />
								<label>Điện thoại *</label>
								<input type="text" class="form-control" name="billing_mobile" required value="<?php echo e($userDetails -> mobile); ?>" />
								<label>Tỉnh/Thành phố</label>
                                <select class="form-control" name="billing_city">
                                    <option value="0">Chọn thành phố/tỉnh</option>
                                    <?php $__currentLoopData = $citys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option 
                                    value="<?php echo e($city -> name); ?>" 
                                    <?php echo e($city->name  == $userDetails -> city ?"selected":""); ?>>
                                    <?php echo e($city -> name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>       
                                </select>
								<label>Quận/huyện</label>
                                    <input type="text" class="form-control" name="billing_state" required value="<?php echo e($userDetails -> state); ?>">
								<label>Địa chỉ</label>
                                    <input type="text" class="form-control mb-0" name="billing_address" required value="<?php echo e($userDetails -> address); ?>">
								<!-- end thong tin thanh toan -->

								<div class="form-checkbox mb-6">
									<input type="checkbox" class="custom-checkbox" id="different-address"
										name="different_address" value="1">
									<label class="form-control-label" id="different-address" for="different-address" >Giao hàng đến địa chỉ khác?</label>
								</div>

								<!-- dia chi khac -->
								<div  id="different-address-box" style="display:none;">
								<h3 class="title title-simple text-left">Thông tin giao hàng</h3>
								
								<label>Tên *</label>
								<input type="text" class="form-control" name="shipping_name"  value="<?php echo e(empty($shipping_details -> name) ?' ':$shipping_details -> name); ?>"  />
								<label>Email *</label>
								<input type="email" class="form-control"  name="shipping_email"  value="<?php echo e(empty($shipping_details -> user_email)?' ':$shipping_details -> user_email); ?>"/>
								<label>Điện thoại *</label>
								<input type="text" class="form-control" name="shipping_mobile" value="<?php echo e(empty($shipping_details -> mobile)?' ':$shipping_details -> mobile); ?>"/>
								<label>Tỉnh/Thành phố</label>
                                    <select class="form-control" name="shipping_city">
                                        <option value="0">Chọn thành phố/tỉnh</option>
                                        <?php $__currentLoopData = $citys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($city -> name); ?>" 
                                        	<?php echo e(!empty($shipping_details -> city) && ($shipping_details -> city == $city -> name)?'selected':' '); ?>>
                                        <?php echo e($city -> name); ?>

                                    	</option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>       
                                    </select>
								<label>Quận/huyện</label>
                                    <input type="text" class="form-control" name="shipping_state" value="<?php echo e(!empty($shipping_details -> state) ?$shipping_details -> state:' '); ?>">
								<label>Địa chỉ</label>
                                    <input type="text" class="form-control mb-0" name="shipping_address" value="<?php echo e(!empty($shipping_details -> address) ?$shipping_details -> address:' '); ?>">
								
								
								
								</div>
							<!-- end dia chi khac -->
								
							</div>
							

							<!-- don hang -->
							<aside class="col-lg-5 sticky-sidebar-wrapper">
								<div class="sticky-sidebar" data-sticky-options="{'bottom': 50}">
									<h3 class="title title-simple text-left">Đơn hàng</h3>
									<div class="summary mb-4">
										<table class="order-table">
											<thead>
												<tr>
													<th>Sản phẩm</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<?php $total_amount = 0; ?>
												<!-- product cart -->
												<?php $__currentLoopData = $userCart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>
													<td class="product-name"><?php echo e($item -> product_name); ?> <strong class="product-quantity">×&nbsp;<?php echo e($item -> quantity); ?></strong>&nbsp;(<?php echo e($item -> product_color); ?>&nbsp;|&nbsp;<?php echo e($item -> size); ?>)</td>
													<td class="product-total"><?php echo e(formatMoney($item -> price * $item -> quantity)); ?></td>
												</tr>
												<?php $total_amount = $total_amount + ($item -> price * $item -> quantity);?>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
												<!-- end product cart -->
												
												<!-- subtotal -->
												<tr class="summary-subtotal">
													<td>
														<h4 class="summary-subtitle">Tổng tiền</h4>
													</td>
													<td class="summary-subtotal-price"><?php echo e(formatMoney($total_amount)); ?>

													</td>												
												</tr>
												<!-- end subtotal -->
												<!-- shipping -->
												<tr class="sumnary-shipping shipping-row-last">
													<td colspan="2">
														<h4 class="summary-subtitle">Giao hàng</h4>
														<ul>
															<li>
																<div class="custom-radio">
																	<input type="radio" id="free-shipping" name="shipping" class="custom-control-input" checked value="Nhanh">
																	<label class="custom-control-label" for="free-shipping">Nhanh</label>
																</div>
															</li>
															<li>
																<div class="custom-radio">
																	<input type="radio" id="standard_shipping" name="shipping" class="custom-control-input" value="Viettel">
																	<label class="custom-control-label" for="standard_shipping">Viettel</label>
																</div>
															</li>
															<li>
																<div class="custom-radio">
																	<input type="radio" id="express_shipping" name="shipping" class="custom-control-input" value="Miễn phí">
																	<label class="custom-control-label" for="express_shipping">Miễn phí</label>
																</div>
															</li>
														</ul>
													</td>
												</tr>
												<!-- end shipping -->
												<!-- coupon -->
												<tr class="summary-subtotal">
													<td>
														<h4 class="summary-subtitle">Mã giảm giá</h4>
													</td>
													<td>
														<p class="summary-total-price">
															<?php if(!empty(Session::get('CouponAmount'))): ?>
															<?php echo e(formatMoney(Session::get('CouponAmount'))); ?> 
															<?php else: ?>
															0 đ
															<?php endif; ?>
														</p>
													</td>												
												</tr>
												<!-- end coupon -->

												<!-- tong tien thanh toán -->
												<tr class="summary-subtotal">
													<td>
														<h4 class="summary-subtitle">Tổng tiền thanh toán</h4>
													</td>
													<td>
														<p class="summary-total-price"><?php echo e(formatMoney($total_amount - Session::get('CouponAmount'))); ?></p>
													</td>												
												</tr>
												<!-- end tong tien thanh toan -->
											</tbody>
										</table>
										<div class="payment accordion radio-type">
											<h4 class="summary-subtitle">Phương thức thanh toán</h4>
											<div class="card">
												<div class="card-header change-payment-method" data-value = "Sau khi nhận hàng">
													<a href="#collapse1" class="collapse"  >Sau khi nhận hàng
													</a>

												</div>
												<div id="collapse1" class="expanded" style="display: block;">
													<div class="card-body">
														Sau khi nhận hàng và kiểm tra hàng xong mới trả tiền
														
													</div>
												</div>
											</div>
											<div class="card">
												<div class="card-header change-payment-method" data-value = "Qua ngân hàng">
													<a href="#collapse2" class="expand" >Qua ngân hàng</a>
												</div>
												<div id="collapse2" class="collapsed change-payment-method">
													<div class="card-body">
														Vui lòng sử dụng Mã đơn hàng khi bạn chuyển khoản
													</div>
												</div>
											</div>
											
										</div>
										<p class="checkout-info">Your personal data will used to process your order, support your experience throughout this website, and for other purposes described in our privacy policy.</p>
										<button type="submit" class="btn btn-dark btn-order">Đặt hàng</button>
									</div>
								</div>
							</aside>
							<!-- end don hang -->
						</div>
						<input type="hidden" name="grand_total" value="<?php echo e($total_amount - Session::get('CouponAmount')); ?>">
						<input type="hidden" name="paymentMethod" value="Sau khi nhận hàng" id="paymentMethod">
					</form>
				</div>
			</div>
		</main>
	

	<?php $__env->stopSection(); ?>

	
	
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/frontend/product/checkout.blade.php ENDPATH**/ ?>