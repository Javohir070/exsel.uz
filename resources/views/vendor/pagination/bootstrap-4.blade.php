@if ($paginator->hasPages())
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <a class="pagination__link" aria-hidden="true"><i class="w-4 h-4" data-feather="chevrons-left"></i></a>
                    
                </li>
            @else
                <li>
                    <a class="pagination__link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="w-4 h-4" data-feather="chevrons-left"></i></a>
                </li>
            @endif
            <li> <a class="pagination__link" href="">...</a> </li>

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="pagination__link disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li aria-current="page" ><a class="pagination__link pagination__link--active">{{ $page }}</a></li>
                        @else
                            <li><a class="pagination__link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            <li> <a class="pagination__link" href="">...</a> </li>

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a class="pagination__link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="w-4 h-4" data-feather="chevrons-right"></i></a>
                </li>
            @else
                <li aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a class="pagination__link" aria-hidden="true"><i class="w-4 h-4" data-feather="chevrons-right"></i></a>
                </li>
            @endif
        </ul>
@endif
