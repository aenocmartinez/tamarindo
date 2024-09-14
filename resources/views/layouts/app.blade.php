<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Tamarindo') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,600,700">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/css/custom.css', 'resources/js/app.js'])

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Custom JS con jQuery -->
    <script>
        $(document).ready(function() {
            $('#notification-icon').click(function(event) {
                event.stopPropagation();
                $('#notification-popup').toggle();
                $('#user-dropdown').hide();
            });

            $('#user-dropdown-trigger').click(function(event) {
                event.stopPropagation();
                $('#user-dropdown').toggle();
                $('#notification-popup').hide();
            });

            $(document).click(function(event) {
                if (!$(event.target).closest('#notification-icon, #notification-popup').length) {
                    $('#notification-popup').hide();
                }
                if (!$(event.target).closest('#user-dropdown-trigger, #user-dropdown').length) {
                    $('#user-dropdown').hide();
                }
            });
        });
    </script>
</head>
<body class="min-h-screen bg-white flex flex-col">

    <!-- Header -->
    <header class="header">
        <!-- Logo o Nombre de la Aplicación -->
        <div class="header-logo">
            {{ config('app.name', 'Tamarindo') }}
        </div>

        <!-- Información del usuario, dropdown y notificaciones -->
        <div class="user-info">
            <!-- Notificaciones -->
            <div id="notification-icon" class="notification-icon">
                <i data-feather="bell" style="width: 18px; height: 18px;"></i>
                <span class="notification-count">3</span>
            </div>

            <!-- Popup de notificaciones -->
            <div id="notification-popup" class="notification-popup">
                <ul>
                    <li class="unread-notification">
                        <i data-feather="circle" class="notification-icon-status"></i>
                        <div class="notification-content">
                            <div class="notification-details">
                                <span class="notification-title">Nuevo mensaje</span>
                                <div class="notification-time">Recibido hace 5 horas</div>
                            </div>
                            <div class="notification-extra-info">No leído</div>
                        </div>
                    </li>
                    <li class="read-notification">
                        <i data-feather="check-circle" class="notification-icon-status"></i>
                        <div class="notification-content">
                            <div class="notification-details">
                                <span class="notification-title">Recordatorio de suscripción</span>
                                <div class="notification-time">Recibido hace 2 días</div>
                            </div>
                            <div class="notification-extra-info">Leído</div>
                        </div>
                    </li>
                    <li class="read-notification">
                        <i data-feather="check-circle" class="notification-icon-status"></i>
                        <div class="notification-content">
                            <div class="notification-details">
                                <span class="notification-title">Actualización de la app</span>
                                <div class="notification-time">Recibido hace 1 día</div>
                            </div>
                            <div class="notification-extra-info">Leído</div>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- Nombre del usuario con ícono y flecha -->
            @if (Auth::check())
                <span id="user-dropdown-trigger">
                    <!-- <div class="circular-avatar">
                        <i data-feather="user" style="width: 18px; height: 18px;"></i>
                    </div> -->
                    {{ Auth::user()->name }}
                    <i data-feather="chevron-down" class="user-dropdown-icon" style="width: 14px; height: 14px;"></i>
                </span>

                <!-- Dropdown menú para perfil, configuración, y cerrar sesión -->
                <div id="user-dropdown" class="dropdown-menu">
                    <div class="dropdown-header flex items-center px-4 py-3 bg-gray-100">
                        <div class="circular-avatar">
                            <i data-feather="user" style="width: 24px; height: 24px;"></i>
                        </div>
                        <div>
                            <span class="text-xs text-center">{{ Auth::user()->name }}</span>
                            <div class="text-xs text-center text-gray-500">{{ Auth::user()->role->name ?? 'Administrador' }}</div>
                        </div>
                    </div>
                    <div class="dropdown-body">
                        <a href="{{ route('profile.edit') }}" class="dropdown-item">
                            <i data-feather="edit" class="dropdown-icon"></i>
                            Perfil
                        </a>
                        <a href="#" class="dropdown-item">
                            <i data-feather="settings" class="dropdown-icon"></i>
                            Configuración
                        </a>
                        <a href="#" class="dropdown-item">
                            <i data-feather="sliders" class="dropdown-icon"></i>
                            Personalizar
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="dropdown-item">
                            @csrf
                            <button type="submit">
                                <i data-feather="log-out" class="dropdown-icon"></i>
                                Cerrar sesión
                            </button>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </header>

    <div class="flex flex-1">
        <!-- Sidebar (siempre visible a la izquierda) -->
        <aside id="sidebar" class="bg-gray-100 text-gray-700 flex-shrink-0 border-r border-gray-200">
            <div class="h-full py-8 px-4 space-y-6">
                <!-- Sidebar Menú estilo árbol -->
                <nav>
                    <div class="mb-4">
                        <a href="#dashboard" 
                        class="block py-2 px-3 rounded-md w-full text-left text-sm flex items-center 
                                {{ request()->is('dashboard') ? 'bg-gray-200' : 'hover:bg-gray-200' }}">
                            <i data-feather="home" class="mr-2" style="width: 16px; height: 16px;"></i>Dashboard
                        </a>
                    </div>

                    <div class="mb-4">
                        <a href="{{ route('collections.index') }}" 
                        class="block py-2 px-3 rounded-md w-full text-left text-sm flex items-center 
                                {{ request()->routeIs('collections.index') ? 'bg-gray-200' : 'hover:bg-gray-200' }}">
                            <i data-feather="bookmark" class="mr-2" style="width: 16px; height: 16px;"></i>Colecciones
                        </a>
                    </div>

                    <div class="mb-4">
                        <a href="{{ route('fields.index') }}" 
                        class="block py-2 px-3 rounded-md w-full text-left text-sm flex items-center 
                                {{ request()->routeIs('fields.index') ? 'bg-gray-200' : 'hover:bg-gray-200' }}">
                            <i data-feather="grid" class="mr-2" style="width: 16px; height: 16px;"></i>Gestor de campos
                        </a>
                    </div>                    
                    
                </nav>

            </div>
        </aside>

        <!-- Main Content Area -->
        <main id="main-content" class="flex-1 bg-white">
            <!-- Notificaciones/Alertas -->
            @if(session('success'))
                <x-notification
                    type="success"
                    title="¡Éxito!"
                    message="{{ session('success') }}"
                    dismissible="true"
                    titleFontSize="text-xl"
                    bodyFontSize="text-base"
                    footerFontSize=""
                    footer=""
                />                
            @endif

            @if(session('error'))
                <x-notification
                    type="error"
                    title="Error"
                    message="{{ session('status') }}"
                    dismissible="true"
                    titleFontSize="text-xl"
                    bodyFontSize="text-base"
                    footerFontSize=""
                    footer=""
                />            
            @endif

            <!-- Content -->
            <div class="content-container">
                @yield('content')
            </div>
            
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-3 text-center text-xs">
        <div class="max-w-7xl mx-auto px-4">
            <p>&copy; {{ date('Y') }} Tamarindo. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Cargar iconos de Feather -->
    <script>
        feather.replace();
    </script>
</body>
</html>
