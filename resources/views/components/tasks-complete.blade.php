<article class="bg-gray-100 p-2 flex flex-col w-full max-w-[390px] rounded-xl gap-3 h-fit">
    <p class="flex gap-3 ml-2 py-2 px-4 rounded-xl w-fit  capitalize text-[#06AF53] font-medium bg-[#DDFEEE]">
        <x-heroicon-o-check-badge class="w-6 h-6 text-[#06AF53]" />
        complete task
    </p>
    @foreach ($tasks as $t)
        @if ($t['label'] === 'complete')
            <div class="task-div max-w-[380px] w-full border rounded-xl bg-white p-4 relative cursor-pointer hover:shadow-md transition ease-in-out"
                data-id="{{ $t->id }}">

                <div class="flex items-center gap-4 justify-between border-b border-gray-300 pb-2">
                    <h3 class="text-xl capitalize font-semibold text-gray-600">
                    {{ $t->title }}</h3>
                    <x-heroicon-o-ellipsis-horizontal
                        class="button-edit w-6 h-6 cursor-pointer hover:text-gray-600 text-gray-400 transition"
                        id="buttonEdit" />
                </div>

                <p class="description mt-4 text-gray-600 text-ms line-clamp-2 select-none">
                    {{ $t->description }}
                </p>

                <form class="update-form hidden" method="POST" action="{{ route('tasks.update', $t->id) }}">
                    @csrf
                    @method('PATCH')
                    <textarea name="description"
                        class="description-input hidden w-full mt-4 p-2 h-full rounded resize-none"></textarea>

                    <button type="submit" class="confirm-edit hidden mt-2 text-gray-200 hover:text-gray-400 transition">
                        <x-heroicon-s-check-circle class="w-7 h-7" />
                    </button>
                </form>

                <div class="flex items-center gap-2 mt-4">
                    <x-heroicon-o-check-badge class="w-6 h-6 text-green-400"/>
                    <p class="font-medium text-sm text-gray-400">
                        Task completed
                    </p>
                </div>

                <p class="mt-2 text-sm text-gray-300 font-light">
                    {{ \Carbon\Carbon::parse($t->created_at)->locale('en')->translatedFormat('F dS Y') }}
                </p>

                @include('ui.editTask.editTask')
            </div>
        @endif
    @endforeach
</article>

