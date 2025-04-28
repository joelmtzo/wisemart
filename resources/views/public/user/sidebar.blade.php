<div class="w-full md:w-1/4">
    <div class="bg-white rounded-lg shadow p-6">
        <div class="flex flex-col items-center mb-6">
            <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mb-4">
                <span class="text-3xl text-gray-600">{{ substr(Auth::user()->name, 0, 1) }}</span>
            </div>
            <h2 class="text-xl font-semibold text-gray-800">{{ Auth::user()->name }}</h2>
            <p class="text-gray-600">{{ Auth::user()->email }}</p>
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
                <button type="submit" 
                    class="w-full py-2 px-4 rounded text-red-600 hover:bg-red-50 text-left">
                    Cerrar Sesión
                </button>
            </form>
        </nav>
    </div>
</div>