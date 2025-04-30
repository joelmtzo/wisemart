@extends('layouts.app')

@section('content')

    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row gap-8">

            <!-- Menú lateral -->
            @include('public.user.sidebar')

            <!-- Contenido principal -->
            <div class="w-full md:w-3/4">
                <a href="{{ route('user.index') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded mb-3 inline-block">Regresar a la
                    lista de pedidos</a>
                <div class="bg-white shadow rounded-lg">
                    <div class="bg-gray-100 px-4 py-2 rounded-t-lg">
                        <h2 class="text-lg font-semibold">Detalle del Pedido #{{ $order->id }}</h2>
                    </div>
                    <div class="p-4">
                        <div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <p class="mb-2"><strong>Cliente:</strong> {{ $order->user->name }}</p>
                                    <p class="mb-2"><strong>Estatus:</strong> {{ $order->order_status }}</p>
                                    <p class="mb-2"><strong>Número de Rastreo:</strong> {{ $order->tracking_number ?? 'No disponible' }}</p>
                                </div>
                                <div>
                                    <p class="mb-2"><strong>Subtotal:</strong> ${{ number_format($order->subtotal, 2) }}</p>
                                    <p class="mb-2"><strong>Costo de Envío:</strong> ${{ number_format($order->shipping_cost, 2) }}</p>
                                    <p class="mb-4 font-bold"><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-lg font-semibold mb-2">Productos:</h6>
                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="border border-gray-300 px-4 py-2 text-left">Producto</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Cantidad</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Precio</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->details as $item)
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">{{ $item->product->name }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $item->quantity }}</td>
                                        <td class="border border-gray-300 px-4 py-2">${{ number_format($item->price, 2) }}</td>
                                        <td class="border border-gray-300 px-4 py-2">${{ number_format($item->quantity * $item->price, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4">
                            <p class="mb-2"><strong>Subtotal:</strong> ${{ number_format($order->subtotal, 2) }}</p>
                            <p class="mb-2"><strong>Costo de Envío:</strong> ${{ number_format($order->shipping_cost, 2) }}
                            </p>
                            <p class="mb-2 font-bold"><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection