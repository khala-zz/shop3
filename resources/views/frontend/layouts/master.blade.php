<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    @yield('title')

    <meta name="keywords" content="shop online" />
    <meta name="description" content="khala chuyen shop online">
    <meta name="author" content="khala">
    <!-- dung cho ajax token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/icons/favicon.png">

    <script>
        WebFontConfig = {
            google: { families: ['Open+Sans:400,600,700', 'Poppins:400,600,700'] }
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = 'js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>
    <link href="{{ asset('css/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl-carousel/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/demo1.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/detail.css') }}" rel="stylesheet">
    @yield('css')


</head>

<body class="home">

    <div class="page-wrapper">
        
        @include('frontend.components.header')
        @yield('content')
        @include('frontend.components.footer')

    </div>

    <!-- Sticky Footer -->
    <div class="sticky-footer sticky-content fix-bottom">
        <a href="{{url('/')}}" class="sticky-link active">
            <i class="d-icon-home"></i>
            <span>Trang chủ</span>
        </a>
        <a href="{{url('cua-hang')}}" class="sticky-link">
            <i class="d-icon-officebag"></i>
            <span>Cửa hàng</span>
        </a>
        <a href="{{url('tin-tuc')}}" class="sticky-link">
            <i class="d-icon-volume"></i>
            <span>Tin tức</span>
        </a>
        @if(empty(Auth::check()))
            <a href="{{url('front-register')}}" class="sticky-link">
            <i class="d-icon-user"></i>
            <span>Đăng kí</span>
        </a>
        @else
            <a href="{{url('/my-account')}}" class="sticky-link">
            <i class="d-icon-user"></i>
            <span>Tài khoản</span>
        </a>
        @endif
        
        <div class="dropdown cart-dropdown dir-up">
            <a href="{{ url('/cart') }}" class="sticky-link cart-toggle">
                <i class="d-icon-bag"></i>
                <span>Giỏ hàng</span>
            </a>
            <!-- End of Cart Toggle -->
            <div class="dropdown-box">
                <div class="product product-cart-header">
                    <span class="product-cart-counts">{{ count(getProductCart()) }} Sản phẩm</span>
                    <span><a href="{{ url('/cart') }}">Giỏ hàng</a></span>
                </div>
                <div class="products scrollable">
                    <!-- Cart Product -->
                     @forelse(getProductCart() as $item)
                        <div class="product product-cart">
                            <div class="product-detail">
                                <a href="{{ route('product.detail',['slug' => slugify($item -> product_name,'-'),'id' => $item -> product_id])}}" class="product-name">{{$item -> product_name}}</a>
                                <div class="price-box">
                                    <span class="product-quantity">{{$item -> quantity}}</span>
                                    <span class="product-price">{{formatMoney($item -> price)}} </span>
                                </div>
                            </div>
                            <figure class="product-media">
                                <a href="{{ route('product.detail',['slug' => slugify($item -> product_name,'-'),'id' => $item -> product_id])}}">
                                    <img src="{{ asset('uploads/products-daidien/'.$item -> image) }}" alt="{{$item -> product_name}}" title="{{$item -> product_name}}" width="90"
                                        height="90" />
                                </a>
                                <!-- cai cu dung button 
                                 <button class="btn btn-link btn-close">
                                    <i class="fas fa-times"></i>
                                </button>
                                -->
                                <a href="{{url('/cart/delete-product/'.$item -> id)}}" class="btn btn-link btn-close product-remove" title="Xóa sản phẩm này">
                                            <i class="fas fa-times"></i>
                                        </a>
                            </figure>
                        </div>
                    @empty
                        <div class="product product-cart">
                            Không có sản phẩm trong giỏ hàng
                        </div>
                    @endforelse

                    <!-- End of Cart Product -->
                </div>
                <!-- End of Products  -->
                <div class="cart-total">
                    <label>Tổng:</label>
                    <span class="price">{{formatMoney(getTotalCart())}}</span>
                </div>
                <!-- End of Cart Total -->
                <div class="cart-action">
                    <a href="{{url('checkout')}}" class="btn btn-dark"><span>Thanh toán</span></a>
                </div>
                <!-- End of Cart Action -->
            </div>
            <!-- End of Dropdown Box -->
        </div>
    </div>
    <!-- Scroll Top -->
    <a id="scroll-top" href="#top" title="Top" role="button" class="scroll-top"><i class="fas fa-chevron-up"></i></a>

    <!-- MobileMenu -->
    <div class="mobile-menu-wrapper">
        <div class="mobile-menu-overlay">
        </div>
        <!-- End of Overlay -->
        <a class="mobile-menu-close" href="#"><i class="d-icon-times"></i></a>
        <!-- End of CloseButton -->
        <div class="mobile-menu-container scrollable">
            <form action="{{route('search.product')}}" class="input-wrapper" method="post">
                @csrf
                <input type="text" class="form-control" name="search_product" autocomplete="off"
                placeholder="Từ khóa..." required />
                <button class="btn btn-search" type="submit">
                    <i class="d-icon-search"></i>
                </button>
            </form>

            
            <!-- End of Search Form -->
            <ul class="mobile-menu mmenu-anim">
                <li class="active">
                    <a href="{{url('/')}}">Trang chủ</a>
                </li>
                <li>
                    <a href="{{url('cua-hang')}}">Cửa hàng</a>
                    
                </li>
                <li>
                    <a href="#">Danh mục sản phẩm</a>
                       <ul>
                            <!-- category share dung vies share trong app service provider -->
                            @foreach($categories_share as $item)

                                    @if($item -> parent == null)
                                    <li >
                                        <a href="{{ route('category.product',['slug' => slugify($item -> title,'-'),'id' => $item -> id])}}" >{{$item->title}}</a>
                                           @if(count($item->children))
                                         <ul>

                                            @include('frontend.sub_category',['childs' => $item -> children])
 
                                        </ul>
                                        @endif
                                    </li>
                                    @endif
                               
                           @endforeach()
                           
                       </ul>
                </li>
                <li>
                    <a href="{{url('tin-tuc')}}">Tin tức</a>
                 
                </li>
                <li>
                   <a href="{{ route('new.detail',['slug' => 'gioi-thieu','id' => 6])}}">Giới thiệu</a>
                   
                </li>
                           
                <li>
                    <a href="{{url('lien-he')}}">Liên hệ</a>
                </li>
                        </ul>
                        <!-- End of MobileMenu -->
             <ul class="mobile-menu mmenu-anim">
                @if(empty(Auth::check()))
                    <li><a href="{{ url('/front-login') }}">Đăng nhập</a></li>
                    <li><a href="{{ url('/front-register') }}">Đăng kí</a></li>
                @else
                    <li><a href="{{ url('/my-account') }}">Tài khoản</a></li>
                    <li><a href="{{ url('/front-logout') }}">Đăng xuất</a></li>
                @endif
               
                <li><a href="{{ url('/cart') }}">Giỏ hàng</a></li>
            </ul>
            <!-- End of MobileMenu -->
        </div>
    </div>
    <!--   Loading Icon add to cart -->
    <div class="ss-loading" style="display: none;"></div>
    </div> 
    


    <script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('js/parallax/parallax.min.js') }}"></script>
    <script src="{{ asset('js/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    
    <script src="{{ asset('js/elevatezoom/jquery.elevatezoom.min.js') }}"></script>
    <script src="{{ asset('js/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/webfont.js') }}"></script>
    <script src=" {{ asset('js/product_detail.js') }} "></script>
    @yield('js')
</body>
</html>