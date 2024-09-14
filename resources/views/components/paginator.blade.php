<div class="flex justify-center mt-4">
    <div class="flex items-center space-x-4">
        <!-- Enlace de retroceder -->
        <a 
            href="{{ $paginator->previousPageUrl() }}" 
            class="w-8 h-8 flex items-center justify-center bg-orange-500 text-white rounded-full border border-orange-600 hover:bg-orange-600 shadow-md @if($paginator->onFirstPage()) opacity-50 cursor-not-allowed pointer-events-none @endif"
            style="font-size: 0.75rem;"
        >
            &lt;
        </a>

        <!-- Select para páginas -->
        <div>
            <select 
                onchange="window.location.href=this.value" 
                class="text-sm px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-orange-500"
                style="width: 70px;" 
            >
                @for ($page = 1; $page <= $paginator->lastPage(); $page++)
                    <option 
                        value="{{ $paginator->url($page) }}" 
                        @if ($page == $paginator->currentPage()) selected @endif
                    >
                        {{ $page }}
                    </option>
                @endfor
            </select>
        </div>

        <!-- Enlace de avanzar -->
        <a 
            href="{{ $paginator->nextPageUrl() }}" 
            class="w-8 h-8 flex items-center justify-center bg-orange-500 text-white rounded-full border border-orange-600 hover:bg-orange-600 shadow-md @if(!$paginator->hasMorePages()) opacity-50 cursor-not-allowed pointer-events-none @endif"
            style="font-size: 0.75rem;"
        >
            &gt;
        </a>

        <!-- Resumen de registros -->
        <div class="ml-4 text-xs text-gray-700">
            <span>Mostrando</span>
            <span>{{ $paginator->firstItem() }}</span>
            <span>a</span>
            <span>{{ $paginator->lastItem() }}</span>
            <span>de</span>
            <span>{{ $paginator->total() }}</span>
            <span>registros</span>
        </div>
    </div>
</div>
