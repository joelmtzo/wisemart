@extends('layouts.app')

@section('content')

    <div class="container mx-auto px-4 py-8 max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Wisemart</h1>
            <h2 class="text-xl text-gray-600 mt-2">Iniciar sesión</h2>
        </div>

        <form method="POST" action="{{ route('login') }}" class="bg-white p-8 rounded-lg shadow">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                    Correo electrónico
                </label>
                <input type="email" name="email" id="email"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
                    value="{{ old('email') }}" required>
                @error('email')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                    Contraseña
                </label>
                <input type="password" name="password" id="password"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror"
                    required>
                @error('password')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Iniciar sesión
            </button>
        </form>

        <div class="mt-8">
            <div class="flex flex-col items-center gap-2 text-sm">
                <a href="{{ route('register') }}" class="text-blue-600 hover:text-blue-800">
                    ¿No tienes cuenta? Regístrate
                </a>
            </div>
        </div>
    </div>


@endsection