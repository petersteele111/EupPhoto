<x-app-layout>
    <div class="px-12 pt-16 w-100">
        <div class="popular-photos" id="next-section">
            <h2 class="uppercase tracking-wider text-white text-5xl text-center font-semibold">Portfolio</h2>
            <p class="text-white text-center text-xl my-12">Here are some of my favorite shots, I hope you enjoy!</p>
            <div class="grid">
                @foreach(['Abram Falls_small.jpg', 'delilah_small.jpg', 'kids-christmas_small.jpg', 'pj-santa_small.jpg', 'reccenter_small.jpg', 'Tahquamenon Falls FALL_small.jpg', 'Northern Lgihts 3_small.jpg', 'Northern Lights 2_small.jpg', 'Sophie_small.jpg', 'Smoky Mountains_small.jpg', 'pj-wall_small.jpg', 'home_1920_min.jpg'] as $image)
                    <div class="grid-item relative group">
                        <img src="{{ asset('img/' . $image) }}" data-src="{{ asset('img/' . $image) }}" class="hover:opacity-75 transition ease-in-out duration-150 caesar-lightbox">
                        <i class="fas fa-search absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-3xl opacity-0 transition duration-500 group-hover:opacity-100 pointer-events-none"></i>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>