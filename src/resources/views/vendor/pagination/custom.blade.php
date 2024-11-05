@if ($paginator->hasPages())
<div class="pagination">
    {{-- 前のページリンク --}}
    @if ($paginator->onFirstPage())
    <span class="pagination-button disabled">&lt;</span>
    @else
    <a href="{{ $paginator->previousPageUrl() }}&date={{ request('date') }}" class="pagination-button">&lt;</a>
    @endif

    {{-- ページ番号 --}}
    @foreach ($elements as $element)
    {{-- 省略記号 --}}
    @if (is_string($element))
    <span class="pagination-dots">{{ $element }}</span>
    @endif

    {{-- 各ページへのリンク --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <span class="pagination-button active">{{ $page }}</span>
    @else
    <a href="{{ $url }}&date={{ request('date') }}" class="pagination-button">{{ $page }}</a>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- 次のページリンク --}}
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}&date={{ request('date') }}" class="pagination-button">&gt;</a>
    @else
    <span class="pagination-button disabled">&gt;</span>
    @endif
</div>
@endif