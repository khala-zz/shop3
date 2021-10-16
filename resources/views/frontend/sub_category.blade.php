 
 @foreach($childs as $child)
 
 
     <li>
        <a href="{{ Request::segment(1) == 'cat_news'?route('cat_news.news',['slug' => slugify($child -> title,'-'),'id' => $child -> id]): route('category.product',['slug' => slugify($child -> title,'-'),'id' => $child -> id]) }}" 
            class="{{ count($child->children) ? 'show' :'' }}" {{Request::segment(3) == $child -> id ? 'style=color:#26b' : " "}}>{{$child->title}}</a>
        @if(count($child->children))
            <ul><li><a href="">
            @include('frontend.sub_category',['childs' => $child -> children])
           </a></li></ul>
        @endif

    </li>

@endforeach

 