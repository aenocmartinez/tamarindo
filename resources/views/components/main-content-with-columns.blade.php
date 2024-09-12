<div class="bg-white p-6 mb-6">
    @if($title)
        <h2 class="text-2xl font-semibold {{ $titleAlignment === 'right' ? 'text-right' : 'text-left' }}
            {{ $titleColor ?? 'text-gray-700' }}">
            {{ $title }}
        </h2>
    @endif

    <!-- Contenedor de columnas sin borde -->
    <div class="grid gap-6 {{ 'grid-cols-' . $columnCount }} text-sm">
        {{ $slot }}
    </div>
</div>
