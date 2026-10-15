@php
    $current = $paginator->currentPage();
    $last = $paginator->lastPage();
    $onEachSide = 2;

    $pages = collect();
    $pages->push(1);

    for ($p = $current - $onEachSide; $p <= $current + $onEachSide; $p++) {
        if ($p > 1 && $p < $last) {
            $pages->push($p);
        }
    }

    if ($last > 1) {
        $pages->push($last);
    }

    $pages = $pages->unique()->sort()->values();
@endphp

@if ($last > 1)
    <div class="wd-loop-footer products-footer">
        <nav class="woocommerce-pagination wd-pagination" aria-label="{{ __('Paginación de producto') }}">
            <ul class='page-numbers'>
                @php $previous = null; @endphp
                @foreach ($pages as $p)
                    @if ($previous !== null && $p - $previous > 1)
                        <li><span class="page-numbers dots">&hellip;</span></li>
                    @endif
                    <li>
                        @if ($p === $current)
                            <span aria-label="{{ __('Página :n', ['n' => $p]) }}" aria-current="page" class="page-numbers current">{{ $p }}</span>
                        @else
                            <a aria-label="{{ __('Página :n', ['n' => $p]) }}" class="page-numbers" href="{{ $paginator->url($p) }}">{{ $p }}</a>
                        @endif
                    </li>
                    @php $previous = $p; @endphp
                @endforeach
                @if ($paginator->hasMorePages())
                    <li><a class="next page-numbers" href="{{ $paginator->nextPageUrl() }}">&rarr;</a></li>
                @endif
            </ul>
        </nav>
    </div>
@endif
