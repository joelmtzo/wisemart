@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-4">
        <div class="flex gap-12">
            <div class="w-1/4">
                <h1 class="text-2xl font-bold">Filtros</h1>
                <div class="space-y-4 mt-6">
                    <!-- Filtro de Categoría -->
                    <div class="border rounded">
                        <button class="w-full px-4 py-2 text-left bg-gray-100 hover:bg-gray-200 focus:outline-none"
                            onclick="toggleCollapse('categoryFilter')">
                            Categoria
                            <span class="float-right">+</span>
                        </button>
                        <div id="categoryFilter" class="hidden p-4">
                            <div class="space-y-2">
                                @foreach($categories as $category)
                                    <div class="flex items-center">
                                        <input type="checkbox" id="cat{{$category->id}}" class="mr-2">
                                        <label for="cat{{$category->id}}">{{$category->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <!-- Filtro de Marca -->
                    <div class="border rounded">
                        <button class="w-full px-4 py-2 text-left bg-gray-100 hover:bg-gray-200 focus:outline-none"
                            onclick="toggleCollapse('brandFilter')">
                            Marca
                            <span class="float-right">+</span>
                        </button>
                        <div id="brandFilter" class="hidden p-4">
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <input type="checkbox" id="brand1" class="mr-2">
                                    <label for="brand1">Samsung</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="brand2" class="mr-2">
                                    <label for="brand2">Apple</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="checkbox" id="brand3" class="mr-2">
                                    <label for="brand3">LG</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function toggleCollapse(id) {
                        const element = document.getElementById(id);
                        const button = element.previousElementSibling;
                        const span = button.querySelector('span');

                        if (element.classList.contains('hidden')) {
                            element.classList.remove('hidden');
                            span.textContent = '-';
                        } else {
                            element.classList.add('hidden');
                            span.textContent = '+';
                        }
                    }
                </script>
            </div>
            <div class="w-3/4">
                <h1 class="text-2xl font-bold">Productos</h1>
                <div class="grid grid-cols-4 mt-6">
                    @foreach ($products as $product)
                        <div class="bg-white p-4 rounded-lg">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded w-full mb-2 hover:bg-blue-600">
                                + Agregar
                            </button>
                            <p class="text-green-600 font-bold text-xl">$ {{ $product->price }}</p>
                            <p class="text-gray-600 text-sm">{{ $product->brand }}</p>
                            <h3 class="text-gray-800 font-medium">
                                <a href="{{ route('product.show', $product->id) }}"
                                    class="hover:text-blue-600">{{ $product->name }}</a>
                            </h3>
                        </div>
                    @endforeach
                </div>

                {{  $products->links() }}

                {{-- <!-- Paginación -->
                <div class="flex justify-center mt-6">
                    <div class="flex space-x-1">
                        <a href="#" class="px-4 py-2 border rounded hover:bg-gray-100">1</a>
                        <a href="#" class="px-4 py-2 border rounded hover:bg-gray-100">2</a>
                        <a href="#" class="px-4 py-2 border rounded hover:bg-gray-100">3</a>
                        <a href="#" class="px-4 py-2 border rounded hover:bg-gray-100">4</a>
                        <a href="#" class="px-4 py-2 border rounded hover:bg-gray-100">5</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

@endsection