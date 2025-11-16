<div class="editTask-sidebar z-50 w-[200px] bg-[#242832] from-[#242832] to-[#251c28] rounded-xl flex-col gap-2 p-[15px_0] absolute top-10 right-2
    opacity-0 scale-95 transform transition-all duration-300 ease-out pointer-events-none">

    <!-- Primera lista -->
    <ul class="list-none flex flex-col gap-2.5 px-2.5 mb-2">
        <li
            class="edit-description flex items-center gap-2.5 px-1.5 py-1 rounded-md cursor-pointer transition-all duration-300 ease-out hover:bg-[#5353ff] hover:text-white active:scale-95">
            <x-heroicon-o-pencil class="w-5 h-5 text-[#7e8590] transition-all duration-300 ease-out" />
            <p class="font-semibold text-[#7e8590]">Edit</p>
        </li>

        <form action="{{ route('tasks.destroy', $t->id) }}" method="POST" class="delete-task-form">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="text-red-500 hover:text-red-700 font-semibold text-sm flex items-center gap-1 w-full">
                <x-heroicon-s-trash class="w-5 h-5" />
                Delete
            </button>
        </form>

        <li
            class="flex items-center gap-2.5 px-1.5 py-1 rounded-md cursor-pointer transition-all duration-300 ease-out hover:bg-[#383547d5] active:scale-95 text-[#bd89ff]">
            <x-heroicon-o-users class="w-5 h-5 text-[#bd89ff]" />
            <p class="font-semibold text-[#bd89ff]">Share</p>
        </li>
    </ul>

    <div class="border-t-[1.5px] border-[#42434a]"></div>

    <!-- Segunda lista -->
    <ul class="list-none flex flex-col gap-2.5 px-2.5">
        <li
            class="flex items-center gap-2.5 px-1.5 py-1 rounded-md cursor-pointer transition-all duration-300 ease-out hover:bg-[#5353ff] hover:text-white active:scale-95">
            <x-heroicon-o-archive-box-x-mark class="w-5 h-5 text-[#7e8590]" />
            <p class="font-semibold text-[#7e8590]">Cancel</p>
        </li>
    </ul>
</div>

<script>
(() => {
    document.querySelectorAll('.editTask-sidebar').forEach(sb => {
        sb.querySelectorAll('li').forEach(btn => {
            btn.addEventListener('click', () => {
                sb.classList.add('opacity-0', 'scale-95', 'pointer-events-none');
                sb.classList.remove('opacity-100', 'scale-100');
            });
        });
    });
})();
</script>
