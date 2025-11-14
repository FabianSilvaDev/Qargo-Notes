
<section class="ml-64  w-full">
    @include('ui.header.header')
    <div class=" max-w-[1300px] grid grid-cols-3 gap-3 p-10 justify-center h-auto">
        @include('components.tasks-pending')
        @include('components.tasks-inprogress')
        @include('components.tasks-complete')
    </div>
</section>