<x-app-layout>
    <div class="container mx-auto px-4 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-16 p-6">
    <form method="POST" action="/photos/{{ $photo->id }}" class="max-w-xl mx-auto mt-10 p-6 text-gray-800 space-y-6">
        @method('PUT')
        @csrf

        <div>
            <label for="album_id" class="block text-2xl font-medium text-white">Album:</label>
            <select id="album_id" name="album_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @foreach ($albums as $album)
                    <option value="{{ $album->id }}" {{ $photo->album_id == $album->id ? 'selected' : '' }}>
                        {{ $album->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="title" class="block text-2xl font-medium text-white">Title:</label>
            <input type="text" id="title" name="title" value="{{ $photo->title }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>

        <div>
            <label for="caption" class="block text-2xl font-medium text-white">Caption:</label>
            <input type="text" id="caption" name="caption" value="{{ $photo->caption }}" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
        </div>

        <div>
            <label for="description" class="block text-2xl font-medium text-white">Description:</label>
            <textarea id="description" name="description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $photo->description }}</textarea>
        </div>

        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Update
        </button>
    </form>
    </div>
</x-app-layout>