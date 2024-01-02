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
            <div class="m-2 bg-white overflow-hidden shadow-lg rounded-lg max-w-xs flex-shrink-0">
                <a href="{{ asset('storage/' . $photo->directory . '/' . $photo->fileName) }}" data-lightbox="{{ $album->title }}" data-title="{{ $photo->title }}">
                    <img alt="Photo" class="object-cover w-full h-64" src="{{ asset('storage/' . $photo->directory . '/' . $photo->fileName) }}">
                </a>
            </div>
        @empty
            <p class="text-4xl text-white">No photos in this album.</p>
        @endforelse
    </div>
</x-app-layout>