@extends('layouts.app')

@section('content')

<!-- Breadcrumb -->
<x-breadcrumb
    sectionName="Colecciones"
    description="Gestiona tus colecciones con eficiencia y estilo."
    :breadcrumbs="[
        ['url' => route('collections.index'), 'label' => 'Inicio'],
        ['url' => route('collections.index'), 'label' => 'Colecciones']
    ]"
/>

<!-- Contenedor Principal -->
<div class="container mx-auto px-4 py-8">

    <!-- Encabezado y Botón de Agregar -->
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-800"></h2>
        <a href="{{ route('collections.create') }}" class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-300 transition duration-300 shadow-sm">
            + Agregar Colección
        </a>
    </div>

    <!-- Tarjetas de Colecciones -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse ($collections as $collection)
            <div class="bg-white border border-gray-200 rounded-2xl shadow-md hover:shadow-lg transition-all duration-300 h-auto">
                <!-- Encabezado con Color Claro -->
                <div class="bg-gray-100 text-gray-800 text-base font-semibold flex items-center justify-between px-4 py-3 rounded-t-2xl">
                    <div class="flex items-center">
                        <!-- Avatar Simple -->
                        <div class="w-10 h-10 bg-gray-300 text-gray-700 rounded-full flex items-center justify-center mr-3">
                            <span class="text-lg font-bold">{{ strtoupper(substr($collection->name, 0, 1)) }}</span>
                        </div>
                        <!-- Nombre de la Colección -->
                        <span class="truncate text-sm">{{ $collection->name }}</span>
                    </div>
                    
                    <!-- Menú de 3 puntos en el título -->
                    <div class="relative">
                        <button id="menu-button-{{ $collection->id }}" class="focus:outline-none">
                            <!-- Tres puntos verticales -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v.01M12 12v.01M12 18v.01" />
                            </svg>
                        </button>

                        <!-- Menú desplegable -->
                        <div id="dropdown-menu-{{ $collection->id }}" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-200 rounded-lg shadow-lg z-10 text-sm">
                            <a href="{{ route('collections.show', $collection->id) }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800 text-xs">
                                Más información
                            </a>
                            <a href="{{ route('collections.edit', $collection->id) }}" class="block px-4 py-2 text-gray-600 hover:bg-gray-100 hover:text-gray-800 text-xs">
                                Editar
                            </a>
                            <form action="{{ route('collections.destroy', $collection->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta colección?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full text-left px-4 py-2 text-red-500 hover:bg-gray-100 hover:text-red-700 text-xs">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Contenido de la Tarjeta (Cuerpo más alto) -->
                <div class="p-6 flex-grow min-h-[120px]">
                    <p class="text-gray-600 text-sm">{{ Str::limit($collection->description, 120) }}</p>
                </div>
            </div>

            <!-- Script para mostrar y ocultar el menú desplegable -->
            <script>
                document.getElementById('menu-button-{{ $collection->id }}').addEventListener('click', function(event) {
                    event.stopPropagation();
                    const menu = document.getElementById('dropdown-menu-{{ $collection->id }}');
                    menu.classList.toggle('hidden');

                    // Cerrar el menú si se hace clic en cualquier parte de la ventana
                    window.addEventListener('click', function() {
                        menu.classList.add('hidden');
                    });

                    // Evitar cerrar el menú si se hace clic dentro del menú
                    menu.addEventListener('click', function(event) {
                        event.stopPropagation();
                    });
                });
            </script>
        @empty
            <p class="text-gray-600 text-center text-sm">No se encontraron colecciones. <a href="{{ route('collections.create') }}" class="text-gray-700 hover:underline">Crea una nueva aquí</a>.</p>
        @endforelse
    </div>
</div>

@endsection
