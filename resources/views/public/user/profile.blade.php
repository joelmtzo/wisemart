@extends('layouts.app')

@section('content')

    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Menú lateral -->
            <div class="w-full md:w-1/4">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex flex-col items-center mb-6">
                        <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mb-4">
                            <span class="text-3xl text-gray-600">{{ substr($user->name, 0, 1) }}</span>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-800">{{ $user->name }}</h2>
                        <p class="text-gray-600">{{ $user->email }}</p>
                    </div>

                    <nav class="space-y-2">
                        <a href="{{ route('user.index') }}"
                            class="block w-full py-2 px-4 rounded bg-blue-600 text-white hover:bg-blue-700">
                            Mis Pedidos
                        </a>
                        <a href="{{ route('user.info') }}"
                            class="block w-full py-2 px-4 rounded text-gray-700 hover:bg-gray-100">
                            Mi información
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full py-2 px-4 rounded text-red-600 hover:bg-red-50 text-left">
                                Cerrar Sesión
                            </button>
                        </form>
                    </nav>
                </div>
            </div>

            <!-- Contenido principal -->
            <div class="w-full md:w-3/4">
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Editar Perfil</h2>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('user.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="space-y-4">
                            <div>
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">
                                    Nombre completo
                                </label>
                                <input type="text" name="name" id="name"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror"
                                    value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">
                                    Correo electrónico
                                </label>
                                <input type="email" name="email" id="email"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 bg-gray-100 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
                                    value="{{ $user->email }}" readonly>
                                @error('email')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">
                                    Teléfono
                                </label>
                                <input type="text" name="phone" id="phone"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('phone') border-red-500 @enderror"
                                    value="{{ old('phone', $user->phone) }}">
                                @error('phone')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <fieldset class="border border-gray-300 rounded-lg p-6 space-y-4">
                                <legend class="text-lg font-semibold text-gray-700 px-2">Información de Envío</legend>
                                <div>
                                    <label for="address_line1" class="block text-gray-700 text-sm font-bold mb-2">
                                        Dirección Línea 1
                                    </label>
                                    <input type="text" name="address_line1" id="address_line1"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('address_line1') border-red-500 @enderror"
                                        value="{{ old('address_line1', $user->address_line1) }}">
                                    @error('address_line1')
                                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="address_line2" class="block text-gray-700 text-sm font-bold mb-2">
                                        Dirección Línea 2 (Opcional)
                                    </label>
                                    <input type="text" name="address_line2" id="address_line2"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('address_line2') border-red-500 @enderror"
                                        value="{{ old('address_line2', $user->address_line2) }}">
                                    @error('address_line2')
                                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="city" class="block text-gray-700 text-sm font-bold mb-2">
                                            Ciudad
                                        </label>
                                        <input type="text" name="city" id="city"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('city') border-red-500 @enderror"
                                            value="{{ old('city', $user->city) }}">
                                        @error('city')
                                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="state" class="block text-gray-700 text-sm font-bold mb-2">
                                            Estado/Provincia
                                        </label>
                                        <input type="text" name="state" id="state"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('state') border-red-500 @enderror"
                                            value="{{ old('state', $user->state) }}">
                                        @error('state')
                                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <label for="zipcode" class="block text-gray-700 text-sm font-bold mb-2">
                                        Código Postal
                                    </label>
                                    <input type="text" name="zipcode" id="zipcode"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('zipcode') border-red-500 @enderror"
                                        value="{{ old('zipcode', $user->zipcode) }}">
                                    @error('zipcode')
                                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </fieldset>

                            <div class="flex justify-end">
                                <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                    Guardar cambios
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection