<x-app-layout>
    @if (Route::has('login'))
    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
        @guest
            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
            @endif
        @endauth
    </div>
    @endif
    <div class="relative bg-cover bg-center text-white" style="background-image: url({{ asset('img/home.jpg') }}); height: 100vh;">
        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
        <div class="relative w-full flex flex-col h-screen items-center justify-center">
            <div class="mt-4 content-center">
                <p class=" text-5xl sm:text-7xl xl:text-9xl">Landscape & Portrait </br> Photography</p>
            </div>
            <div class="mt-48 text-2xl xl:text-4xl">
                <a href="#contact" class="bg-red-600 hover:bg-red-800 text-white font-bold py-4 px-8 rounded-full">
                    Work With Me
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
