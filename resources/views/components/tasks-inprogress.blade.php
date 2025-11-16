<article class="bg-gray-100 p-2 flex flex-col  max-w-[390px] rounded-xl gap-3 h-fit relative z-1">
    <p class="flex gap-3 ml-2 py-2 px-4 rounded-xl capitalize text-[#CAAC00] font-medium bg-[#FEF9E0] w-fit">
        <x-heroicon-s-beaker class="w-6 h-6 text-[#CAAC00]" />
        in progress
    </p>
    @foreach ($tasks as $t)
        @if ($t['label'] === 'inprogress')
            <div class="task-div max-w-[380px] w-full border rounded-xl bg-white p-4 relative cursor-pointer hover:shadow-md transition ease-in-out"
                data-id="{{ $t->id }}">

                <div class="flex items-center gap-4 justify-between border-b border-gray-300 pb-2">
                    <h3 class="text-xl capitalize font-semibold text-gray-600">{{ $t->title }}</h3>
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
                    @if ($t->priority === 'High')
                        <x-heroicon-s-flag class="w-4 h-4 text-red-500" />
                    @elseif($t->priority === 'Medium')
                        <x-heroicon-s-flag class="w-4 h-4 text-yellow-500" />
                    @else
                        <x-heroicon-o-flag class="w-4 h-4 text-gray-400" />
                    @endif
                    <p class="font-medium text-sm text-gray-400">
                        {{ $t->priority }}
                    </p>
                </div>

                <p class="mt-2 text-sm text-gray-300 font-light">
                    {{ \Carbon\Carbon::parse($t->created_at)->locale('en')->translatedFormat('F dS Y') }}
                </p>

                <section class="flex w-full gap-2">
                    <form class="w-fit mt-6 flex flex-row gap-2" action="{{ route('tasks.complete', $t->id) }}" method="post">
                        @csrf
                        @method('patch')
                        <button
                            class="block w-fit text-center bg-gray-100 text-gray-600 font-semibold text-sm py-3 px-4 rounded-lg hover:bg-gray-200 transition">
                            completed task
                        </button>
                    </form>
                </section>
                @include('ui.editTask.editTask')
            </div>
        @endif
    @endforeach
</article>
@include('scripts.tasks')