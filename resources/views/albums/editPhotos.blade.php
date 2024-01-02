<x-app-layout>
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap -mx-4">
            @foreach ($album->photos as $photo)
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 px-4 mb-8">
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <img src="{{ asset('storage/' . $photo->directory . '/' . $photo->fileName) }}" alt="{{ $photo->title }}" class="w-full h-64 object-cover">
                        <div class="p-6">
                            <h2 class="text-2xl font-bold">{{ $photo->title }}</h2>
                            <div class="mt-4">
                                <a href="{{ route('photos.edit', $photo->id) }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Edit</a>
                                <form method="POST" action="{{ route('photos.destroy', $photo->id) }}" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to delete this photo?')" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>