<x-app-layout>
    <div class="container mx-auto px-4 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-16">
        <x-breadcrumb />
        <div class="flex flex-wrap -mx-4">
            @foreach ($albums as $album)
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 px-4 mb-8 mt-8">
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <a href="{{ route('albums.editPhotos', $album->id) }}">
                            <img src="{{ asset('storage/' . $album->cover_image) }}" alt="{{ $album->title }}" class="w-full h-64 object-cover">
                        </a>
                        <div class="p-6 text-center">
                            <h2 class="text-2xl font-bold">{{ $album->title }}</h2>
                            <div class="mt-4">
                                <a href="{{ route('albums.edit', $album->id) }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Edit</a>
                                <form method="POST" action="{{ route('albums.destroy', $album->id) }}" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this album?')" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>