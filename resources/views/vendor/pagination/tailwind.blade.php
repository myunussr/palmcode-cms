@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex justify-between mt-4">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-200 rounded-md cursor-not-allowed">
                {!! __('Previous') !!}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
               class="inline-flex items-center px-4 py-2 text-sm font-medium text-primary bg-white border border-primary rounded-md hover:bg-[#0BA0A3] hover:text-white transition">
                {!! __('Previous') !!}
            </a>
        @endif

        {{-- Pagination Elements --}}
        <div class="flex space-x-1 mx-2">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="px-4 py-2 text-sm text-gray-400">{{ $element }}</span>
                @endif

                {{-- Array of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page"
                                  class="inline-flex items-center px-4 py-2 text-sm font-bold text-white bg-primary border border-primary rounded-md">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                               class="inline-flex items-center px-4 py-2 text-sm text-primary bg-white border border-primary rounded-md hover:bg-[#0BA0A3] hover:text-white transition">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
               class="inline-flex items-center px-4 py-2 text-sm font-medium text-primary bg-white border border-primary rounded-md hover:bg-[#0BA0A3] hover:text-white transition">
                {!! __('Next') !!}
            </a>
        @else
            <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-gray-100 border border-gray-200 rounded-md cursor-not-allowed">
                {!! __('Next') !!}
            </span>
        @endif
    </nav>
@endif
