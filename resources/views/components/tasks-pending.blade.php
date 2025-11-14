<article class="bg-gray-100 p-2 flex flex-col  max-w-[390px] rounded-xl gap-3 h-fit relative">
    <p class="flex gap-3 ml-2 py-2 px-4 w-[] rounded-xl capitalize text-gray-400 w-fit font-medium bg-gray-200">
        <x-heroicon-o-rectangle-stack class="w-6 h-6 text-gray-400" />
        pending tasks
    </p>
    @foreach ($tasks as $t)
        @if ($t['label'] === 'pending')
            <div class="task-div max-w-[380px] w-full border rounded-xl bg-white p-4 relative">

                <div class="flex items-center gap-4 justify-between">
                    <h3 class="text-xl capitalize font-semibold text-gray-600">{{ $t['title'] }}</h3>
                    <x-heroicon-o-ellipsis-horizontal
                        class="button-edit w-6 h-6 cursor-pointer hover:text-gray-600 text-gray-400 transition"
                        id="buttonEdit" />
                </div>

                <!-- Message -->
                <p class="mt-4 text-gray-600 text-sm truncate">
                    {{ $t['description'] }}b
                </p>

                <!-- Actions -->
                <section class="flex w-full gap-2">
                    <form class="w-full mt-6 flex flex-row gap-2" action="{{ route('tasks.start', $t['id']) }}" method="post">
                        @csrf
                        @method('patch')
                        <button href="#" type="submit"
                            class="block w-full text-center bg-blue-600 text-white font-semibold text-sm py-3 rounded-lg">
                            start taks
                        </button>

                    </form>
                    <form class="w-full mt-6 flex flex-row gap-2" action="{{ route('tasks.complete', $t['id']) }}" method="post">
                        @csrf
                        @method('patch')
                        <button
                            class="block w-full text-center bg-gray-100 text-gray-600 font-semibold text-sm py-3 rounded-lg hover:bg-gray-200 transition">
                            completed
                        </button>
                    </form>
                </section>
                @include('ui.editTask.editTask')
            </div>
        @endif
    @endforeach
</article>

<script>
    const buttonsEdit = document.querySelectorAll('.button-edit');

    buttonsEdit.forEach(button => {
        button.addEventListener('click', () => {

            const taskCard = button.closest('.task-div'); // ESTA task
            const sidebar = taskCard.querySelector('.editTask-sidebar'); // Sidebar de ESTA task

            // Alternar visibilidad
            sidebar.classList.toggle('opacity-0');
            sidebar.classList.toggle('scale-95');
            sidebar.classList.toggle('pointer-events-none');
            sidebar.classList.toggle('opacity-100');
            sidebar.classList.toggle('scale-100');
        });
    });

</script>

</script>