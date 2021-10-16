@extends('frontend.layouts.master')
    @php 
        if(Request::segment(2))
            $title_cat = str_replace('-',' ', Request::segment(2));
        else
            $title_cat = 'Tin tức';
    @endphp
	@section('title')
		<title>{{$title_cat}}</title>
	@endsection

	@section('content')
	   <main class="main">
            <div class="page-header" style="background-image: url({{asset('images/page-header.jpg')}})">
                <h1 class="page-title">{{ $title_cat }}</h1>
            </div>
            <nav class="breadcrumb-nav">
                <div class="container">
                    <ul class="breadcrumb">
                        <li><a href="{{url('/')}}"><i class="d-icon-home"></i></a></li>
                        <li><a href="{{url('/news')}}" class="active">Tin tức</a></li>
                        @if($title_cat <> 'Tin tức')
                        <li>{{ $title_cat }} </li>
                        @endif
                    </ul>
                </div>
            </nav>
            <div class="page-content mt-6">
                <div class="container">
                    <div class="row gutter-lg">
                        <div class="col-lg-9">
                            <div class="posts">
                                @foreach( $news as $item)
                                <article class="post post-list mb-10 pb-4">
                                    <figure class="post-media">
                                        <a href="{{ route('new.detail',['slug' => slugify($item -> title,'-'),'id' => $item -> id])}}">
                                            <img src="{{ asset('uploads/news/'.$item -> image_name) }}" width="870" height="420" alt="{{ $item -> title }}" title="{{ $item -> title }}" />
                                        </a>
                                    </figure>
                                    <div class="post-details">
                                        <div class="post-meta">
                                            <span class="post-author">{{ $item -> user -> name }}</span>
                                            |
                                            <span class="post-date">{{ $item -> created_at }}</span>
                                            
                                        </div>
                                        <h4 class="post-title"><a href="{{ route('new.detail',['slug' => slugify($item -> title,'-'),'id' => $item -> id])}}">{{ $item -> title }}</a>
                                        </h4>
                                        <div class="post-cats">
                                            <a href="{{ route('cat_news.news',['slug' => slugify($item -> cat_news -> title,'-'),'id' => $item -> cat_news -> id])}}">{{$item -> cat_news -> title}}</a>
                                        </div>
                                        <p class="post-content">{{ $item -> description }}</p>
                                        <a href="{{ route('new.detail',['slug' => slugify($item -> title,'-'),'id' => $item -> id])}}"
                                            class="btn btn-link btn-underline btn-primary btn-reveal-right">Chi tiết<i
                                                class="d-icon-arrow-right"></i></a>
                                    </div>
                                </article>
                                @endforeach()
                                
                            </div>
                            {{ $news -> links()}}
                            <br />
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
                                            <li class="active">
                                                <a href="{{ route('cat_news.news',['slug' => slugify($item -> title,'-'),'id' => $item -> id])}}" class="{{ count($item->children) ? 'show' :'' }}" {{Request::segment(3) == $item-> id ? 'style=color:#26b' : " "}}>{{$item->title}}</a>
                                                 @if(count($item->children))
                                    
                                                    @include('frontend.news.menusub',['childs' => $item -> children])
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
                                            @foreach($tags as $tag)
                                            <a href="{{route('list.news.tags',['slug' => slugify($tag -> name,'-'),'id' => $tag -> id])}}" class="tag">{{$tag -> name}}</a>
                                            @endforeach
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

	
	