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
            transition: transform 0.3s ease, opacity 0.3s ease;
            width: 16rem;
            position: relative;
        }
        #sidebar.hidden {
            transform: translateX(-100%);
            opacity: 0;
        }
        #sidebar-button {
            position: absolute;
            top: 50%;
            right: -1.5rem;
            transform: translateY(-50%);
            background-color: #F97316;
            color: white;
            padding: 0.5rem;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: opacity 0.3s ease;
        }
        #sidebar-show-button {
            position: fixed;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            background-color: #F97316;
            color: white;
            padding: 0.5rem;
            border-radius: 0 0.375rem 0.375rem 0;
            cursor: pointer;
            display: none;
        }
        #sidebar.hidden + #sidebar-show-button {
            display: block;
        }
        #main-content {
            transition: none;
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
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
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
        /* Flecha solo para el nombre del usuario */
        .user-info span .user-dropdown-icon {
            margin-left: 0.5rem;
            font-size: 0.75rem;
        }
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background-color: white;
            color: black;
            border-radius: 0.375rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 150px;
            z-index: 10;
            font-size: 0.85rem;
        }
        .dropdown-menu a, .dropdown-menu form {
            display: block;
            padding: 0.5rem;
            text-align: left;
            color: black;
            text-decoration: none;
        }
        .dropdown-menu a:hover, .dropdown-menu form:hover {
            background-color: #f0f0f0;
        }
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
        .notification-popup {
            display: none;
            position: absolute;
            top: 60px;
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

        function toggleMenuVisibility() {
            const menu = document.getElementById('sidebar');
            const sidebarShowButton = document.getElementById('sidebar-show-button');

            menu.classList.toggle('hidden');
            sidebarShowButton.classList.toggle('hidden');
        }
    </script>
</head>
<body class="min-h-screen bg-white flex flex-col">

    <!-- Header -->
    <header class="header">
        <!-- Logo o Nombre de la Aplicación -->
        <div class="text-xl font-semibold">
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
                        <i data-feather="circle" class="notification-icon-status"></i> <!-- Ícono de no leído -->
                        <div class="notification-content">
                            <div class="notification-details">
                                <span class="notification-title">Nuevo mensaje</span>
                                <div class="notification-time">Recibido hace 5 horas</div>
                            </div>
                            <div class="notification-extra-info">No leído</div>
                        </div>
                    </li>
                    <li class="read-notification">
                        <i data-feather="check-circle" class="notification-icon-status"></i> <!-- Ícono de leído -->
                        <div class="notification-content">
                            <div class="notification-details">
                                <span class="notification-title">Recordatorio de suscripción</span>
                                <div class="notification-time">Recibido hace 2 días</div>
                            </div>
                            <div class="notification-extra-info">Leído</div>
                        </div>
                    </li>
                    <li class="read-notification">
                        <i data-feather="check-circle" class="notification-icon-status"></i> <!-- Ícono de leído -->
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

            <!-- Nombre del usuario en sesión con flecha -->
            <span id="user-dropdown-trigger">{{ Auth::user()->name }} 
                <i data-feather="chevron-down" class="user-dropdown-icon" style="width: 14px; height: 14px;"></i> <!-- Flecha solo en el nombre del usuario -->
            </span>

            <!-- Dropdown menú para perfil y logout -->
            <div id="user-dropdown" class="dropdown-menu">
                <a href="{{ route('profile.edit') }}">Perfil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
    </header>

    <div class="flex flex-1">
        <!-- Sidebar (siempre a la izquierda) -->
        <aside id="sidebar" class="bg-gray-100 text-gray-700 flex-shrink-0 border-r border-gray-200">
            <div class="h-full py-8 px-4 space-y-6">
                <!-- Botón para ocultar/mostrar menú alineado al borde derecho del menú -->
                <div id="sidebar-button" onclick="toggleMenuVisibility()" style="right: 0; position: absolute; top: 50%; transform: translateY(-50%);">
                    <i id="menu-toggle-icon" data-feather="chevron-left" style="width: 16px; height: 16px;"></i>
                </div>

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

        <!-- Botón flotante para mostrar el menú -->
        <div id="sidebar-show-button" class="hidden" onclick="toggleMenuVisibility()">
            <i data-feather="chevron-right" style="width: 16px; height: 16px;"></i>
        </div>

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
