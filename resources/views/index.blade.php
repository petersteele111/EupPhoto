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
    <div class="relative h-screen bg-cover bg-center" style="background-image: url({{ asset('img/home.jpg') }});">
        <!-- Overlay with opacity -->
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    
        <!-- Content -->
        <div class="relative flex flex-col items-center justify-center h-full pt-20">
            <img src="{{ asset('img/logo.png') }}" alt="EUP Photography Logo" class="max-h-96 mb-4">
            <h1 class="text-7xl text-white font-bold p-4 text-center mx-4">Capturing Timeless Moments</h1>
            <p class="text-3xl text-white font-semibold mt-4 p-4 text-center mx-4">Specializing in Landscape and Portrait Photography</p>

        <!-- Button with a class for the hover effect -->
        <a href="{{ route('Contact') }}" class="cta-button mt-8 px-6 py-3 bg-white text-gray-800 font-semibold rounded-md shadow hover:bg-gray-100 transition ease-in-out duration-150">
            Book Your Session Now
        </a>

        </div>
    </div>
</x-app-layout>
