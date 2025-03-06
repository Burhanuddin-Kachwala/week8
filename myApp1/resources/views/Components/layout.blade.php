<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Application</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>

    <!-- from node_modules -->
    <script src="node_modules/@material-tailwind/html/scripts/collapse.js"></script>
    <!-- from cdn -->
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/collapse.js"></script>
    @vite(['resources/css/app.css'])
</head>

<body>
    <nav class="block w-full px-4 py-2 text-white bg-slate-900 shadow-md  lg:px-8 lg:py-3">
        <div class="flex flex-wrap items-center justify-between mx-auto text-gray-100">
            <div>
                <x-nav-links href="/" :active="request()->is('/')">Home</x-nav-link>
                <x-nav-links href="/jobs" :active="request()->is('jobs')">Jobs</x-nav-link>
                <x-nav-links href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
            </div>

            <div class="hidden lg:block">
                <div class="flex flex-col gap-2 mt-2 mb-4 lg:mb-0 lg:mt-0 lg:flex-row lg:items-center lg:gap-6">
                    @guest
                        <x-nav-links href="/login" :active="request()->is('login')">Login</x-nav-link>
                        <x-nav-links href="/register" :active="request()->is('register')">Register</x-nav-link>
                     @endguest
                     @auth
                     <form method="POST" action="/logout">
                        @csrf
                        <x-form-button>Log Out</x-form-button>
                     </form>
             @endauth

                </div>
            </div>
            <button
                class="relative ml-auto h-6 max-h-[40px] w-6 max-w-[40px] select-none rounded-lg text-center align-middle text-xs font-medium uppercase text-inherit transition-all hover:bg-transparent focus:bg-transparent active:bg-transparent disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:hidden"
                type="button">
                <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </span>
            </button>
        </div>
    </nav>

    <header class=" text-gray-800 py-4 px-6 shadow-md">

        <h1 class="text-2xl font-bold">{{ $heading }}</h1>

    </header>
    <div class="mx-4 my-6">

        {{$slot}}
    </div>


</body>

</html>