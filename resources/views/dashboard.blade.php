@extends('layouts.app')

@section('content')
    <!-- Breadcrumb -->
    <x-breadcrumb
        sectionName="Dashboard Tamarindo"
        description="Descripción breve o subtítulo"
        :breadcrumbs="[
            ['url' => '#', 'label' => 'Inicio'],
            ['url' => '#', 'label' => 'Dashboard Tamarindo']
        ]"
    />

    <!-- Contenido Principal -->
    <x-main-content-without-border
    title="Título del Contenido Principal"
    titleAlignment="left"
    >
        <p>Este es un ejemplo de contenido con borde. Puede incluir texto, imágenes, o cualquier otro elemento interactivo.</p>
        <!-- <img src="https://via.placeholder.com/800x400" alt="Imagen de Ejemplo" class="w-full rounded-lg mb-4"> -->
        <p>Más contenido aquí...</p>
    </x-main-content-without-border>


    <x-main-content-with-columns
        title=""
        titleAlignment="left"
        columnCount="2"
    >

    <div class="bg-white-100 p-4 rounded-lg">
        <h3 class="text-lg font-semibold mb-2">Campos</h3>
        <p>Contenido extenso para la columna 1. Puedes agregar texto, imágenes, o cualquier otro elemento aquí.</p>
    </div>

    <div class="bg-gray-100 p-4 rounded-lg">
        <h3 class="text-lg font-semibold mb-2">Columna 2</h3>
        <p>Contenido extenso para la columna 2. Puedes agregar texto, imágenes, o cualquier otro elemento aquí.</p>
    </div>

    <div class="bg-gray-100 p-4 rounded-lg">
        <h3 class="text-lg font-semibold mb-2">Columna 3</h3>
        <p>Contenido extenso para la columna 3. Puedes agregar texto, imágenes, o cualquier otro elemento aquí.</p>
    </div>

    <div class="bg-white-100 p-4 rounded-lg">
        <h3 class="text-lg font-semibold mb-2">Campos</h3>
        <p>Contenido extenso para la columna 1. Puedes agregar texto, imágenes, o cualquier otro elemento aquí.</p>
    </div>    
</x-main-content-with-columns>



<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <x-card
            title="Título de la Tarjeta 1"
            titleBackgroundColor="#5ce5a3"  {{-- Color tamarindo --}}
            textAlignment="center"
            icon=""
            footer="Pie de tarjeta opcional"
            size="md"
            titleFontSize="text-md"
            bodyFontSize="text-base"
            footerFontSize="text-sm"
        >
            Aquí va el contenido de la primera tarjeta.
        </x-card>

        <x-card
            title="Título de la Tarjeta 2"
            titleBackgroundColor="#FF6F61"
            textAlignment="left"
            icon=""
            size="md"
            titleFontSize="text-sm"
            bodyFontSize="text-sm"
            footerFontSize="text-sm"
        >
            Aquí va el contenido de la segunda tarjeta.
        </x-card>

        <x-card
            title="Título de la Tarjeta 3"
            titleBackgroundColor="#a154c4"
            textAlignment="right"
            footer="Pie de tarjeta opcional"
            size="sm"
            titleFontSize="text-sm"
            bodyFontSize="text-sm"
            footerFontSize="text-sm"
        >
            Aquí va el contenido de la tercera tarjeta.
        </x-card>
    </div>

    <div class="space-y-4">


    
    <x-notification
    type="error"
    title="¡Éxito!"
    message="La operación se completó con éxito."
    dismissible="true"
    titleFontSize="text-xl"
    bodyFontSize="text-base"
    footerFontSize=""
    footer=""
/>




    </div>  
@endsection
