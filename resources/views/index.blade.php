<x-app-layout>
    <div class="relative bg-cover bg-center text-white" style="background-image: url({{ asset('img/home.jpg') }}); height: 100vh;">
        <div class="absolute inset-0 bg-black bg-opacity-20"></div>
        <div class="relative w-full flex flex-col h-screen items-center justify-center">
            <div class="mt-4 content-center">
                <p class=" text-5xl sm:text-7xl xl:text-9xl text-center">Landscape & Portrait </br> Photography</p>
            </div>
            <div class="mt-48 text-2xl xl:text-4xl">
                <a href="{{ route('Contact')}}" class="bg-red-600 hover:bg-red-800 text-white font-bold py-4 px-8 rounded-full">
                    Work With Me
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
