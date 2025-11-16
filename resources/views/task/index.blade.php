<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qargo Notes</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0" </head>

<body class="font-[poppins]" x-data="{ openSidebar: false }">
    @yield('content')

    @include('components.task-form')
    <section class="flex w-full h-auto">
        @include('components.task-sidebar')
        <div class="flex flex-col w-full sm:ml-64 ">
            @include('ui.header.header')

            <div class="w-full px-5 sm:px-6 flex items-center sm:justify-center justify-between py-3">
                <input type="text" id="taskSearch" placeholder="Search tasks..."
                    class="w-fit sm:w-1/2 p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#7A4709]">
                    <div class="block sm:hidden">
                        @include('ui.buttonAdd.button')
                    </div>
            </div>

            @include('components.tasks')
        </div>
    </section>
    @yield('scripts')
    <script src="{{ asset('js/task.js') }}" defer></script>
</body>

</html>