@extends('frontend.layouts.master')
	@section('title')
		<title>Trang chu</title>
	@endsection
	@section('css')
		
		<link href="{{ asset('css/home.css') }}" rel="stylesheet">
	@endsection
    @section('js')
       
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
            <div class="page-content">
                @if(Session::has('flash_message_success'))
                                <div class="alert alert-success alert-dark alert-round alert-inline">
                                    <h4 class="alert-title">Thành công :</h4>
                                    {!! session('flash_message_success')!!}
                                    <button type="button" class="btn btn-link btn-close">
                                        <i class="d-icon-times"></i>
                                    </button>
                                </div>
                            @endif
	<!-- slider -->
		@include('frontend.home.components.slider')
	<!-- /slider -->
	
	     <section class="grey-section pt-10 pb-10 appear-animate" data-animation-options="{
                    'delay': '.3s'
                }">
                    <div class="container pt-3">
                        <h2 class="title">danh mục sản phẩm ưa chuộng</h2>
                        <div class="row">

                            @foreach($categories as $category)
                           
                            <div class="col-md-3 col-6 mb-4">
                                <div
                                    class="category category-default category-default-1 category-absolute overlay-zoom">
                                    <a href="{{ route('category.product',['slug' => slugify($category -> title,'-'),'id' => $category -> id])}}">
                                        <figure class="category-media">
                                            <img src="uploads/categories/{{$category -> image}}" alt="{{$category -> title}}"
                                                width="280" height="280" title="{{$category -> title}}"/>
                                        </figure>
                                    </a>
                                    <div class="category-content">
                                        <h4 class="category-name"><a href="{{ route('category.product',['slug' => slugify($category -> title,'-'),'id' => $category -> id])}}">{{$category -> title}}</a></h4>
                                    </div>
                                </div>
                            </div>
                            @endforeach
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
                        @foreach($products_selling as $product)
                        <!-- kiem tra xem product co giam gia hay khong? -->
                        @if(!empty($product -> discount))
                            @php $product_price = $product -> price * (100 - $product -> discount)/100; @endphp        
                        @else
                            @php $product_price = $product -> price; @endphp
                        @endif
                        <!-- end kiem tra xem product co giam gia hay khong? -->
                        <div class="product">
                            <figure class="product-media">
                                <a href="{{ route('product.detail',['slug' => slugify($product -> title,'-'),'id' => $product -> id])}}">
                                    <img src="uploads/products-daidien/{{$product -> image }}" alt="{{$product -> title }}" title="{{$product -> title }}"
                                        width="280" height="315">
                                </a>
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
                              
                                <div class="product-cat">
                                    <a href="{{route('category.product',['slug' => slugify($product -> catTitle,'-'),'id' => $product -> catId])}}">{{ $product -> catTitle }}</a>
                                </div>
                                <h3 class="product-name">
                                    <a href="{{ route('product.detail',['slug' => slugify($product -> title,'-'),'id' => $product -> id])}}">{{ $product -> title }}</a>
                                </h3>
                                @if(!empty($product -> discount))
                                <div class="product-price">
                                    <ins class="new-price">
                                        
                                        {{formatMoney($product_price) }}
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
                                    <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( {{$product -> reviews -> count()}} Đánh giá )</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
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
                        @foreach($products_featured as $productFeature)
                         <!-- kiem tra xem product co giam gia hay khong? -->
                        @if(!empty($productFeature -> discount))
                            @php $product_price = $productFeature -> price * (100 - $productFeature -> discount)/100; @endphp        
                        @else
                            @php $product_price = $productFeature -> price; @endphp
                        @endif
                        <!-- end kiem tra xem product co giam gia hay khong? -->
                        <div class="product">
                            <figure class="product-media">
                                <a href="{{ route('product.detail',['slug' => slugify($productFeature -> title,'-'),'id' => $productFeature -> id])}}">
                                    <img src="{{ asset('uploads/products-daidien/'.$productFeature -> image )}}" alt="{{$productFeature -> title }}" title="{{$productFeature -> title }}"
                                        width="220" height="245">
                                </a>
                                <!-- hien thi label moi -->
                                @if($productFeature -> new == 1)
                                <div class="product-label-group">
                                    <label class="product-label label-new">Mới</label>
                                </div>
                                @endif
                                <!-- hien thi label giam gia -->
                                @if(!empty($productFeature -> discount))
                                <div class="product-label-group product-label-group-price">
                                    <label class="product-label label-sale">{{$productFeature -> discount}} %</label>
                                </div>
                                @endif
                                <!-- end hien thi giam gia -->
                                <div class="product-action-vertical">
                                    <a href="{{url('/add-cart')}}" class="btn-product-icon btn-cart btn-add-cart"  title="Thêm vào giỏ hàng" value = "{{$productFeature -> id.'khala'.$productFeature -> product_code.'khala'.$productFeature -> title.'khala'.$product_price}}"><i class="d-icon-bag"></i></a>
                                </div>
                                <div class="product-action">
                                    <a href="{{ route('product.detail',['slug' => slugify($productFeature -> title,'-'),'id' => $productFeature -> id])}}" class="btn-product" title="{{$productFeature -> title}}}">Xem chi tiết</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                
                                <div class="product-cat">
                                    <a href="{{route('category.product',['slug' => slugify(optional($productFeature -> category) -> title,'-'),'id' => optional($productFeature -> category) -> id])}}">{{optional($productFeature -> category) -> title}}</a>
                                </div>
                                <h3 class="product-name">
                                    <a href="{{ route('product.detail',['slug' => slugify($productFeature -> title,'-'),'id' => $productFeature -> id])}}">{{$productFeature -> title}}</a>
                                </h3>
                                <!-- hien thi gia -->
                                @if(!empty($productFeature -> discount))
                                <div class="product-price">
                                    <ins class="new-price">
                                        
                                        {{formatMoney($product_price) }}
                                    </ins><del class="old-price">{{formatMoney($productFeature -> price)}}</del>
                                </div>
                                @else
                                 <div class="product-price">
                                    <ins class="new-price">{{formatMoney($product_price)}}</ins>
                                </div>
                                @endif
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
                                        @for($i = 1; $i <= 5; $i++)
                                        <a class="star-{{$i}} {{$i <= $avg_featured ? 'active':''}} ">{{$i}}</a>
                                        @endfor
                                        
                                    </span>
                                    <!-- end hien thi rating -->
                                    <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( {{$productFeature -> reviews -> count()}} Đánh giá )</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
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
                            @foreach($news as $index => $new)
                            <div class="post post-list overlay-dark overlay-zoom appear-animate" data-animation-options="{
                                'name': 'fadeInRightShorter',
                                'delay': '.{{$index + 2}}s'
                            }">
                                <figure class="post-media">
                                    <a href="{{ route('new.detail',['slug' => slugify($new -> title,'-'),'id' => $new -> id])}}">
                                        <img src="{{ asset('uploads/news/'.$new -> image_name )}}" alt="{{$new -> title }}" title="{{$new -> title }}" width="280" height="206"
                                            />
                                    </a>
                                    
                                </figure>
                                <div class="post-details">
                                    <h4 class="post-title"><a href="{{ route('new.detail',['slug' => slugify($new -> title,'-'),'id' => $new -> id])}}">{{$new -> title }}</a>
                                    </h4>
                                    <p class="post-content">{{$new -> description }}</p>
                                    <a href="{{ route('new.detail',['slug' => slugify($new -> title,'-'),'id' => $new -> id])}}"
                                        class="btn btn-outline btn-md btn-dark btn-icon-right">Chi tiết<i
                                            class="d-icon-arrow-right"></i></a>
                                </div>
                            </div>
                            @endforeach
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
                                        @foreach($products_latest as $productLatest)
                                        <div class="product product-list-sm">
                                            <figure class="product-media">
                                                <a href="{{ route('product.detail',['slug' => slugify($productLatest -> title,'-'),'id' => $productLatest -> id])}}">
                                                    <img src="uploads/products-daidien/{{$productLatest -> image }}" alt="{{$productLatest -> title }}" title="{{$productLatest -> title }}"
                                                        width="100" height="100">
                                                </a>
                                                <!-- hien thi label moi -->

                                                @if($productLatest -> new == 1)
                                                <div class="product-label-group product-label-group-small">
                                                    <label class="product-label label-new product-label-small">Mới</label>
                                                </div>
                                                @endif
                                                <!-- hien thi label giam gia -->
                                                @if(!empty($productLatest -> discount))
                                                <div class="product-label-group product-label-group-small-price">
                                                    <label class="product-label label-sale product-label-small">{{$productLatest -> discount}} %</label>
                                                </div>
                                                @endif
                                            </figure>
                                            <div class="product-details">
                                                <h3 class="product-name">
                                                    <a href="{{ route('product.detail',['slug' => slugify($productLatest -> title,'-'),'id' => $productLatest -> id])}}">{{$productLatest -> title }}</a>
                                                </h3>
                                                <!-- hien thi gia -->
                                                @if(!empty($productLatest -> discount))
                                                <div class="product-price">
                                                    <ins class="new-price">
                                                        
                                                        {{formatMoney($productLatest -> price * (100 - $productLatest -> discount)/100) }}
                                                    </ins><del class="old-price">{{formatMoney($productLatest -> price)}}</del>
                                                </div>
                                                @else
                                                 <div class="product-price">
                                                    <ins class="new-price">{{formatMoney($productLatest -> price)}} </ins>
                                                </div>
                                                @endif
                                               
                                                <div class="ratings-container">
                                                    <!-- hien thi rating -->
                                                    <?php 
                                                        $avg_latest = 0;
                                                        if($productLatest -> pro_total_rating){
                                                            $avg_latest = round($productLatest -> pro_total_number/$productLatest -> pro_total_rating,2);
                                                        }
                                                        
                                                    ?>
                                                    
                                                    <span class="rating-stars selected">
                                                        @for($i = 1; $i <= 5; $i++)
                                                        <a class="star-{{$i}} {{$i <= $avg_latest ? 'active':''}} ">{{$i}}</a>
                                                        @endfor
                                                        
                                                    </span>
                                                    <!-- end hien thi rating -->
                                                    <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( {{$productLatest -> reviews -> count()}} Đánh giá)</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                      
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
                                       @foreach($products_selling as $key => $productSelling)
                                       @if($key == 3)
                                        @break
                                       @endif

                                        <div class="product product-list-sm">
                                            <figure class="product-media">
                                                <a href="{{ route('product.detail',['slug' => slugify($productSelling -> title,'-'),'id' => $productSelling -> id])}}">
                                                    <img src="uploads/products-daidien/{{$productSelling -> image }}" alt="{{$productSelling -> title }}" title="{{$productSelling -> title }}"
                                                        width="100" height="100">
                                                </a>
                                                <!-- hien thi label moi -->

                                                @if($productSelling -> new == 1)
                                                <div class="product-label-group product-label-group-small">
                                                    <label class="product-label label-new product-label-small">Mới</label>
                                                </div>
                                                @endif
                                                <!-- hien thi label giam gia -->
                                                @if(!empty($productSelling -> discount))
                                                <div class="product-label-group product-label-group-small-price">
                                                    <label class="product-label label-sale product-label-small">{{$productSelling -> discount}} %</label>
                                                </div>
                                                @endif
                                            </figure>
                                            <div class="product-details">
                                                <h3 class="product-name">
                                                    <a href="{{ route('product.detail',['slug' => slugify($productSelling -> title,'-'),'id' => $productSelling -> id])}}">{{$productSelling -> title }}</a>
                                                </h3>
                                                <!-- hien thi gia -->
                                                @if(!empty($productSelling -> discount))
                                                <div class="product-price">
                                                    <ins class="new-price">
                                                        
                                                        {{formatMoney($productSelling -> price * (100 - $productSelling -> discount)/100) }}
                                                    </ins><del class="old-price">{{formatMoney($productSelling -> price)}}</del>
                                                </div>
                                                @else
                                                 <div class="product-price">
                                                    <ins class="new-price">{{formatMoney($productSelling -> price)}} </ins>
                                                </div>
                                                @endif
                                                <div class="ratings-container">
                                                    <!-- hien thi rating -->
                                                    <?php 
                                                        $avg_selling = 0;
                                                        if($productSelling -> pro_total_rating){
                                                            $avg_selling = round($productSelling -> pro_total_number/$productSelling -> pro_total_rating,2);
                                                        }
                                                        
                                                    ?>
                                                    
                                                    <span class="rating-stars selected">
                                                        @for($i = 1; $i <= 5; $i++)
                                                        <a class="star-{{$i}} {{$i <= $avg_selling ? 'active':''}} ">{{$i}}</a>
                                                        @endfor
                                                        
                                                    </span>
                                                    <!-- end hien thi rating -->
                                                    <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( {{$productSelling -> reviews -> count() }}
                                                        Đánh giá )</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
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
                                          @foreach($products_rate as $productRate)
                                        <div class="product product-list-sm">
                                            <figure class="product-media">
                                                <a href="{{ route('product.detail',['slug' => slugify($productRate -> title,'-'),'id' => $productRate -> id])}}">
                                                    <img src="uploads/products-daidien/{{$productRate -> image }}" alt="{{$productRate -> title }}" title="{{$productRate -> title }}"
                                                        width="100" height="100">
                                                </a>
                                                <!-- hien thi label moi -->

                                                @if($productRate -> new == 1)
                                                <div class="product-label-group product-label-group-small">
                                                    <label class="product-label label-new product-label-small">Mới</label>
                                                </div>
                                                @endif
                                                <!-- hien thi label giam gia -->
                                                @if(!empty($productRate -> discount))
                                                <div class="product-label-group product-label-group-small-price">
                                                    <label class="product-label label-sale product-label-small">{{$productRate -> discount}} %</label>
                                                </div>
                                                @endif
                                            </figure>
                                            <div class="product-details">
                                                <h3 class="product-name">
                                                    <a href="{{ route('product.detail',['slug' => slugify($productRate -> title,'-'),'id' => $productRate -> id])}}">{{$productRate -> title }}</a>
                                                </h3>
                                                <!-- hien thi gia -->
                                                @if(!empty($productRate -> discount))
                                                <div class="product-price">
                                                    <ins class="new-price">
                                                        
                                                        {{formatMoney($productRate -> price * (100 - $productRate -> discount)/100) }}
                                                    </ins><del class="old-price">{{formatMoney($productRate -> price)}}</del>
                                                </div>
                                                @else
                                                 <div class="product-price">
                                                    <ins class="new-price">{{formatMoney($productRate -> price)}}</ins>
                                                </div>
                                                @endif
                                                <div class="ratings-container">
                                                    <!-- hien thi rating -->
                                                    <?php 
                                                        $avg_rate = 0;
                                                        if($productRate -> pro_total_rating){
                                                            $avg_rate = round($productRate -> pro_total_number/$productRate -> pro_total_rating,2);
                                                        }
                                                        
                                                    ?>
                                                    
                                                    <span class="rating-stars selected">
                                                        @for($i = 1; $i <= 5; $i++)
                                                        <a class="star-{{$i}} {{$i <= $avg_rate ? 'active':''}} ">{{$i}}</a>
                                                        @endfor
                                                        
                                                    </span>
                                                    <!-- end hien thi rating -->
                                                    <a href="#product-tab-reviews" class="link-to-tab rating-reviews">( {{$productRate -> reviews -> count() }}
                                                        Đánh giá )</a>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
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
                                         @foreach($products_sale as $productSale)
                                        <div class="product product-list-sm">
                                            <figure class="product-media">
                                                <a href="{{ route('product.detail',['slug' => slugify($productSale -> title,'-'),'id' => $productSale -> id])}}">
                                                    <img src="uploads/products-daidien/{{$productSale -> image }}" alt="{{$productSale -> title }}" title="{{$productSale -> title }}"
                                                        width="100" height="100">
                                                </a>
                                                <!-- hien thi label moi -->

                                                @if($productSale -> new == 1)
                                                <div class="product-label-group product-label-group-small">
                                                    <label class="product-label label-new product-label-small">Mới</label>
                                                </div>
                                                @endif
                                                <!-- hien thi label giam gia -->
                                                @if(!empty($productSale -> discount))
                                                <div class="product-label-group product-label-group-small-price">
                                                    <label class="product-label label-sale product-label-small">{{$productSale -> discount}} %</label>
                                                </div>
                                                @endif
                                            </figure>
                                            <div class="product-details">
                                                <h3 class="product-name">
                                                    <a href="{{ route('product.detail',['slug' => slugify($productSale -> title,'-'),'id' => $productSale -> id])}}">{{$productSale -> title }}</a>
                                                </h3>
                                               <!-- hien thi gia -->
                                                @if(!empty($productSale -> discount))
                                                <div class="product-price">
                                                    <ins class="new-price">
                                                        
                                                        {{formatMoney($productSale -> price * (100 - $productSale -> discount)/100) }}
                                                    </ins><del class="old-price">{{formatMoney($productSale -> price)}}</del>
                                                </div>
                                                @else
                                                 <div class="product-price">
                                                    <ins class="new-price">{{formatMoney($productSale -> price)}}</ins>
                                                </div>
                                                @endif
                                                <div class="ratings-container">
                                                    <!-- hien thi rating -->
                                                    <?php 
                                                        $avg_sale = 0;
                                                        if($productSale -> pro_total_rating){
                                                            $avg_sale = round($productSale -> pro_total_number/$productSale -> pro_total_rating,2);
                                                        }
                                                        
                                                    ?>
                                                    
                                                    <span class="rating-stars selected">
                                                        @for($i = 1; $i <= 5; $i++)
                                                        <a class="star-{{$i}} {{$i <= $avg_sale ? 'active':''}} ">{{$i}}</a>
                                                        @endfor
                                                        
                                                    </span>
                                                    <!-- end hien thi rating -->
                                                    <a href="#product-tab-reviews" class="link-to-tab rating-reviews">({{$productSale -> reviews -> count() }}
                                                        Đánh giá)</a>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
	
	

	@endsection


