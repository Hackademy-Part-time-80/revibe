<!-- componente per visualizzare numeri pagine -->
@if ($paginator->hasPages())
    <nav class="d-flex justify-content-center mt-5 mb-4" aria-label="Navigazione pagine">
        <ul class="pagination flex-wrap gap-2 border-0">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link border-0 bg-light text-secondary rounded-3 shadow-sm px-3 py-2" aria-hidden="true">&lsaquo; Prec</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link border-0 bg-white text-primary rounded-3 shadow-sm px-3 py-2 fw-medium transition-all hover-shadow" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo; Prec</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link border-0 bg-transparent text-muted px-2 py-2">{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span class="page-link border-0 bg-primary text-white rounded-3 shadow-sm px-3 py-2 fw-bold">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link border-0 bg-white text-dark rounded-3 shadow-sm px-3 py-2 transition-all hover-bg-primary hover-text-white" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link border-0 bg-white text-primary rounded-3 shadow-sm px-3 py-2 fw-medium transition-all hover-shadow" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Succ &rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link border-0 bg-light text-secondary rounded-3 shadow-sm px-3 py-2" aria-hidden="true">Succ &rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif