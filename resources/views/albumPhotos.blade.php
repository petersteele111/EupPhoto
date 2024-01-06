<x-app-layout>
    <div class="relative text-center">
        <img class="w-full h-64 object-cover mt-4 p-4" src="{{ asset('storage/' . $album->cover_image) }}" alt="Album Cover Image">
        <div class="absolute top-0 left-0 w-full h-64 bg-black bg-opacity-50 flex flex-col items-center justify-center p-4">
            <h1 class="text-4xl font-bold text-white">Album - {{ $album->title }}</h1>
            <p class="text-white text-xl">{{$album->description}}</p>
        </div>
    </div>
    <div class="flex flex-wrap justify-around p-4">
        @forelse ($album->photos as $photo)
            <div class="m-2 bg-white overflow-hidden shadow-lg rounded-lg max-w-xs flex-shrink-0 transform transition duration-500 hover:scale-105 relative group">
                <a href="{{ asset('storage/' . $photo->directory . '/' . $photo->fileName) }}" class="block relative h-64 overflow-hidden">
                    <img src="{{ asset('storage/' . $photo->thumbnail) }}" data-src="{{ asset('storage/' . $photo->directory . '/' . $photo->fileName) }}" alt="{{ $photo->title }}" class="w-full h-full object-cover transition duration-500 ease-in-out transform hover:scale-105 caesar-lightbox">
                    <i class="fas fa-search absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-3xl opacity-0 transition duration-500 group-hover:opacity-100"></i>
                </a>
            </div>
        @empty
            <p class="text-4xl text-white">No photos in this album.</p>
        @endforelse
    </div>
</x-app-layout>