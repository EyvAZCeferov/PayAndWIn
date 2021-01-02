<style>
    a.notHovered {
        background-color: #7c9d32 !important;
    }

    a.notHovered:hover {
        background-color: white !important;
    }

</style>

@if ($paginator->hasPages())
    <div class="pagination-container pagination-blog">
        <nav role="navigation" class="pagination">
            {{-- Previous Page Link --}}
            @if (!$paginator->onFirstPage())
                <a class="prev page-numbers" rel="prev" href="{{ $paginator->previousPageUrl() }}"><i
                        class="fa fa-angle-left"></i></a>
            @else
                <a class="prev page-numbers notHovered" href="javascript:void(0)"><i
                        class="fa fa-angle-left"></i></a>
            @endif

            {{--Pages--}}

            @for ($i=1;$i<=$paginator->total();$i++)
                @if($i==$paginator->currentPage())
                    <span class="page-numbers current">{{$i}}</span>
                @else
                    <a class="page-numbers" href="{{url()->current().'?page='.$i}}">{{$i}}</a>
                @endif
            @endfor

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}" rel="next"><i
                        class="fa fa-angle-right"></i></a>
            @else
                <a class="prev page-numbers notHovered" href="javascript:void(0)"><i
                        class="fa fa-angle-right"></i></a>
            @endif
        </nav>
    </div>
@endif
