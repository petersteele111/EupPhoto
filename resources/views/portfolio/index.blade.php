<x-app-layout>
    <div class="px-12 pt-16 w-100">
        <div class="popular-photos" id="next-section">
            <h2 class="uppercase tracking-wider text-white text-5xl text-center font-semibold">Portfolio</h2>
            <p class="text-white text-center text-xl my-12">Here are some of my favorite shots, I hope you enjoy!</p>
            <button class="text-white text-3xl" data-filter="*">Show All |</button>
            <button class="text-white text-3xl" data-filter=".landscape"> Landscapes |</button>
            <button class="text-white text-3xl" data-filter=".portrait"> Portraits</button>
            <div class="grid">
                @foreach($images as $image)
    <div class="grid-item relative group {{ $image->category }}">
        <img src="{{ asset('img/' . $image->fileName) }}" data-src="{{ asset('img/' . $image->fileName) }}" class="hover:opacity-75 transition ease-in-out duration-150 caesar-lightbox">
        <i class="fas fa-search absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-3xl opacity-0 transition duration-500 group-hover:opacity-100 pointer-events-none"></i>
    </div>
@endforeach
            </div>
        </div>
    </div>
</x-app-layout>