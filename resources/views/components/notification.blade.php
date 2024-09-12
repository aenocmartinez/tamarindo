@php
    // Define las clases para el tipo de notificación
    $typeClasses = match($type) {
        'success' => 'bg-green-100 text-green-700',
        'error' => 'bg-red-100 text-red-700',
        'warning' => 'bg-yellow-100 text-yellow-700',
        'info' => 'bg-blue-100 text-blue-700',
        default => 'bg-gray-100 text-gray-700',
    };

    // Define los íconos para cada tipo de notificación
    $icon = match($type) {
        'success' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>',
        'error' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>',
        'warning' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v10m0 4h.01" /></svg>',
        'info' => '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8h.01M12 12h.01M12 16h.01" /></svg>',
    };
@endphp

<div x-data="{ open: true }" x-show="open" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 transform translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-500" x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform translate-y-4" class="p-4 mb-4 rounded-lg {{ $typeClasses }}">
    <div class="flex items-start">
        <div class="mr-3">
            {!! $icon !!}
        </div>
        <div class="flex-1">
            @if ($title)
                <p class="{{ $titleFontSize }} font-semibold mb-1">{{ $title }}</p>
            @endif
            <p class="{{ $bodyFontSize }}">{{ $message }}</p>
        </div>
        @if ($dismissible)
            <button @click="open = false" class="ml-3 text-gray-500 hover:text-gray-700 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        @endif
    </div>
    @if ($footer)
        <div class="mt-2 {{ $footerFontSize }}">
            {{ $footer }}
        </div>
    @endif
</div>
