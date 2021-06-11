
	<?php $__env->startSection('title'); ?>
		<title>Shop | Order</title>
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
	<main class="main order">
			<div class="page-content pt-10 pb-10">
				<div class="step-by pt-2 pb-2 pr-4 pl-4">
					<h3 class="title title-simple title-step visited"><a href="<?php echo e(url('/cart')); ?>">1. Giỏ hàng</a></h3>
					<h3 class="title title-simple title-step active"><a href="<?php echo e(url('/checkout')); ?>">2. Thanh toán</a></h3>
					<h3 class="title title-simple title-step"><a href="<?php echo e(url('/order')); ?>">3. Đặt hàng</a></h3>
				</div>
				<div class="container mt-8">
					<div class="order-message">
						<i class="fas fa-check"></i>Cám ơn, Đơn hàng của bạn đã được tiếp nhận.
					</div>
					

					<div class="order-results pt-8 pb-8">
						<div class="overview-item">
							<span>Mã đơn hàng</span>
							<strong><?php echo e(Session::get('order_id')); ?></strong>
							
						</div>
						<div class="overview-item">
							<span>Tình trạng</span>
							<strong>Đang xử lý</strong>
						</div>
						<div class="overview-item">
							<span>Ngày</span>
							<strong><?php echo e(date('d-m-Y')); ?></strong>
						</div>
						<div class="overview-item">
							<span>Tổng tiền thanh toán</span>
							<strong><?php echo e(Session::get('grand_total')); ?></strong>
						</div>
						<div class="overview-item">
							<span>Phương thức thanh toán</span>
							<strong><?php echo e($payment_value); ?></strong>
						</div>
					</div>

					<h2 class="title title-simple text-left pt-3">Order Details</h2>
					<div class="order-details mb-1">
						<table class="order-details-table">
							<thead>
								<tr class="summary-subtotal">
									<td>
										<h3 class="summary-subtitle">Product</h3>
									</td>	
									<td></td>		
								</tr>
							</thead>
							<tbody>
								<?php $total_amount = 0; ?>
								<?php $__currentLoopData = $userCart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td class="product-name"><?php echo e($item -> product_name); ?> <span> <i class="fas fa-times"></i> <?php echo e($item -> quantity); ?></span>&nbsp;(<?php echo e($item -> product_color); ?>&nbsp;|&nbsp;<?php echo e($item -> size); ?>)</td>
									<td class="product-price"><?php echo e(formatMoney($item -> price * $item -> quantity)); ?></td>
								</tr>
								<?php $total_amount = $total_amount + ($item -> price * $item -> quantity);?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								
								<tr class="summary-subtotal">
									<td>
										<h4 class="summary-subtitle">Tổng tiền:</h4>
									</td>
									<td class="summary-subtotal-price"><?php echo e(formatMoney($total_amount)); ?></td>												
								</tr>
								<tr class="summary-subtotal">
									<td>
										<h4 class="summary-subtitle">Giao hàng:</h4>
									</td>
									<td class="summary-subtotal-price"><?php echo e($shipping_value); ?></td>												
								</tr>
								<tr class="summary-subtotal">
									<td>
										<h4 class="summary-subtitle">Phương thức thanh toán:</h4>
									</td>
									<td class="summary-subtotal-price"><?php echo e($payment_value); ?></td>												
								</tr>
								
								<tr class="summary-subtotal">
									<td>
										<h4 class="summary-subtitle">Giảm giá</h4>
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
								<tr class="summary-subtotal">
									<td>
										<h4 class="summary-subtitle">Tổng tiền thanh toán</h4>
									</td>
									<td>
										<p class="summary-total-price"><?php echo e(formatMoney(Session::get('grand_total'))); ?></p>
									</td>												
								</tr>
							</tbody>
						</table>
					</div>
					<div class="row">
					<div class="col-lg-6 address-info pb-8 mb-6">
					<h2 class="title title-simple text-left pt-8 mb-2">Địa chỉ thanh toán</h2>
					
						<p class="address-detail pb-2">
							<?php echo e($userDetails -> name); ?><br>
							<?php echo e($userDetails -> mobile); ?><br>
							<?php echo e($userDetails -> address); ?><br>
							<?php echo e($userDetails -> city); ?><br>
							Quận/huyện <br />
							<?php echo e($userDetails -> state); ?>

						</p>
						<p class="email"><?php echo e($userDetails -> email); ?></p>
					</div>
					
					<?php if(!empty($shipping_details -> name) && !empty($shipping_details -> address)): ?>
					<div class="col-lg-6 address-info pb-8 mb-6">
					<h2 class="title title-simple text-left pt-8 mb-2">Địa chỉ giao hàng</h2>
					
						<p class="address-detail pb-2">
							<?php echo e($shipping_details -> name); ?><br>
							<?php echo e($shipping_details -> mobile); ?><br>
							<?php echo e($shipping_details -> address); ?><br>
							<?php echo e($shipping_details -> city); ?><br>
							Quận/huyện <br />
							<?php echo e($shipping_details -> state); ?>

						</p>
						<p class="email"><?php echo e($shipping_details -> email); ?></p>
					</div>
					<?php endif; ?>
				</div>

					<a href="<?php echo e(url('/')); ?>" class="btn btn-icon-left btn-back btn-md mb-4"><i class="d-icon-arrow-left"></i> Mua sắm tiếp</a>
				</div>
			</div>
		</main>
	<?php echo e(Session::forget('grand_total')); ?>

	<?php echo e(Session::forget('order_id')); ?>

	<?php 
	//DB::table('cart') -> where('user_email',Auth::user() -> email) ->delete();
	DB::table('cart') -> where('session_id',Session::get('session_cart_id')) ->delete();
	?>

	<?php $__env->stopSection(); ?>

	
	
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\shop2\resources\views/frontend/product/order.blade.php ENDPATH**/ ?>