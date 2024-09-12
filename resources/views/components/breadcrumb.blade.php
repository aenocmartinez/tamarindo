<div class="bg-white rounded-lg p-5 mb-3">
    <!-- Contenedor para el título y subtítulo -->
    <div class="mb-4">
        <h1 class="text-3xl font-bold text-orange-600">
            {{ $sectionName }}
        </h1>
        @if($description)
            <p class="text-sm text-gray-600">{{ $description }}</p>
        @endif
    </div>
    <!-- Breadcrumbs para navegación -->
    <nav aria-label="Breadcrumb" class="flex items-center space-x-3">
        <ol class="list-reset flex items-center text-sm text-gray-600">
            @foreach($breadcrumbs as $breadcrumb)
                <li>
                    <a href="{{ $breadcrumb['url'] }}" class="text-orange-600 hover:text-orange-700 hover:underline transition-colors duration-200">
                        {{ $breadcrumb['label'] }}
                    </a>
                </li>
                @if(!$loop->last)
                    <li>
                        <span class="text-gray-400 mx-3">/</span>
                    </li>
                @endif
            @endforeach
        </ol>
    </nav>
</div>
