@extends('frontend.layouts.master')
	@section('title')
		<title>{{ $keyword }}</title>
	@endsection
	@section('css')
		<link href="{{ asset('css/nouislider/nouislider.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/home.css') }}" rel="stylesheet">
	@endsection

	@section('js')
		<script src=" {{ asset('js/sticky/sticky.min.js') }} "></script>
		<script src=" {{ asset('js/nouislider/nouislider.min.js') }} "></script>
	@endsection

	@section('content')
	<main class="main">
		<div class="page-header bg-dark"
			style="background-image: url('{{asset('images/page-header.jpg')}}'); background-color: #3C63A4;">
			


			<h1 class="page-title"  style="color: black;">{{ $keyword}}</h1>
			<ul class="breadcrumb">
				<li><a href="{{route('home')}}" style="color: black;"><i class="d-icon-home"></i></a></li>
				<li  style="color: black;">{{ $keyword }}</li>
				
			</ul>
		</div>
		<!-- End PageHeader -->
		


		<div class="page-content mb-10">
				<div class="container">
					<div class="main-content">
						
						<br />	
						<div class="row cols-2 cols-sm-3 cols-md-4 cols-xl-5 product-wrapper">
							@forelse($products as $product)
							<div class="product-wrap">
								<div class="product shadow-media">
									<figure class="product-media">
										<a href="{{ route('product.detail',['slug' => slugify($product -> title,'-'),'id' => $product -> id])}}">
											<img src="{{asset('uploads/products-daidien/'.$product -> image) }}" alt="{{$product -> title }}" title="{{$product -> title }}" width="280" height="315">
										</a>
										<div class="product-label-group">
											<label class="product-label label-new">new</label>
										</div>
										<!-- hien thi label moi -->
		                                @if($product -> new == 1)
		                                <div class="product-label-group">
		                                    <label class="product-label label-new">Mới</label>
		                                </div>
		                                @endif
		                                <!-- hien thi label giam gia -->
		                                @if(!empty($product -> discount))
		                                <div class="product-label-group product-label-group-price">
		                                    <label class="product-label label-sale">{{$product -> discount}} %</label>
		                                </div>
		                                @endif
										<div class="product-action-vertical">
											<a href="#" class="btn-product-icon btn-cart" data-toggle="modal"
												data-target="#addCartModal" title="Add to cart"><i
													class="d-icon-bag"></i></a>
										</div>
										<div class="product-action">
											<a href="{{ route('product.detail',['slug' => slugify($product -> title,'-'),'id' => $product -> id])}}" class="btn-product" title="{{$product -> title}}">Xem chi tiết</a>
										</div>
									</figure>
									<div class="product-details">
										<a href="#" class="btn-wishlist" title="Add to wishlist"><i
												class="d-icon-heart"></i></a>
										
										<h3 class="product-name">
											<a href="{{ route('product.detail',['slug' => slugify($product -> title,'-'),'id' => $product -> id])}}">{{$product -> title }}</a>
										</h3>
										@if(!empty($product -> discount))
		                                <div class="product-price">
		                                    <ins class="new-price">
		                                        
		                                        {{$product -> price * (100 - $product -> discount)/100 }}đ
		                                    </ins><del class="old-price">{{$product -> price}} đ</del>
		                                </div>
		                                @else
		                                 <div class="product-price">
		                                    <ins class="new-price">{{$product -> price}} đ</ins>
		                                </div>
		                                @endif
										<div class="ratings-container">
                                            <!-- hien thi rating -->
                                            <?php 
                                                $avg = 0;
                                                if($product -> pro_total_rating){
                                                    $avg = round($product -> pro_total_number/$product -> pro_total_rating,2);
                                                }
                                                
                                            ?>
                                            
                                            <span class="rating-stars selected">
                                                @for($i = 1; $i <= 5; $i++)
                                                <a class="star-{{$i}} {{$i <= $avg ? 'active':''}} ">{{$i}}</a>
                                                @endfor
                                                
                                            </span>
                                            <!-- end hien thi rating -->
                                            <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( 6
                                                reviews )</a>
                                        </div>
									</div>
								</div>
							</div>
							@empty
							<div>Không tìm thấy sản phẩm với từ khóa <b> {{$keyword}}</b></div>
							
							@endforelse
							

							
							
						</div>
						<nav class="toolbox toolbox-pagination">
							<p class="show-info">Hiển thị <span>{{ $products->firstItem() }} đến {{ $products->lastItem() }}</span>
                                                            của tổng <span>{{$products->total()}}</span> sản phẩm
							{!! $products -> links() !!}
						</nav>
					</div>
					
				</div>
			</div>
	</main>
	
	

	@endsection

	
	