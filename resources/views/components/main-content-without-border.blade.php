<div class="bg-white rounded-lg p-6 mb-6">
    @if($title)
        <h2 class="text-xl font-semibold {{ $titleAlignment === 'right' ? 'text-right' : 'text-left' }}
            {{ $titleColor ?? 'text-gray-400' }}">
            {{ $title }}
        </h2>
    @endif
    <div class="text-gray-700 text-sm">
        {{ $slot }}
    </div>
</div>
