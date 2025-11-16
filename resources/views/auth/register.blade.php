<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Qargo Notes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen w-full bg-[#FCFBF6]">

    <!-- Imagen lateral -->
    <div class="w-1/2 h-screen hidden md:block bg-[url('/coffe.png')] bg-no-repeat bg-cover bg-center"></div>

    <!-- Formulario -->
    <form method="POST" action="{{ route('register.perform') }}"
        class="py-10 px-8 md:px-20 lg:px-40 rounded w-full md:w-1/2 flex flex-col space-y-6">
        @csrf

        <article class="flex items-center gap-4">
            <x-heroicon-o-cursor-arrow-rays class="w-10 h-10 text-[#7B542F]" />
            <h2 class="text-3xl font-bold capitalize text-gray-800">Create your account</h2>
        </article>

        <p class="text-gray-500 italic">
            Start brewing ideas with Qargo Notes ☕
        </p>

        {{-- Nombre --}}
        <div class="flex flex-col space-y-2">
            <label for="name" class="text-gray-700 font-medium">Full Name</label>
            <input type="text" id="name" name="name" placeholder="John Doe"
                class="border border-gray-300 focus:border-[#7A4709] focus:ring-[#7A4709] p-2 rounded-md outline-none transition"
                required>

            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- Email --}}
        <div class="flex flex-col space-y-2">
            <label for="email" class="text-gray-700 font-medium">Email address</label>
            <input type="email" id="email" name="email" placeholder="example@qargocoffee.com"
                class="border border-gray-300 focus:border-[#7A4709] focus:ring-[#7A4709] p-2 rounded-md outline-none transition"
                required>

            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- Password --}}
        <div class="flex flex-col space-y-2">
            <label for="password" class="text-gray-700 font-medium">Password</label>
            <input type="password" id="password" name="password" placeholder="••••••••"
                class="border border-gray-300 focus:border-[#7A4709] focus:ring-[#7A4709] p-2 rounded-md outline-none transition"
                required>

            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- Button --}}
        <button type="submit" class="bg-[#003465] text-white font-semibold py-2 rounded-xl hover:opacity-90 transition">
            Create Account
        </button>

        {{-- Link al login --}}
        <p class="text-center text-sm text-gray-500">
            Already have an account?
            <a href="{{ route('login') }}" class="text-[#7A4709] font-semibold hover:underline">Log in</a>
        </p>

        <p class="text-center text-sm text-gray-400 mt-2">
            © 2025 Qargo Coffee — brewed with passion ☕
        </p>
    </form>

</body>

</html>
