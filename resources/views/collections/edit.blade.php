@extends('layouts.app')

@section('content')

<!-- Breadcrumb -->
<x-breadcrumb
    sectionName="Colecciones"
    description="Gestiona tus colecciones con eficiencia y estilo."
    :breadcrumbs="[
        ['url' => route('collections.index'), 'label' => 'Colecciones'],
        ['url' => '#', 'label' => 'Agregar Colección']
    ]"
/>

<!-- Contenedor Principal -->
<div class="container mx-auto px-4 py-8">
    <!-- Encabezado -->
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-500">Editar Colección</h2>
    </div>
    <!-- Formulario -->
        <form action="{{ route('collections.update', $collection->id) }}" method="POST">
            @csrf @method('PUT')
            @include('collections._form')
     </form>
</div>

@endsection
