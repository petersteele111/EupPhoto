<x-app-layout>
    <div class="px-2 pt-16 w-100">
        <div class="popular-photos" id="next-section">
            <h2 class="uppercase tracking-wider text-white text-5xl text-center font-semibold">Portfolio</h2>
            <p class="text-white text-center text-xl my-12">Here are some of my favorite shots, I hope you enjoy!</p>
            <div class="flex flex-col md:flex-row justify-center space-y-4 md:space-y-0 mb-8">
                <button class="text-white text-3xl bg-gray-800 px-4 py-2 rounded hover:bg-gray-700 mb-2 sm:mb-0 mx-2 mt-4" data-filter="*">Show All</button>
                @foreach($categories as $category)
                    @if(!empty($category->category))
                        <button class="text-white text-3xl bg-gray-800 px-4 py-2 rounded hover:bg-gray-700 mb-2 sm:mb-0 mx-2" data-filter=".{{ $category->category }}">{{ ucfirst($category->category) }}</button>
                    @endif
                @endforeach
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