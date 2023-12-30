<x-app-layout>
    <div class="relative bg-cover bg-center text-white" style="background-image: url({{ asset('img/home_1920_min.jpg') }}); height: 100vh;">
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
                   
            {{-- Down arrow indicating more content below --}}
            <div class="flex justify-center mt-96">
                <a href="#next-section" class="scroll-link">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 animate-bounce text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    {{-- Section for recent work styled with Tailwind CSS --}}
    <div class="px-12 pt-16 w-100">
        <div class="popular-photos" id="next-section">
            <h2 class="uppercase tracking-wider text-white text-5xl text-center font-semibold">Recent Work</h2>
            <p class="text-white text-center text-xl my-12">Here are some of my recent shots that I have really enjoyed, I hope you do to!</p>
            <div class="grid">
                {{-- Future import images to this gallery and make it dynamic! --}}
                {{-- @foreach ($photos as $photo)
                    <div class="grid-item">
                        <a href="{{ route('Photo', $photo->id) }}">
                            <img src="{{ asset('storage/photos/' . $photo->image) }}" alt="Photo by {{ $photo->user->name }}" class="hover:opacity-75 transition ease-in-out duration-150">
                        </a>
                    </div>
                @endforeach --}}
                <div class="grid-item relative">
                    <a href="{{ asset('img/Abram Falls_small.jpg') }}" data-lightbox="main-gallery" data-title="Abram Falls - Cades Cove, Tennessee">
                        <img src="{{ asset('img/Abram Falls_small.jpg') }}" class="hover:opacity-75 transition ease-in-out duration-150">
                        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 hover:bg-opacity-50 opacity-0 hover:opacity-100 transition ease-in-out duration-150">
                            <i class="fas fa-plus text-white text-4xl"></i>
                        </div>
                    </a>
                </div>
                <div class="grid-item relative">
                    <a href="{{ asset('img/delilah_small.jpg') }}" data-lightbox="main-gallery" data-title="My Cat Delilah">
                        <img src="{{ asset('img/delilah_small.jpg') }}" class="hover:opacity-75 transition ease-in-out duration-150">
                        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 hover:bg-opacity-50 opacity-0 hover:opacity-100 transition ease-in-out duration-150">
                            <i class="fas fa-plus text-white text-4xl"></i>
                        </div>
                    </a>
                </div>
                <div class="grid-item relative">
                    <a href="{{ asset('img/kids-christmas_small.jpg') }}" data-lightbox="main-gallery" data-title="My caption">
                        <img src="{{ asset('img/kids-christmas_small.jpg') }}" class="hover:opacity-75 transition ease-in-out duration-150">
                        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 hover:bg-opacity-50 opacity-0 hover:opacity-100 transition ease-in-out duration-150">
                            <i class="fas fa-plus text-white text-4xl"></i>
                        </div>
                    </a>
                </div>
                <div class="grid-item relative">
                    <a href="{{ asset('img/pj-santa_small.jpg') }}" data-lightbox="main-gallery" data-title="My caption">
                        <img src="{{ asset('img/pj-santa_small.jpg') }}" class="hover:opacity-75 transition ease-in-out duration-150">
                        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 hover:bg-opacity-50 opacity-0 hover:opacity-100 transition ease-in-out duration-150">
                            <i class="fas fa-plus text-white text-4xl"></i>
                        </div>
                    </a>
                </div>
                <div class="grid-item relative">
                    <a href="{{ asset('img/reccenter_small.jpg') }}" data-lightbox="main-gallery" data-title="My caption">
                        <img src="{{ asset('img/reccenter_small.jpg') }}" class="hover:opacity-75 transition ease-in-out duration-150">
                        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 hover:bg-opacity-50 opacity-0 hover:opacity-100 transition ease-in-out duration-150">
                            <i class="fas fa-plus text-white text-4xl"></i>
                        </div>
                    </a>
                </div>
                <div class="grid-item relative">
                    <a href="{{ asset('img/Tahquamenon Falls FALL_small.jpg') }}" data-lightbox="main-gallery" data-title="My caption">
                        <img src="{{ asset('img/Tahquamenon Falls FALL_small.jpg') }}" class="hover:opacity-75 transition ease-in-out duration-150">
                        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 hover:bg-opacity-50 opacity-0 hover:opacity-100 transition ease-in-out duration-150">
                            <i class="fas fa-plus text-white text-4xl"></i>
                        </div>
                    </a>
                </div>
                <div class="grid-item relative">
                    <a href="{{ asset('img/Northern Lgihts 3_small.jpg') }}" data-lightbox="main-gallery" data-title="My caption">
                        <img src="{{ asset('img/Northern Lgihts 3_small.jpg') }}" class="hover:opacity-75 transition ease-in-out duration-150">
                        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 hover:bg-opacity-50 opacity-0 hover:opacity-100 transition ease-in-out duration-150">
                            <i class="fas fa-plus text-white text-4xl"></i>
                        </div>
                    </a>
                </div>
                <div class="grid-item relative">
                    <a href="{{ asset('img/Northern Lights 2_small.jpg') }}" data-lightbox="main-gallery" data-title="My caption">
                        <img src="{{ asset('img/Northern Lights 2_small.jpg') }}" class="hover:opacity-75 transition ease-in-out duration-150">
                        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 hover:bg-opacity-50 opacity-0 hover:opacity-100 transition ease-in-out duration-150">
                            <i class="fas fa-plus text-white text-4xl"></i>
                        </div>
                    </a>
                </div>
                <div class="grid-item relative">
                    <a href="{{ asset('img/Sophie_small.jpg') }}" data-lightbox="main-gallery" data-title="My caption">
                        <img src="{{ asset('img/Sophie_small.jpg') }}" class="hover:opacity-75 transition ease-in-out duration-150">
                        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 hover:bg-opacity-50 opacity-0 hover:opacity-100 transition ease-in-out duration-150">
                            <i class="fas fa-plus text-white text-4xl"></i>
                        </div>
                    </a>
                </div>
                <div class="grid-item relative">
                    <a href="{{ asset('img/Smoky Mountains_small.jpg') }}" data-lightbox="main-gallery" data-title="My caption">
                        <img src="{{ asset('img/Smoky Mountains_small.jpg') }}" class="hover:opacity-75 transition ease-in-out duration-150">
                        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 hover:bg-opacity-50 opacity-0 hover:opacity-100 transition ease-in-out duration-150">
                            <i class="fas fa-plus text-white text-4xl"></i>
                        </div>
                    </a>
                </div>
                <div class="grid-item relative">
                    <a href="{{ asset('img/pj-wall_small.jpg') }}" data-lightbox="main-gallery" data-title="My caption">
                        <img src="{{ asset('img/pj-wall_small.jpg') }}" class="hover:opacity-75 transition ease-in-out duration-150">
                        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 hover:bg-opacity-50 opacity-0 hover:opacity-100 transition ease-in-out duration-150">
                            <i class="fas fa-plus text-white text-4xl"></i>
                        </div>
                    </a>
                </div>
                <div class="grid-item relative">
                    <a href="{{ asset('img/home_1920_min.jpg') }}" data-lightbox="main-gallery" data-title="My caption">
                        <img src="{{ asset('img/home_1920_min.jpg') }}" class="hover:opacity-75 transition ease-in-out duration-150">
                        <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-0 hover:bg-opacity-50 opacity-0 hover:opacity-100 transition ease-in-out duration-150">
                            <i class="fas fa-plus text-white text-4xl"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
