<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisemart - Tu Tienda Online</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>

    <div class="bg-blue-500 text-white">
        <div class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <h1 class="text-2xl font-bold">
                        <a href="/" class="hover:text-blue-200">Wisemart <span class="text-yellow-500 text-2xl font-bold">*</span></a>
                    </h1>
                </div>
                <div class="relative">
                    <button class=" px-4 py-2 rounded focus:outline-none" type="button" id="dropdownMenuButton"
                        onclick="toggleDropdown()">
                        Categorías
                        <span class="ml-2">▼</span>
                    </button>
                    <div id="categoryDropdown" class="hidden absolute z-10 mt-2 w-48 bg-white rounded-md shadow-lg">
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Electrónicos</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Hogar y Jardín</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Ropa y Accesorios</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Deportes</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Libros</a>
                        <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Juguetes</a>
                    </div>
                </div>

                <script>
                    function toggleDropdown() {
                        const dropdown = document.getElementById('categoryDropdown');
                        dropdown.classList.toggle('hidden');
                    }

                    // Cerrar el dropdown cuando se hace clic fuera
                    window.onclick = function (event) {
                        if (!event.target.matches('#dropdownMenuButton')) {
                            const dropdowns = document.getElementById('categoryDropdown');
                            if (!dropdowns.classList.contains('hidden')) {
                                dropdowns.classList.add('hidden');
                            }
                        }
                    }
                </script>
                <div class="flex items-center">
                    <div class="flex">
                        <input type="text" placeholder="Buscar en Wisemart"
                            class="w-96 px-4 py-2 border border-gray-300 rounded-l text-black bg-white focus:outline-none focus:border-blue-500">
                        <button class="px-6 py-2 bg-blue-600 text-white rounded-r hover:bg-blue-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Login</button>
                    <div class="relative">
                        <a href="{{ route('cart.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span
                                class="absolute -top-2 -right-2 bg-yellow-400 text-black text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center">
                                {{ Auth::check() ? Auth::user()->cart->details->count() : 0 }}
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @yield('content')

    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        footer {
            margin-top: auto;
        }
    </style>
    
    <footer class="bg-gray-100 py-4 mt-8">
        <div class="container mx-auto px-4">
            <div class="text-center text-gray-600 text-sm">
                <p>&copy; 2024 Wisemart. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
</body>

</html>