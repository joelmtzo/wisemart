@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 py-5">
    <div class="flex flex-col md:flex-row gap-6">
        <!-- Columna izquierda - Formulario de información -->
        <div class="md:w-2/3">
            <div class="bg-white rounded-lg shadow-sm mb-4">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-4">Información de Envío</h3>

                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif
                    
                    <form action="{{ route('checkout.saveShipping') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4 w-full">
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre Completo</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" id="name" name="name" value="{{ $user->name }}" required>
                            @error('name')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4 w-full">
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('phone') border-red-500 @enderror" id="phone" name="phone" value="{{ $user->phone }}" required>
                            @error('phone')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="address_line1" class="block text-sm font-medium text-gray-700 mb-1">Dirección Línea 1</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('address_line1') border-red-500 @enderror" id="address_line1" name="address_line1" value="{{ $user->address_line1 }}" required>
                            @error('address_line1')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="address_line2" class="block text-sm font-medium text-gray-700 mb-1">Dirección Línea 2 (Opcional)</label>
                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('address_line2') border-red-500 @enderror" id="address_line2" name="address_line2" value="{{ $user->address_line2 }}">
                            @error('address_line2')
                                <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid md:grid-cols-3 gap-4">
                            <div class="mb-4">
                                <label for="city" class="block text-sm font-medium text-gray-700 mb-1">Ciudad</label>
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('city') border-red-500 @enderror" id="city" name="city" value="{{ $user->city }}" required>
                                @error('city')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="state" class="block text-sm font-medium text-gray-700 mb-1">Estado</label>
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('state') border-red-500 @enderror" id="state" name="state" value="{{ $user->state }}" required>
                                @error('state')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="zipcode" class="block text-sm font-medium text-gray-700 mb-1">Código Postal</label>
                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('zipcode') border-red-500 @enderror" id="zipcode" name="zipcode" value="{{ $user->zipcode }}" required>
                                @error('zipcode')
                                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-200">Guardar Información de Envío</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Columna derecha - Resumen del pedido -->
        <div class="md:w-1/3">
            <!-- Resumen de items -->
            <div class="bg-white rounded-lg shadow-sm mb-4">
                <div class="p-6">
                    <h4 class="text-lg font-semibold mb-3">Carrito de compras</h4>
                    @foreach($cart->details as $detail)
                        <div class="flex justify-between items-center mb-2">
                            <div>
                                <h6 class="font-medium">{{ $detail->product->name }}</h6>
                                <span class="text-sm text-gray-500">Cantidad: {{ $detail->quantity }}</span>
                            </div>
                            <span>${{ number_format($detail->subtotal, 2) }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Resumen del pedido -->
            <div class="bg-white rounded-lg shadow-sm">
                <div class="p-6">
                    <h4 class="text-lg font-semibold mb-3">Resumen del Pedido</h4>
                    
                    <div class="flex justify-between mb-2">
                        <span>Subtotal</span>
                        <span>${{ number_format($cart->total, 2) }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Envío</span>
                        <span>Gratis</span>
                    </div>
                    <hr class="my-3">
                    <div class="flex justify-between mb-4">
                        <span class="font-semibold">Total</span>
                        <span class="font-semibold">${{ number_format($cart->total, 2) }}</span>
                    </div>

                    <form action="{{ route('checkout.process') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 transition duration-200">Proceder al Pago</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
