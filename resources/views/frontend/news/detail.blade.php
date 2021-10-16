@extends('frontend.layouts.master')
	@section('title')
		<title>{{$news -> title}}</title>
	@endsection

	@section('content')
	 <main class="main">
            <div class="page-header" style="background-image: url({{asset('images/page-header.jpg')}})">
                <h1 class="page-title">{{$news -> title}}</h1>
            </div>
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{url('/')}}"><i class="d-icon-home"></i></a></li>
                        <li><a href="#" class="active">Tin tức</a></li>
                        <li>{{$news -> title}}</li>
                    </ul>
                </div>
            </nav>
            <div class="page-content mt-6">
                <div class="container">
                    <div class="row gutter-lg">
                        <div class="col-lg-9">
                            <article class="post-single">
                                <figure class="post-media">
                                    
                                        <img src="{{ asset('uploads/news/'.$news -> image_name) }}" width="870" height="420" alt="{{$news -> title}}" title="{{$news -> title}}"/>
                                    
                                </figure>
                                <div class="post-details">
                                    <div class="post-meta">
                                        Đăng bởi <span class="post-author">{{ $news -> user -> name }}</span>
                                        /
                                        <span class="post-date">{{ $news -> created_at }}</span>
                                        
                                    </div>
                                    <h4 class="post-title">{{$news -> title}}</h4>
                                    <div class="post-cats">
                                        <a href="{{ route('cat_news.news',['slug' => slugify($news -> cat_news -> title,'-'),'id' => $news -> cat_news -> id])}}">{{$news -> cat_news -> title}}</a>
                                    </div>
                                    <div class="post-body mb-7">
                                        
                                        {!! $news -> content !!}

                                    </div>
                                    <!-- End Post Body -->
                                    <div class="post-footer d-flex justify-content-between align-items-center">
                                        <div class="tags mb-6">
                                            <label class="mr-2">Tags:</label>

                                            @forelse($news -> tags as $tag)
                                            <a href="{{route('list.news.tags',['slug' => slugify($tag -> name,'-'),'id' => $tag -> id ])}}" class="tag">{{$tag -> name}}</a>
                                            @empty
                                            <p>Không có tags</p>
                                            @endforelse

                                        </div>
                                        <div class="social-links inline-links mb-6">
                                            <label>Chia sẻ:</label>
                                            <a href="#" class="social-link social-facebook fab fa-facebook-f"
                                                style="color: #8f79ed"></a>
                                            <a href="#" class="social-link social-twitter fab fa-twitter"
                                                style="color: #79c8ed"></a>
                                            <a href="#" class="social-link fab fa-pinterest" style="color: #e66262"></a>
                                        </div>
                                    </div>
                                    <!-- End Post Footer -->
                                   
                                </div>
                            </article>
                            
                            <div class="related-posts mt-9 mb-9">
                                <h3 class="title title-simple text-left text-normal">Bài viết liên quan</h3>
                                <div class="owl-carousel owl-theme row cols-lg-3 cols-sm-2" data-owl-options="{
                                    'items': 1,
                                    'margin': 20,
                                    'loop': false,
                                    'responsive': {
                                        '576': {
                                            'items': 2
                                        },
                                        '992': {
                                            'items': 3
                                        }
                                    }
                                }">

                                    @forelse($news_related as $item)
                                    <div class="post">
                                        <figure class="post-media">
                                            <a href="{{ route('new.detail',['slug' => slugify($item -> title,'-'),'id' => $item -> id])}}">
                                                <img src="{{ asset('uploads/news/'.$item -> image_name) }}" width="380" height="250"
                                                    alt="{{ $item -> title }}" title="{{ $item -> title }}"/>
                                            </a>
                                        </figure>
                                        <div class="post-details">
                                            <div class="post-meta">
                                                <span class="post-date">{{ $item -> created_at }}</span>
                                                
                                            </div>
                                            <h4 class="post-title"><a href="{{ route('new.detail',['slug' => slugify($item -> title,'-'),'id' => $item -> id])}}">{{ $item -> title }}</a></h4>
                                            
                                        </div>
                                    </div>
                                    @empty
                                    <div class="post">Không có bài viết liên quan </div>
                                    @endforelse
                                    
                                </div>
                            </div>
                            
                          
                        </div>
                        <aside class="col-lg-3 right-sidebar blog-sidebar sidebar-fixed sticky-sidebar-wrapper">
                            <div class="sidebar-overlay">
                                <a class="sidebar-close" href="#"><i class="d-icon-times"></i></a>
                            </div>
                            <a href="#" class="sidebar-toggle"><i class="fas fa-chevron-left"></i></a>
                            <div class="sidebar-content">
                                <div class="sticky-sidebar" data-sticky-options="{'top': 89, 'bottom': 70}">
                                    
                                    <div class="widget widget-categories">
                                        <h3 class="widget-title">Danh mục tin tức</h3>
 
 										<!--- menu cat_news -->
                                        <ul class="widget-body filter-items search-ul">
                                        	@foreach($cat_news as $item)
                                            @if( $item -> parent == null)
                                            <li>
                                                <a href="{{route('cat_news.news',['slug' => slugify($item -> title,'-'),'id' => $item -> id])}}" class="{{ count($item->children) ? 'show' :'' }}">{{$item->title}}</a>
                                                 @if(count($item->children))
								                    @include('frontend.news.menusub',['childs' => $item-> children])
								                 @endif
                                                
                                            </li>
                                            @endif
                                           @endforeach()
                                        </ul>
                                        <!--- end menu cat_news -->

                                        
                                    </div>
                                   
                                    

                                    <div class="widget widget-posts">
                                        <h3 class="widget-title">Tag Cloud</h3>
                                        <div class="widget-body">
                                            
                                        	@forelse($tags as $tag)
                                            <a href="{{route('list.news.tags',['slug' => slugify($tag -> name,'-'),'id' => $tag -> id ])}}" class="tag">{{$tag -> name}}</a>
                                            @empty
                                            <p>Không có tags</p>
                                            @endforelse
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </main>
	
	

	@endsection

	
	