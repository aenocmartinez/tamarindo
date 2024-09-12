<div class="bg-white border border-gray-200 rounded-lg p-6 mb-6">
    @if($title)
        <h2 class="text-xl font-semibold text-gray-800 mb-4">{{ $title }}</h2>
    @endif

    <div class="grid gap-6 {{ count($indicators) === 2 ? 'grid-cols-2' : (count($indicators) === 3 ? 'grid-cols-3' : 'grid-cols-4') }}">
        @foreach($indicators as $indicator)
            <div class="p-4 border rounded-lg bg-gray-50">
                <div class="text-lg font-semibold {{ $indicator['color'] }}">{{ $indicator['title'] }}</div>
                <div class="text-2xl font-bold mt-2 {{ $indicator['color'] }}">{{ $indicator['value'] }}</div>
            </div>
        @endforeach
    </div>
</div>
