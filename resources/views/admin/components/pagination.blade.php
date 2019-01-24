@if ($paginator->hasPages())
    
<ul class="pagination">
        @if ($paginator->onFirstPage())
            
<li  class="light_grey_box pagination_disabled"><span>&laquo;</span></li>

        @else
            
<li class="grey_box"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>

        @endif
        @foreach ($elements as $element)
            @if (is_string($element))
                
<li class="light_grey_box pagination_disabled"><span>{{ $element }}</span></li>

            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        
<li class="dark_grey_box pagination_active"><span>{{ $page }}</span></li>

                    @else
                        
<li class="grey_box pagination_normal"><a href="{{ $url }}">{{ $page }}</a></li>

                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            
<li class="grey_box pagination_normal"><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>

        @else
            
<li  class="light_grey_box pagination_disabled"><span>&raquo;</span></li>

        @endif
    </ul>


@endif
