<x-guest-layout>
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-orange-600 mb-4">Iniciar sesión</h1>
        <p class="text-sm text-gray-700">Ingresa tus credenciales para continuar</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div class="mb-6">
            <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
            <input id="email" name="email" value="{{ old('email') }}" type="email" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500" autocomplete="off" required autofocus>
            @error('email')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-6">
            <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
            <input id="password" name="password" type="password" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-orange-500 focus:border-orange-500" required>
            @error('password')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- reCaptcha centrado -->
        <div class="flex justify-center mb-6">
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display() !!}
        </div>

        <!-- Mensaje de error de reCaptcha debajo -->
        <div class="text-center mb-4">
            @error('g-recaptcha-response')
                <p class="text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Botón de Login -->
        <div>
            <button type="submit" class="w-full bg-orange-600 text-white px-4 py-2 rounded-md hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-orange-500">
                Iniciar sesión
            </button>
        </div>
    </form>

    <p class="mt-6 text-center text-gray-600">¿No tienes una cuenta? 
        <a href="{{ route('register') }}" class="text-orange-600 hover:text-orange-500">Regístrate aquí</a>.
    </p>
</x-guest-layout>
