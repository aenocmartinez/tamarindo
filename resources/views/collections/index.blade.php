@extends('layouts.app')

@section('content')

<x-breadcrumb
        sectionName="Colecciones"
        description="Permite gestionar fácilmente tus colecciones de objetos de museo, permitiendo agregar, ver, actualizar y eliminar registros según sea necesario."
        :breadcrumbs="[
            ['url' => '#', 'label' => 'Inicio'],
            ['url' => '#', 'label' => 'Dashboard Tamarindo']
        ]"
    />

@endsection