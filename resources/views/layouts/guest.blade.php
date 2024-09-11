<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Tamarindo') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,600,700">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Additional Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen bg-white flex">
    <!-- Columna izquierda: fondo con degradado elegante -->
    <div class="hidden lg:block w-1/2 bg-gradient-to-br from-orange-400 via-red-500 to-yellow-500">
        <div class="flex items-center justify-center h-full text-white p-8">
            <h1 class="text-5xl font-bold leading-tight">Bienvenido a Tamarindo</h1>
        </div>
    </div>

    <!-- Columna derecha: formulario de login -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-12">
        <div class="w-full max-w-md">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
