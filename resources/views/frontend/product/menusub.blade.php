 
 @foreach($childs as $child)
 
 <ul style="display: block">
     <li>
        <a href="{{ url('cua-hang?category_id='.$child -> id)}}" 
        	class="{{ count($child->children) ? 'show' :'' }} {{Request::get('category_id') == $child -> id ? 'active-filters' :''}}">{{$child->title}}</a>
        @if(count($child->children))
        	
            @include('frontend.news.menusub',['childs' => $child -> children])
           
        @endif

    </li>
</ul>
@endforeach