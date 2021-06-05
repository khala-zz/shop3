
<header class="header">
    
            <div class="header-top">
                <div class="container">
                    <div class="header-left">
                        <p class="welcome-msg">Chào mừng bạn đến với cửa hàng <b>khala</b>!</p>
                    </div>
                    <div class="header-right">
                        <p class="welcome-msg">Hotline <b>0906.077.097</b></p>
                        <!-- End of DropDownExpanded Menu -->
                    </div>
                </div>
            </div>
            <!-- End of HeaderTop -->
            <div class="header-middle sticky-header fix-top sticky-content">
                <div class="container">
                    <div class="header-left">
                        <a href="#" class="mobile-menu-toggle">
                            <i class="d-icon-bars2"></i>
                        </a>
                    </div>
                    <div class="header-center">
                        <a href="{{route('home')}}" class="logo">
                            <img src="{{ asset("images/logo.png") }}" alt="logo" width="163" height="39" />
                        </a>
                        <!-- End of Logo -->
                        <nav class="main-nav">
                            <ul class="menu">
                                <li class="{{ Request::segment(1)?'':'active' }}">
                                    <a href="{{url('/')}}">Trang chủ</a>
                                </li>
                                <li class="{{ Request::segment(1) == 'cua-hang'?'active':'' }}">
                                    <a href="{{ route('shop')}}">Cửa hàng</a>
                                </li>
                                <li class="{{ Request::segment(1) == 'danh-muc-san-pham' ? 'active':''}}">
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
                                <li class="{{ Request::segment(1) == 'tin-tuc' && !Request::segment(2) ? 'active':''}}">
                                    <a href="{{ route('list.news')}}">Tin tức</a>
                                </li>
                               <li class="{{ Request::segment(2) == 'gioi-thieu' ? 'active':''}}">
                                    <a href="{{ route('new.detail',['slug' => 'gioi-thieu','id' => 6])}}">Giới thiệu</a>
                                </li>
    

                                <li class="{{ Request::segment(1) == 'lien-he'?'active':'' }}">
                                    <a href="{{url('lien-he')}}">Liên hệ</a>
                                </li>
                            </ul>
                        </nav>
                        <span class="divider"></span>
                        <!-- End of Divider -->
                        <div class="header-search hs-toggle">
                            <a href="#" class="search-toggle">
                                <i class="d-icon-search"></i>
                            </a>
                            <form action="{{route('search.product')}}" class="input-wrapper" method="post">
                                @csrf
                                <input type="text" class="form-control" name="search_product" autocomplete="off"
                                    placeholder="Từ khóa..." required />
                                <button class="btn btn-search" type="submit">
                                    <i class="d-icon-search"></i>
                                </button>
                            </form>
                        </div>
                        <!-- End of Header Search -->
                    </div>
                    <div class="header-right">
                        <!-- link login,logou account -->
                        @if(empty(Auth::check()))
                            <a class="login-khala" href="{{ url('/front-login') }}">
                                <i class="d-icon-user"></i>
                                <span>Đăng nhập</span>
                            </a>

                            <a class="login-khala" href="{{ url('/front-register') }}">
                               
                                <span>Đăng kí</span>
                            </a>
                        @else
                            <a class="login-khala" href="{{ url('/my-account') }}">
                                <i class="d-icon-user"></i>
                                <span>Tài khoản</span>
                            </a>

                            <a class="login-khala" href="{{ url('/front-logout') }}">
                               
                                <span>Đăng xuất</span>
                            </a>
                        @endif
                        <!-- End of link login,logou account -->
                        <span class="divider"></span>
                        <div class="dropdown cart-dropdown">
                            <a href="{{ url('/cart') }}" class="cart-toggle">
                                <span class="cart-label">
                                    <span class="cart-name">Giỏ hàng</span>

                                    <span class="cart-price">{{formatMoney(getTotalCart())}} </span>
                                </span>
                                <i class="minicart-icon">
                                    <span class="cart-count">{{ count(getProductCart()) }}</span>
                                </i>
                            </a>
                            <!-- End of Cart Toggle -->
                            @if(count(getProductCart()) > 0)
                            <div class="dropdown-box">
                                <div class="product product-cart-header">
                                    <span class="product-cart-counts">{{ count(getProductCart()) }} Sản phẩm</span>
                                    <span><a href="{{url('/cart')}}">Giỏ hàng</a></span>
                                </div>
                                <div class="products scrollable">
                                    <!-- liet ke san pham trong gio hang -->
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
                                    <!-- end liet ke san pham trong gio hang -->
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
                            @endif
                            <!-- End of Dropdown Box -->
                        </div>

                        <div class="header-search hs-toggle mobile-search">
                            <a href="#" class="search-toggle">
                                <i class="d-icon-search"></i>
                            </a>
                            <form action="{{route('search.product')}}" class="input-wrapper" method="post">
                                @csrf
                                <input type="text" class="form-control" name="search_product" autocomplete="off"
                                    placeholder="Từ khóa..." required />
                                <button class="btn btn-search" type="submit">
                                    <i class="d-icon-search"></i>
                                </button>
                            </form>
                        </div>
                        <!-- End of Header Search -->


                    </div>
                </div>
            </div>
        </header>