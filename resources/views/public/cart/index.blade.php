@extends('layouts.app')

@section('content')

<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-8">Tu Carrito de Compras</h1>

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
    @if($cart && $cart->details->count() > 0)
        <div class="flex flex-col md:flex-row gap-8">
            <div class="md:w-3/4">
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Producto</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Precio</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cantidad</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subtotal</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($cart->details as $detail)
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $detail->product->name }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{ $detail->product->brand }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">${{ number_format($detail->price, 2) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form action="{{ route('cart.update', $detail->id) }}" method="POST" class="flex items-center">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" name="quantity" value="{{ $detail->quantity }}" min="1"
                                                class="w-20 rounded border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                            <button type="submit" class="ml-2 text-blue-600 hover:text-blue-800">
                                                Actualizar
                                            </button>
                                        </form>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">${{ number_format($detail->subtotal, 2) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form action="{{ route('cart.remove', $detail->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="md:w-1/4">
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-lg font-semibold mb-4">Resumen del Pedido</h2>
                    <div class="flex justify-between mb-2">
                        <span>Subtotal:</span>
                        <span>${{ number_format($cart->total, 2) }}</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span>Envío:</span>
                        <span>Gratis</span>
                    </div>
                    <hr class="my-4">
                    <div class="flex justify-between mb-4">
                        <span class="font-semibold">Total:</span>
                        <span class="font-semibold">${{ number_format($cart->total, 2) }}</span>
                    </div>
                    <button class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                        Proceder al Pago
                    </button>
                    <a href="{{ route('home') }}" class="mt-4 inline-block w-full bg-gray-400 text-white py-2 px-4 rounded hover:bg-gray-500 text-center">
                        Continuar Comprando
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-12">
            <h2 class="text-2xl font-semibold text-gray-600">Tu carrito está vacío</h2>
            <p class="mt-2 text-gray-500">¿Por qué no agregas algunos productos?</p>
            <a href="{{ route('home') }}" class="mt-4 inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                Continuar Comprando
            </a>
        </div>
    @endif
</div>


@endsection