<header class="w-full py-2 flex flex-row px-10 justify-between items-center shadow-gray-200 shadow-sm">

    <section class="flex gap-7">
        <button class="tab-btn h-full flex gap-2 items-center text-gray-400 font-medium py-2 border-b-2 border-transparent">
            <x-heroicon-s-folder-arrow-down class="w-5 h-5" />
            Overview
        </button>

        <button class="tab-btn h-full flex gap-2 items-center border-b-2 border-transparent text-gray-400 font-normal py-2">
            <x-heroicon-s-list-bullet class="w-5 h-5" />
            List
        </button>

        <button class="tab-btn h-full flex gap-2 items-center border-b-2 border-[#6E47FF] text-[#6E47FF] font-normal py-2">
            <x-heroicon-o-view-columns class="w-5 h-5" />
            Board
        </button>

        <button class="tab-btn h-full flex gap-2 items-center border-b-2 border-transparent text-gray-400 font-normal py-2">
            <x-heroicon-o-calendar-days class="w-5 h-5" />
            Calendar
        </button>
    </section>

    <article class="flex gap-2 text-gray-400 font-normal items-center">
        <h2>Hello! {{ $userTask['name'] }}</h2>
        <x-heroicon-s-user-circle class="w-7 h-7" />
    </article>

</header>

<script>
    // Selecciona todos los botones con clase tab-btn
    const tabs = document.querySelectorAll('.tab-btn');

    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Remueve el estilo activo de todos
            tabs.forEach(t => {
                t.classList.remove('border-[#6E47FF]', 'text-[#6E47FF]', 'font-medium');
                t.classList.add('border-transparent', 'text-gray-400', 'font-normal');
            });

            // Aplica estilo activo al botón clickeado
            tab.classList.add('border-[#6E47FF]', 'text-[#6E47FF]', 'font-medium');
            tab.classList.remove('border-transparent', 'text-gray-400', 'font-normal');
        });
    });
</script>
