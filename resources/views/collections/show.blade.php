@extends('layouts.app')

@section('content')

<!-- Breadcrumb -->
<x-breadcrumb
    sectionName="Colecciones"
    description="Gestiona tus colecciones con eficiencia y estilo."
    :breadcrumbs="[
        ['url' => route('collections.index'), 'label' => 'Colecciones'],
        ['url' => '#', 'label' => 'Más información']
    ]"
/>

<!-- Contenedor Principal -->
<div class="container mx-auto px-4 py-8">
    <!-- Encabezado -->
    <div class="mb-8 flex justify-between items-center">
        <h2 class="text-2xl font-bold text-gray-600">Más información</h2>
        <!-- Botón Volver -->
        <a href="{{ route('collections.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-300 transition duration-300">
            Volver
        </a>
    </div>

    <!-- Sección Principal en 2 columnas con mayor separación -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12"> <!-- Aumentar el gap para mayor espacio entre columnas -->
        <!-- Información General de la Colección -->
        <div>
            <div class="bg-white p-6"> <!-- Eliminando todos los bordes -->
                <!-- Separador -->
                <div class="border-b border-gray-200 pb-4 mb-4">
                    <!-- <p class="text-xs font-semibold text-gray-500">Nombre</p> -->
                    <p class="text-gray-700 text-lg">{{ $collection->name }}</p>
                </div>
                <div>
                    <p class="text-xs font-semibold text-gray-500">Descripción</p>
                    <p class="text-gray-700 text-sm">{{ $collection->description ?? 'No hay descripción disponible.' }}</p>
                </div>
            </div>
        </div>

        <!-- Tarjetas de Estadísticas (columna derecha) -->
        <div class="flex flex-col space-y-4"> <!-- Espacio entre tarjetas -->
            <!-- Tarjeta Número de Objetos -->
            <div class="bg-indigo-50 rounded-lg p-4 flex items-center">
                <div class="flex-1">
                    <p class="text-xs font-semibold text-gray-600">Número de Objetos</p>
                    <p class="text-3xl font-bold text-indigo-700">{{ $collection->objects_count ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-indigo-200 text-indigo-700 rounded-full flex items-center justify-center">
                    <!-- Icono de objetos -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18M8 7v10M12 7v10M16 7v10" />
                    </svg>
                </div>
            </div>

            <!-- Tarjeta Objetos con Estado de Conservación Caducada -->
            <div class="bg-red-50 rounded-lg p-4 flex items-center">
                <div class="flex-1">
                    <p class="text-xs font-semibold text-gray-600">Objetos con Conservación Caducada</p>
                    <p class="text-3xl font-bold text-red-700">{{ $collection->expired_objects_count ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-red-200 text-red-700 rounded-full flex items-center justify-center">
                    <!-- Icono de alerta -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.054 0 1.636-1.178.928-2.08l-6.928-10c-.708-.902-2.092-.902-2.8 0l-6.928 10c-.708.902-.126 2.08.928 2.08z" />
                    </svg>
                </div>
            </div>

            <!-- Tarjeta Número de Objetos sin Imágenes -->
            <div class="bg-yellow-50 rounded-lg p-4 flex items-center">
                <div class="flex-1">
                    <p class="text-xs font-semibold text-gray-600">Número de Objetos sin Imágenes</p>
                    <p class="text-3xl font-bold text-yellow-700">{{ $collection->objects_without_images_count ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-yellow-200 text-yellow-700 rounded-full flex items-center justify-center">
                    <!-- Icono de imagen faltante -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4V12m0 0L16 8m-4 4L8 8m-4 8h16M4 20h16M4 20V4" />
                    </svg>
                </div>
            </div>

            <!-- Tarjeta Número de Objetos sin Campos Básicos -->
            <div class="bg-blue-50 rounded-lg p-4 flex items-center">
                <div class="flex-1">
                    <p class="text-xs font-semibold text-gray-600">Número de Objetos sin Campos Básicos</p>
                    <p class="text-3xl font-bold text-blue-700">{{ $collection->objects_without_basic_fields_count ?? 0 }}</p>
                </div>
                <div class="w-12 h-12 bg-blue-200 text-blue-700 rounded-full flex items-center justify-center">
                    <!-- Icono de campos incompletos -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
