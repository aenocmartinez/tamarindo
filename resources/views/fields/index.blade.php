@extends('layouts.app')

@section('content')

<x-breadcrumb
        sectionName="Gestor de campos"
        description="Personaliza las fichas técnicas de tus colecciones, configurando y organizando los metadatos específicos para cada tipo de objeto."
        :breadcrumbs="[
            ['url' => '#', 'label' => 'Inicio'],
            ['url' => '#', 'label' => 'Gestor de campos']
        ]"
    />

@endsection