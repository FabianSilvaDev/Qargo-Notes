<aside class="w-64 bg-white shadow-md p-6 flex flex-col h-screen fixed z-50">
    <h2 class="text-xl font-bold mb-6">Qargo Notes</h2>

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