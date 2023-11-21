<div class="pagination">
    {{-- Anterior Page Link --}}
    @if ($paginator->onFirstPage())
        <span class="disabled">Anterior</span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev">Anterior</a>
    @endif

    {{-- Links de página --}}
    @foreach ($elements as $element)
        @if (is_string($element))
            <span class="disabled">{{ $element }}</span>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="current">{{ $page }}</span>
                @else
                    <a href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Próxima Page Link --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" rel="next">Próxima</a>
    @else
        <span class="disabled">Próxima</span>
    @endif
</div>
