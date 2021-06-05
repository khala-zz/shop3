
@extends('frontend.layouts.master')
	@section('title')
		<title>Cửa hàng</title>
	@endsection
	@section('css')
		<link href="{{ asset('css/nouislider/nouislider.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/home.css') }}" rel="stylesheet">
	@endsection

	@section('js')
		<script src=" {{ asset('js/sticky/sticky.min.js') }} "></script>
		<script src=" {{ asset('js/nouislider/nouislider.min.js') }} "></script>
		<script type="text/javascript">
			//dung cho ajax review
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
	</script>
	@endsection

	@section('content')
	<main class="main">
			<div class="page-header bg-dark"
				style="background-image: url('{{asset('images/page-header.jpg')}}'); background-color: #3C63A4;">
				<h3 class="page-subtitle" style="color: black;">Cửa hàng</h3>
				<h1 class="page-title" style="color: black;">Uy tín - Chất lượng</h1>
				<ul class="breadcrumb">
					<li><a href="{{route('home')}}" style="color: black;"><i class="d-icon-home"></i></a></li>
					<li style="color: black;">Cửa hàng</li>
					
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
										<a href="#" onclick="location.href='{{url('cua-hang')}}';" class="filter-clean text-primary">Bỏ lọc</a>
									</div>
									<div class="widget widget-collapsible">
										<h3 class="widget-title">Danh mục sản phẩm</h3>
										
										
										<!--- menu categorry -->
                                        <ul class="widget-body filter-items search-ul">
                                        	@foreach($categories as $item)
                                            @if( $item -> parent == null)
                                            <li>
                                                <a href="{{url('cua-hang?category_id='.$item -> id)}}" class="{{ count($item->children) ? 'show' :''}} {{Request::get('category_id') == $item -> id ? 'active-filters' :''}}" >{{$item->title}}</a>
                                                 <!-- submenu -->
                                                 @if(count($item->children))
                        
								                    @include('frontend.product.menusub',['childs' => $item -> children])
								                 @endif
								                 <!-- end submenu -->
                                                
                                            </li>
                                            @endif
                                           @endforeach()
                                        </ul>
                                        <!--- end menu categorry -->
									</div>
									<!-- giá -->
									<div class="widget widget-collapsible">
										<h3 class="widget-title">Giá : </h3>
										<div class="widget-body">
											<form action="{{url('cua-hang')}}">
												<div class="filter-price-slider"></div>

												<div class="filter-actions">
													<button type="submit" class="btn btn-sm btn-primary">Tìm</button>

													<div class="filter-price-text">Giá :
															
															<span class="filter-price-range"></span>
															<textarea class="filter-price-range" name="price" hidden></textarea>
													

														<input type="hidden" name="category_id" value="{{Request::get('category_id')?Request::get('category_id') : 0}}">
														<input type="hidden" name="brand_filter" value="{{Request::get('brand_filter')?Request::get('brand_filter') : 0}}">
													</div>

												</div>
											</form><!-- End Filter Price Form -->
										</div>
									</div>
									
									<!-- danh sach brand -->
									<div class="widget widget-collapsible">
										<h3 class="widget-title">Nhãn hiệu</h3>
										<ul class="widget-body filter-items-khala">
											
												@foreach($brands_count as  $brand)
													<li><a href="{{url('cua-hang?brand_filter='.$brand -> id)}}" class="{{Request::get('brand_filter') == $brand -> id ? 'active-filters' :''}}">{{ $brand -> title}}<span>{{ $brand -> products_count}}</span></a>
														
													</li>
													
												@endforeach
											
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
												@foreach($products_featured as $keyFeatured => $productsFeatured)
												@if($keyFeatured % 3 == 0)
													<div class="products-col">
												@endif
													<div class="product product-list-sm">
														<figure class="product-media">
															<a href="{{ route('product.detail',['slug' => slugify($productsFeatured -> title,'-'),'id' => $productsFeatured -> id])}}">
																<img src = "{{asset('uploads/products-daidien/'.$productsFeatured -> image) }}" alt="{{$productsFeatured -> title }}" title="{{$productsFeatured -> title }}"
																	width="100" height="100">
															</a>
															<!-- hien thi label moi -->
															@if($productsFeatured -> new == 1)
			                                                <div class="product-label-group product-label-group-small">
			                                                    <label class="product-label label-new product-label-small">Mới</label>
			                                                </div>
			                                                @endif
			                                                <!-- hien thi label giam gia -->
			                                                @if(!empty($productsFeatured -> discount))
			                                                <div class="product-label-group product-label-group-small-price">
			                                                    <label class="product-label label-sale product-label-small">{{$productsFeatured -> discount}} %</label>
			                                                </div>
			                                                @endif
														</figure>
														<div class="product-details">
															<h3 class="product-name">
																<a href="{{ route('product.detail',['slug' => slugify($productsFeatured -> title,'-'),'id' => $productsFeatured -> id])}}">{{$productsFeatured -> title}}</a>
															</h3>
															<!-- hien thi gia -->
			                                                @if(!empty($productsFeatured -> discount))
			                                                <div class="product-price">
			                                                    <ins class="new-price">
			                                                        
			                                                        {{formatMoney($productsFeatured -> price * (100 - $productsFeatured -> discount)/100) }}
			                                                    </ins><del class="old-price">{{formatMoney($productsFeatured -> price)}}</del>
			                                                </div>
			                                                @else
			                                                 <div class="product-price">
			                                                    <ins class="new-price">{{formatMoney($productsFeatured -> price)}}</ins>
			                                                </div>
			                                                @endif
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
			                                                        @for($i = 1; $i <= 5; $i++)
			                                                        <a class="star-{{$i}} {{$i <= $avg_featured ? 'active':''}} ">{{$i}}</a>
			                                                        @endfor
			                                                        
			                                                    </span>
			                                                    <!-- end hien thi rating -->
			                                                    <a href="{{ route('product.detail',['slug' => slugify($productsFeatured -> title,'-'),'id' => $productsFeatured -> id.'?r=product-tab-reviews'])}}" class="link-to-tab rating-reviews">( {{$productsFeatured -> reviews -> count()}} Đánh giá )</a>
			                                                </div>
														</div>
													</div>
												@if($keyFeatured % 3 == 2)	
												</div>
												@endif
												
												@endforeach()
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
										<form method ="get" action="{{url('cua-hang')}}">
											<select name="orderby" class="form-control" onchange="this.form.submit()">
												<option value="created_at" {{Request::get('orderby') == 'created_at'?'selected':''}}>Mới nhất</option>
												
												<option value="pro_total_rating" {{Request::get('orderby') == 'pro_total_rating'?'selected':''}}>Bình chọn cao</option>
												<option value="discount" {{Request::get('orderby') == 'discount'?'selected':''}}>Giảm giá</option>
												<option value="noi_bat" {{Request::get('orderby') == 'noi_bat'?'selected':''}}>Nổi bật</option>
												
											</select>
											<!-- gan filter theo nhan hieu và tổng sản phẩm hiện theo trang -->
											<input type="hidden" name="count" value="{{Request::get('count')?Request::get('count') : 6}}">
											<input type="hidden" name="brand_filter" value="{{Request::get('brand_filter')?Request::get('brand_filter') : 0}}">
											<input type="hidden" name="price" value="{{Request::get('price')?Request::get('price') : 0}}">
											<input type="hidden" name="category_id" value="{{Request::get('category_id')?Request::get('category_id') : 0}}">
											<!-- end gan filter theo nhan hieu và tổng sản phẩm hiện theo trang -->
										</form>
									</div>
								</div>
								<div class="toolbox-right">
									<div class="toolbox-item toolbox-show select-box">
										<label>Hiển thị :</label>
										<form method ="get" action="{{url('cua-hang')}}">
											<select name="count" class="form-control" onchange="this.form.submit()">
												<option value="6" {{Request::get('count') == 6?'selected':''}}>6</option>
												<option value="12" {{Request::get('count') == 12?'selected':''}}>12</option>
												<option value="18" {{Request::get('count') == 18?'selected':''}}>18</option>
												<option value="24" {{Request::get('count') == 24?'selected':''}}>24</option>
											</select>
											<!-- gan filter theo nhan hieu và sắp xếp theo giảm giá,mới nhất.. -->
											<input type="hidden" name="orderby" value="{{Request::get('orderby')?Request::get('orderby') : 'created_at'}}">
											<input type="hidden" name="brand_filter" value="{{Request::get('brand_filter')?Request::get('brand_filter') : 0}}">
											<input type="hidden" name="price" value="{{Request::get('price')?Request::get('price') : 0}}">
											<input type="hidden" name="category_id" value="{{Request::get('category_id')?Request::get('category_id') : 0}}">
											<!-- end gan filter theo nhan hieu và sắp xếp theo giảm giá,mới nhất.. -->
										</form>
									</div>
									
								</div>
							</nav>
							<!-- danh sach san pham -->
							<div class="row cols-2 cols-sm-3 product-wrapper">
								@forelse($products as $product)
								<!-- kiem tra xem product co giam gia hay khong? -->
									@if(!empty($product -> discount))
				                        @php $product_price = $product -> price * (100 - $product -> discount)/100; @endphp        
	                                @else
	                                 	@php $product_price = $product -> price; @endphp
	                                @endif
	                                <!-- end kiem tra xem product co giam gia hay khong? -->
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
												<a href="{{url('add-cart')}}" class="btn-product-icon btn-cart btn-add-cart"  title="Thêm vào giỏ hàng"
													value = "{{$product -> id.'khala'.$product -> product_code.'khala'.$product -> title.'khala'.$product_price}}">
													<i class="d-icon-bag"></i>
												</a>
											</div>
											<div class="product-action">
												<a href="{{ route('product.detail',['slug' => slugify($product -> title,'-'),'id' => $product -> id])}}" class="btn-product" title="{{$product -> title}}">Xem chi tiết</a>
											</div>
										</figure>
										<div class="product-details">
											
											<h3 class="product-name">
												<a href="{{ route('product.detail',['slug' => slugify($product -> title,'-'),'id' => $product -> id])}}">{{$product -> title }}</a>
											</h3>
											@if(!empty($product -> discount))
			                                <!-- hien thi gia -->
			                                <div class="product-price">
			                                    <ins class="new-price">
			                                        
			                                        {{formatMoney($product_price)}}
			                                    </ins><del class="old-price">{{formatMoney($product -> price)}}</del>
			                                </div>
			                                @else
			                                 <div class="product-price">
			                                    <ins class="new-price">{{formatMoney($product_price)}}</ins>
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
                                                <a href="{{ route('product.detail',['slug' => slugify($product -> title,'-'),'id' => $product -> id.'?r=product-tab-reviews'])}}" class="link-to-tab rating-reviews">( {{$product -> reviews -> count()}} Đánh giá )</a>
                                            </div>
										</div>
									</div>
								</div>
								@empty
								<div class="product-wrap">
									Không có sản phẩm phù hợp với thông tin bạn lọc vui lòng <a href="{{url('cua-hang')}}"><strong>tìm lại</strong> </a>, cám ơn !
								</div>
								@endforelse
								
								
							</div>
							
								{{-- $products->links() --}}
								{!! $products -> links() !!}

							
							
							
						</div>
					</div>
				</div>
			</div>
		</main>
	
	

	@endsection

	
	