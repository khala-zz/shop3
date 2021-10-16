@extends('frontend.layouts.master')
	@section('title')
		<title>Shop | Cart</title>
	@endsection
	@section('css')
		<link href="{{ asset('css/photoswipe/photoswipe.min.css') }}" rel="stylesheet">
		
		<link href="{{ asset('css/photoswipe/default-skin/default-skin.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/detail.css') }}" rel="stylesheet">

		
	@endsection

	@section('js')
		<script src=" {{ asset('js/sticky/sticky.min.js') }} "></script>
		<script src=" {{ asset('js/photoswipe/photoswipe.min.js') }} "></script>
		<script src=" {{ asset('js/photoswipe/photoswipe-ui-default.min.js') }} "></script>
		<script src=" {{ asset('js/product_detail.js') }} "></script>
		
	@endsection

	@section('content')
	<main class="main cart">
			<div class="page-content pt-10 pb-10">
				<div class="step-by pt-2 pb-2 pr-4 pl-4">
					<h3 class="title title-simple title-step active"><a href="{{ url('/cart') }}">1. Giỏ hàng</a></h3>
					<h3 class="title title-simple title-step"><a href="{{ url('/checkout') }}">2. Thanh toán</a></h3>
					<h3 class="title title-simple title-step"><a href="{{ url('/order') }}">3. Đặt hàng</a></h3>
				</div>
				<div class="container mt-8 mb-4">
					<div class="row gutter-lg">
						<div class="col-lg-8 col-md-12">
							
							<!--hien thi thong bao -->
							@if(Session::has('flash_message_error'))
								<div class="alert alert-danger alert-dark alert-round alert-inline">
                                    
                                    {!! session('flash_message_error')!!}
                                    <button type="button" class="btn btn-link btn-close">
                                        <i class="d-icon-times"></i>
                                    </button>
                                </div>
							@endif

							@if(Session::has('flash_message_success'))
								<div class="alert alert-success alert-dark alert-round alert-inline">
                                    <h4 class="alert-title">Thành công :</h4>
                                    {!! session('flash_message_success')!!}
                                    <button type="button" class="btn btn-link btn-close">
                                        <i class="d-icon-times"></i>
                                    </button>
                                </div>
							@endif
							<!-- end hien thi thong bao -->
							<table class="shop-table cart-table mt-2">
								<thead>
									<tr>
										<th><span>Sản phẩm</span></th>
										<th></th>
										<th><span>Giá</span></th>
										<th><span>Số lượng</span></th>
										<th>Tổng</th>
									</tr>
								</thead>
								<tbody>
									<!-- show du lieu cart -->
									<?php 
										//khai báo biến tổng để tính tổng
										$total_amount = 0;
									?>
									@foreach($userCart as $item)
										<tr>
											<td class="product-thumbnail">
												<figure>
													<a href="{{ route('product.detail',['slug' => slugify($item -> product_name,'-'),'id' => $item -> product_id]) }} ">
														<img src="{{ asset('uploads/products-daidien/'.$item -> image) }}" width="100" height="100"
														alt="{{$item -> product_name}}" title="{{$item -> product_name}}">
													</a>
													<a href="{{url('/cart/delete-product/'.$item -> id)}}" class="product-remove" title="Xóa sản phẩm này">
														<i class="fas fa-times"></i>
													</a>
												</figure>
											</td>
											<td class="product-name">
												<div class="product-name-section">
													<a href="{{ route('product.detail',['slug' => slugify($item -> product_name,'-'),'id' => $item -> product_id]) }}">{{ $item -> product_name }}</a>
												</div>
											</td>
											<td class="product-subtotal">
												<span class="amount">{{formatMoney($item -> price)}} </span>
											</td>
											<td class="product-quantity">
												<div class="input-group">
													<!-- kiem tra neu quantity lon hon 1 moi cho xuat hien dau - -->
													@if($item -> quantity > 0)
													<a href="{{url('/cart/update-quantity/'.$item -> id.'/-1')}}" class="btn btn-outline quantity-minus d-icon-minus cart-button-tang-giam"></a>
													@endif
													<input class="form-control" type="number" min="1"
														max="1000000" value="{{$item -> quantity}}">
													
													<a href="{{url('/cart/update-quantity/'.$item -> id.'/1')}}" class="btn btn-outline quantity-plus d-icon-plus cart-button-tang-giam"></a>
												</div>
											</td>
											<td class="product-price">
												<span class="amount">{{formatMoney($item -> price * $item -> quantity)}}</span>
											</td>
										</tr>
									<!-- tinh tong -->
									<?php $total_amount = $total_amount + ($item -> price * $item -> quantity);?>	
									@endforeach
									
								</tbody>
							</table>
							<!-- coupon -->
							<div class="cart-actions mb-6 pt-6">
								<form action="{{ url('/cart/apply-coupon') }}" method="post">
									@csrf
									<div class="coupon">
										<input type="text" name="coupon_code" class="input-text form-control" id="coupon_code" value="" placeholder="Nhập mã giảm giá">
										<button type="submit" class="btn btn-md">Gửi</button>
									</div>
								</form>
								
								<a href="{{ route('shop') }}" class="btn btn-md btn-icon-left">Mua sắm tiếp</a>		
							</div>
						</div>
						<aside class="col-lg-4 sticky-sidebar-wrapper">
							<div class="sticky-sidebar" data-sticky-options="{'bottom': 20}">
								<div class="summary mb-4">
									<h3 class="summary-title text-left">Tóm tắt đơn hàng</h3>
									<!-- kiem tra xem có mã giảm giá không -->
									@if(!empty(Session::get('CouponAmount')))
									<table class="shipping">
										<tr class="summary-subtotal">
											<td>
												<h4 class="summary-subtitle">Tổng tiền</h4>
											</td>
											<td>
												<p class="summary-subtotal-price"><?php echo formatMoney($total_amount); ?></p>
											</td>												
										</tr>
										<!-- coupon -->
										<tr class="summary-subtotal">
											<td>
												<h4 class="summary-subtitle">Giảm giá</h4>
											</td>
											<td>
												<p class="summary-subtotal-price"><?php echo formatMoney(Session::get('CouponAmount')); ?> </p>
											</td>												
										</tr>
									</table>
										<!-- end coupon -->
										
									<table>
										<tr class="summary-subtotal">
											<td>
												<h4 class="summary-subtitle">Tổng tiền thanh toán</h4>
											</td>
											<td>
												<p class="summary-total-price"><?php echo formatMoney($total_amount - Session::get('CouponAmount')); ?></p>
											</td>												
										</tr>
									</table>
									@else
									
									<table>
										<tr class="summary-subtotal">
											<td>
												<h4 class="summary-subtitle">Tổng tiền thanh toán</h4>
											</td>
											<td>
												<p class="summary-total-price"><?php echo formatMoney($total_amount); ?></p>
											</td>												
										</tr>
									</table>
									@endif
									<a href="{{ url('checkout') }}" class="btn btn-dark btn-checkout">Thanh toán</a>
								</div>
							</div>
						</aside>
					</div>
				</div>
			</div>
		</main>
	
	

	@endsection

	
	