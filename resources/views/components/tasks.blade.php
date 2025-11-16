<section class=" w-full">
    <div class=" max-w-[1300px] grid sm:grid-cols-3 grid-cols-1 gap-3 p-10 justify-center h-auto">
        @include('components.tasks-pending')
        @include('components.tasks-inprogress')
        @include('components.tasks-complete')
    </div>
</section>