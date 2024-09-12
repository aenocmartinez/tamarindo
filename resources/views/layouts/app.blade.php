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

    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Custom CSS -->
    <style>
        #sidebar {
            width: 16rem;
            position: relative;
        }
        #main-content {
            display: flex;
            flex-direction: column;
            padding-left: 0;
        }
        .content-container {
            width: 100%;
            padding: 1rem;
            box-sizing: border-box;
        }

        /* Estilos para el header, dropdown y notificaciones */
        .header {
            background-color: #F97316;
            color: white;
            padding: 0.75rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header-logo {
            font-size: 1.25rem;
        }
        .user-info {
            display: flex;
            align-items: center;
            position: relative;
        }
        .user-info span {
            cursor: pointer;
            margin-left: 1rem;
            display: flex;
            align-items: center;
        }
        .user-info span .user-dropdown-icon {
            margin-left: 0.5rem;
            font-size: 0.75rem;
        }

        /* Dropdown mejorado */
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background-color: white;
            color: black;
            border-radius: 0.375rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 200px;
            z-index: 10;
            font-size: 0.825rem;
        }

        .dropdown-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 1rem;
            background-color: #f8f8f8;
            border-bottom: 1px solid #e5e7eb;
        }

        .dropdown-header i {
            margin-bottom: 0.5rem;
        }

        .dropdown-header .font-normal {
            font-size: 0.925rem;
            color: #4a5568;
        }

        .dropdown-header .text-gray-500 {
            color: #6b7280;
            font-size: 0.75rem;
        }

        .dropdown-body {
            padding: 0.5rem 0;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            padding: 0.65rem 0.85rem;
            text-align: left;
            color: #4a5568;
            text-decoration: none;
            font-size: 0.8rem;
        }

        .dropdown-item button {
            background: none;
            border: none;
            display: flex;
            align-items: center;
            padding: 0;
            margin: 0;
            color: #4a5568;
            font-size: inherit;
            cursor: pointer;
            width: 100%;
        }

        .dropdown-item:hover {
            background-color: #f0f0f0;
        }

        .dropdown-icon {
            margin-right: 0.65rem;
            width: 14px;
            height: 14px;
            color: #4a5568;
        }

        .circular-avatar {
            width: 48px;
            height: 48px;
            background-color: #f88a42;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            font-size: 1.25rem;
        }

        /* Notificaciones */
        .notification-icon {
            position: relative;
            cursor: pointer;
            margin-right: 1rem;
        }
        .notification-count {
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 0.1rem 0.4rem;
            font-size: 0.65rem;
            position: absolute;
            top: -6px;
            right: -6px;
        }

        /* Popup de notificaciones */
        .notification-popup {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background-color: white;
            border-radius: 0.375rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            z-index: 11;
            padding: 1rem;
            font-size: 0.75rem;
        }
        .notification-popup ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        .notification-popup ul li {
            padding: 0.75rem;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            justify-content: space-between;
        }
        .notification-popup ul li:last-child {
            border-bottom: none;
        }
        .notification-popup ul li:hover {
            background-color: #f8f8f8;
        }
        .notification-title {
            font-weight: normal;
            text-align: left;
            flex-grow: 1;
        }
        .notification-time {
            font-size: 0.7rem;
            color: gray;
            margin-top: 0.2rem;
            text-align: left;
        }
        .unread-notification {
            color: #1f2937;
        }
        .read-notification {
            color: #9ca3af;
        }
        .notification-icon-status {
            margin-right: 0.5rem;
            width: 14px;
            height: 14px;
        }
        .unread-notification .notification-icon-status {
            color: #F97316;
        }
        .read-notification .notification-icon-status {
            color: #28a745;
        }
        .notification-extra-info {
            font-size: 0.65rem;
            text-align: right;
            margin-left: auto;
        }
        .notification-content {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
        .notification-details {
            text-align: left;
        }
    </style>

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
                    <div class="circular-avatar">
                        <i data-feather="user" style="width: 24px; height: 24px;"></i>
                    </div>
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
                            <span class="font-normal">{{ Auth::user()->name }}</span>
                            <div class="text-xs text-gray-500">{{ Auth::user()->role->name ?? 'Ejemplo de Rol' }}</div>
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
                        <button onclick="toggleSubmenu('dashboardSubmenu')" class="block py-2 px-3 hover:bg-gray-200 rounded-md w-full text-left text-sm flex items-center">
                            <i data-feather="home" class="mr-2" style="width: 16px; height: 16px;"></i>Dashboard
                        </button>
                        <ul id="dashboardSubmenu" class="ml-6 mt-2 hidden">
                            <li><a href="#" class="block py-1 px-3 hover:bg-gray-200 rounded-md text-sm">Vista General</a></li>
                            <li><a href="#" class="block py-1 px-3 hover:bg-gray-200 rounded-md text-sm">Estadísticas</a></li>
                        </ul>
                    </div>

                    <div class="mb-4">
                        <button onclick="toggleSubmenu('profileSubmenu')" class="block py-2 px-3 hover:bg-gray-200 rounded-md w-full text-left text-sm flex items-center">
                            <i data-feather="settings" class="mr-2" style="width: 16px; height: 16px;"></i>Perfil
                        </button>
                        <ul id="profileSubmenu" class="ml-6 mt-2 hidden">
                            <li><a href="{{ route('profile.edit') }}" class="block py-1 px-3 hover:bg-gray-200 rounded-md text-sm">Editar Perfil</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main id="main-content" class="flex-1 bg-white">
            <!-- Notificaciones/Alertas -->
            @if(session('status'))
                <div class="bg-orange-100 border border-orange-400 text-orange-700 px-4 py-2 rounded mb-4 text-sm" role="alert">
                    {{ session('status') }}
                </div>
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
