<aside id="taskSidebar"
    class="w-64 bg-white shadow-md p-6 sm:fixed flex flex-col h-screen fixed top-0 left-0 transition-transform duration-300 z-50
           -translate-x-full sm:translate-x-0 sm:flex"
    :class="openSidebar ? 'translate-x-0' : '-translate-x-full'">


    <div class="flex items-center justify-between mb-6">
        <h2 class="sm:text-xl font-bold text-sm" >Qargo Notes</h2>
        <button @click="openSidebar = false" class="p-1 rounded hover:bg-gray-200 transition sm:hidden flex">
        <!-- Ícono de X (puedes usar heroicon o un svg propio) -->
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
             viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>

    </div>

    <nav class="flex flex-col gap-3">
        @include('ui.buttonAdd.button')
        <a href="#" class="flex items-center gap-3 px-4 py-2 rounded hover:bg-blue-100 transition capitalize">
            <x-heroicon-o-rectangle-group class="w-5 h-5 " />
            dashboard
        </a>
        <a href="#" class="flex items-center gap-3 px-4 py-2 rounded hover:bg-blue-100 transition capitalize">
            <x-heroicon-o-inbox-stack class="w-5 h-5 " />
            inbox
        </a>
        <a href="#" class="flex items-center gap-3 px-4 py-2 rounded hover:bg-blue-100 transition capitalize">
            <x-heroicon-o-clipboard-document class="w-5 h-5 " />
            files
        </a>
        <a href="#" class="flex items-center gap-3 px-4 py-2 rounded hover:bg-blue-100 transition capitalize">
            <x-heroicon-o-cog-6-tooth class="w-5 h-5" />
            Configuración
        </a>
    </nav> 

    <!-- Logout -->
    <div class="mt-auto">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="flex items-center gap-2 px-4 py-2 rounded hover:text-red-600 text-red-400 transition">
                <x-heroicon-o-arrow-left-on-rectangle class="w-5 h-5" />
                Logout
            </button>
        </form>
    </div>
</aside>