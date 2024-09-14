@extends('layouts.app')

@section('content')

<!-- Breadcrumb -->
<x-breadcrumb
    sectionName="Gestor de Campos"
    description="Administra los campos que se asociarán a las colecciones."
    :breadcrumbs="[
        ['url' => route('fields.index'), 'label' => 'Inicio'],
        ['url' => route('fields.index'), 'label' => 'Gestor de campos'],
    ]"
/>

<!-- Contenedor Principal -->
<div class="container mx-auto px-4 py-8">
    <!-- Encabezado y Botón de Agregar -->
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-gray-500"></h2>
        <a href="{{ route('collections.create') }}" class="px-4 py-2 bg-gray-200 text-gray-700 text-sm font-medium rounded-lg hover:bg-gray-300 transition duration-300 shadow-sm">
            + Agregar Campo
        </a>
    </div>

    <!-- Buscador -->
    <form method="GET" action="{{ route('fields.index') }}" class="mb-6">
        <div class="flex space-x-4">
            <input type="text" name="search_name" placeholder="Buscar por nombre" value="{{ request('search_name') }}" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:border-blue-300 w-full">
            <select name="search_type" class="px-4 py-2 border border-gray-300 rounded-lg focus:ring focus:ring-blue-200 focus:border-blue-300">
                <option value="">Todos los tipos</option>
                <option value="simple" @if(request('search_type') == 'simple') selected @endif>Simple</option>
                <option value="compuesto" @if(request('search_type') == 'compuesto') selected @endif>Compuesto</option>
            </select>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300">
                Buscar
            </button>
        </div>
    </form>

    <!-- Tabla de Campos -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-50">
                <tr>
                    <th class="text-left py-3 px-4 font-semibold text-sm text-gray-600">Nombre</th>
                    <th class="text-left py-3 px-4 font-semibold text-sm text-gray-600">Descripción</th> <!-- Nueva columna -->
                    <th class="text-left py-3 px-4 font-semibold text-sm text-gray-600">Tipo</th>
                    <th class="text-center py-3 px-4 font-semibold text-sm text-gray-600">Subcampos</th>
                    <th class="text-right py-3 px-4 font-semibold text-sm text-gray-600">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
                @foreach ($fields as $field)
                    <tr class="border-b hover:bg-gray-50 transition duration-200">
                        <!-- Nombre del Campo -->
                        <td class="py-4 px-4">{{ $field->name }}</td>

                        <!-- Descripción del Campo -->
                        <td class="py-4 px-4">{{ $field->description ?? 'N/A' }}</td> <!-- Nueva columna -->

                        <!-- Tipo de Campo -->
                        <td class="py-4 px-4">
                            <span class="inline-block px-3 py-1 rounded-full text-xs font-semibold {{ $field->isComposite() ? 'bg-green-100 text-green-700' : 'bg-blue-100 text-blue-700' }}">
                                {{ $field->isComposite() ? 'Compuesto' : 'Simple' }}
                            </span>
                        </td>

                        <!-- Número de Subcampos -->
                        <td class="py-4 px-4 text-center">
                            @if ($field->isComposite())
                                <span class="bg-gray-100 px-3 py-1 rounded-full text-xs">{{ $field->subfields()->count() }}</span>
                            @else
                                <span class="text-gray-400">N/A</span>
                            @endif
                        </td>

                        <!-- Acciones -->
                        <td class="py-4 px-4 text-right space-x-2">
                            <!-- Menú Desplegable de Acciones -->
                            <div x-data="{ open: false }" class="relative inline-block text-left">
                                <div>
                                    <button @click="open = !open" type="button" class="flex items-center justify-center w-8 h-8 text-gray-500 bg-gray-100 rounded-full hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zm6 0a2 2 0 11-4 0 2 2 0 014 0zm6 0a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </button>
                                </div>

                                <!-- Menú -->
                                <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-20">
                                    <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                                        <a href="{{ route('fields.edit', $field->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                            Editar
                                        </a>
                                        @if ($field->isComposite())
                                            <a href="{{ route('fields.subfields.manage', $field->id) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                                Gestionar Subcampos
                                            </a>
                                        @endif
                                        <form action="{{ route('fields.destroy', $field->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este campo?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100" role="menuitem">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Paginación personalizada -->
        <div class="p-4">
            <x-paginator :paginator="$fields" />
        </div>

    </div>
</div>

@endsection
