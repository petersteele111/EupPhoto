<x-app-layout>
    <div class="px-12 pt-16 w-100">
        <div class="popular-photos" id="next-section">
            <h2 class="uppercase tracking-wider text-white text-5xl text-center font-semibold">Portfolio</h2>
            <p class="text-white text-center text-xl my-12">Here are some of my favorite shots, I hope you enjoy!</p>
            <div class="flex justify-center space-x-4 mb-8">
                <button class="text-white text-3xl bg-gray-800 px-4 py-2 rounded hover:bg-gray-700" data-filter="*">Show All</button>
                <button class="text-white text-3xl bg-gray-800 px-4 py-2 rounded hover:bg-gray-700" data-filter=".landscape">Landscapes</button>
                <button class="text-white text-3xl bg-gray-800 px-4 py-2 rounded hover:bg-gray-700" data-filter=".portrait">Portraits</button>
                <button class="text-white text-3xl bg-gray-800 px-4 py-2 rounded hover:bg-gray-700" data-filter=".wildlife">Wildlife</button>
                <button class="text-white text-3xl bg-gray-800 px-4 py-2 rounded hover:bg-gray-700" data-filter=".macro">Macro</button>
                <button class="text-white text-3xl bg-gray-800 px-4 py-2 rounded hover:bg-gray-700" data-filter=".astrophotography">Astrophotography</button>
                <button class="text-white text-3xl bg-gray-800 px-4 py-2 rounded hover:bg-gray-700" data-filter=".architecture">Architecture</button>
                <button class="text-white text-3xl bg-gray-800 px-4 py-2 rounded hover:bg-gray-700" data-filter=".street">Street</button>
                <button class="text-white text-3xl bg-gray-800 px-4 py-2 rounded hover:bg-gray-700" data-filter=".pets">Pets</button>
            </div>
            <div class="grid">
                @foreach($images as $image)
                    <div class="grid-item relative group {{ $image->category }}">
                        <img src="{{ asset('storage/' . $image->directory . '/' . $image->fileName) }}" data-src="{{ asset('storage/' . $image->directory . '/' . $image->fileName) }}" class="hover:opacity-75 transition ease-in-out duration-150 caesar-lightbox">
                        <i class="fas fa-search absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-3xl opacity-0 transition duration-500 group-hover:opacity-100 pointer-events-none"></i>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>