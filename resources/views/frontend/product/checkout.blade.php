@extends('frontend.layouts.master')
	@section('title')
		<title>Shop | Checkout</title>
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
					<h3 class="title title-simple title-step visited"><a href="{{url('/cart') }}">1. Giỏ hàng</a></h3>
					<h3 class="title title-simple title-step active"><a href="{{url('/checkout') }}">2. Thanh toán</a></h3>
					<h3 class="title title-simple title-step"><a href="{{url('/order') }}">3. Đặt hàng</a></h3>
				</div>
				<div class="container mt-8">
					<form method = "post" action="{{url('/checkout')}}" class="form">
						@csrf
						<div class="row gutter-lg">
							<!-- thong tin thanh toan -->
							<div class="col-lg-7 mb-6">
								<h3 class="title title-simple text-left">Thông tin thanh toán</h3>
								
								<label>Tên *</label>
								<input type="text" class="form-control" name="billing_name" required value="{{$userDetails -> name}}" />
								<label>Email *</label>
								<input type="email" class="form-control"  name="billing_email" required value="{{$userDetails -> email}}" />
								<label>Điện thoại *</label>
								<input type="text" class="form-control" name="billing_mobile" required value="{{$userDetails -> mobile}}" />
								<label>Tỉnh/Thành phố</label>
                                <select class="form-control" name="billing_city">
                                    <option value="0">Chọn thành phố/tỉnh</option>
                                    @foreach($citys as $city)
                                    <option 
                                    value="{{ $city -> name }}" 
                                    {{ $city->name  == $userDetails -> city ?"selected":""}}>
                                    {{ $city -> name }}</option>
                                    @endforeach       
                                </select>
								<label>Quận/huyện</label>
                                    <input type="text" class="form-control" name="billing_state" required value="{{$userDetails -> state}}">
								<label>Địa chỉ</label>
                                    <input type="text" class="form-control mb-0" name="billing_address" required value="{{$userDetails -> address}}">
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
								<input type="text" class="form-control" name="shipping_name"  value="{{empty($shipping_details -> name) ?' ':$shipping_details -> name}}"  />
								<label>Email *</label>
								<input type="email" class="form-control"  name="shipping_email"  value="{{empty($shipping_details -> user_email)?' ':$shipping_details -> user_email}}"/>
								<label>Điện thoại *</label>
								<input type="text" class="form-control" name="shipping_mobile" value="{{empty($shipping_details -> mobile)?' ':$shipping_details -> mobile}}"/>
								<label>Tỉnh/Thành phố</label>
                                    <select class="form-control" name="shipping_city">
                                        <option value="0">Chọn thành phố/tỉnh</option>
                                        @foreach($citys as $city)
                                        <option value="{{ $city -> name }}" 
                                        	{{!empty($shipping_details -> city) && ($shipping_details -> city == $city -> name)?'selected':' '}}>
                                        {{ $city -> name }}
                                    	</option>
                                        @endforeach       
                                    </select>
								<label>Quận/huyện</label>
                                    <input type="text" class="form-control" name="shipping_state" value="{{!empty($shipping_details -> state) ?$shipping_details -> state:' '}}">
								<label>Địa chỉ</label>
                                    <input type="text" class="form-control mb-0" name="shipping_address" value="{{!empty($shipping_details -> address) ?$shipping_details -> address:' '}}">
								
								
								
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
												@foreach($userCart as $item)
												<tr>
													<td class="product-name">{{$item -> product_name}} <strong class="product-quantity">×&nbsp;{{$item -> quantity}}</strong>&nbsp;({{$item -> product_color}}&nbsp;|&nbsp;{{$item -> size}})</td>
													<td class="product-total">{{formatMoney($item -> price * $item -> quantity)}}</td>
												</tr>
												<?php $total_amount = $total_amount + ($item -> price * $item -> quantity);?>
												@endforeach
												<!-- end product cart -->
												
												<!-- subtotal -->
												<tr class="summary-subtotal">
													<td>
														<h4 class="summary-subtitle">Tổng tiền</h4>
													</td>
													<td class="summary-subtotal-price">{{formatMoney($total_amount)}}
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
															@if(!empty(Session::get('CouponAmount')))
															{{formatMoney(Session::get('CouponAmount'))}} 
															@else
															0 đ
															@endif
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
														<p class="summary-total-price">{{formatMoney($total_amount - Session::get('CouponAmount'))}}</p>
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
						<input type="hidden" name="grand_total" value="{{$total_amount - Session::get('CouponAmount')}}">
						<input type="hidden" name="paymentMethod" value="Sau khi nhận hàng" id="paymentMethod">
					</form>
				</div>
			</div>
		</main>
	

	@endsection

	
	