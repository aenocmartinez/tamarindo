@php
    // Define las clases de tamaño para la tarjeta
    $sizeClass = match($size) {
        'sm' => 'w-64',    // 16rem de ancho
        'md' => 'w-80',    // 20rem de ancho
        'lg' => 'w-96',    // 24rem de ancho
        default => 'w-full', // Tamaño por defecto
    };

    // Define el color de texto del título basado en el color de fondo
    $titleTextColor = $titleBackgroundColor ? 'text-white' : 'text-black';

    // Define el estilo del fondo del título
    $titleBackgroundStyle = $titleBackgroundColor ? "background-color: $titleBackgroundColor;" : '';
@endphp

<div class="bg-white border border-gray-200 rounded-lg shadow-md {{ $sizeClass }} overflow-hidden mb-6">
    @if($title)
        <div class="p-4" style="{{ $titleBackgroundStyle }}">
            <h2 class="{{ $titleFontSize }} font-semibold {{ $titleTextColor }}">
                {{ $title }}
            </h2>
        </div>
    @endif

    <div class="p-4 {{ $textAlignment === 'center' ? 'text-center' : ($textAlignment === 'right' ? 'text-right' : 'text-left') }}">
        @if($icon)
            <div class="flex items-center space-x-2 mb-4">
                <div class="text-xl">
                    {!! $icon !!}
                </div>
                <div class="{{ $bodyFontSize }}">
                    {{ $slot }}
                </div>
            </div>
        @else
            <div class="{{ $bodyFontSize }}">
                {{ $slot }}
            </div>
        @endif
    </div>

    @if($footer)
        <div class="p-4 border-t border-gray-200 {{ $footerFontSize }}">
            {{ $footer }}
        </div>
    @endif
</div>
