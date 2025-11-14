<article class="bg-gray-100 p-2 flex flex-col  max-w-[390px] rounded-xl gap-3 h-fit relative z-1">
    <p class="flex gap-3 ml-2 py-2 px-4 rounded-xl capitalize text-[#CAAC00] font-medium bg-[#FEF9E0] w-fit">
        <x-heroicon-s-beaker class="w-6 h-6 text-[#CAAC00]" />
        in progress
    </p>
    @foreach ($tasks as $t)
        @if ($t['label'] === 'inprogress')
            <div class="max-w-[380px] w-full border rounded-xl bg-white p-4">
                <div class="flex items-center gap-4">
                    <span class="flex items-center justify-center rounded-full bg-blue-400 text-white p-2">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z">
                            </path>
                        </svg>
                    </span>
                    <p class="font-semibold text-gray-600">{{ $t['title'] }}</p>
                </div>

                <!-- Message -->
                <p class="mt-4 text-gray-600 text-sm truncate">
                    {{ $t['description'] }}
                </p>

                <!-- Actions -->
                <div class="mt-6 flex flex-row gap-2">
                    <button href="#"
                        class="block w-full text-center bg-blue-600 text-white font-semibold text-sm py-3 rounded-lg">
                        Finish
                    </button>
                    <button
                        class="block w-full text-center bg-gray-100 text-gray-600 font-semibold text-sm py-3 rounded-lg hover:bg-gray-200 transition">
                        delete
                    </button>
                </div>
            </div>
        @endif
    @endforeach
</article>