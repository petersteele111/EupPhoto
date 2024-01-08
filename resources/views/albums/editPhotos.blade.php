<x-app-layout>
    @if (session('success'))
        <div class="status-message bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-4/5 mx-auto mt-6" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    <div class="container mx-auto px-4 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-16">
        <x-breadcrumb />
        <div class="my-8">
            <a href="{{ route('photos.create', $album->id) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Upload <i class="fa fa-upload"></i></a>
        </div>
        <form method="POST" action="{{ route('photos.massDestroy') }}" id="photoForm">
            @csrf
            @if ($album->photos->isNotEmpty())
            <button type="button" onclick="selectAll()" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded mb-8">Select All</button>
            <button type="button" onclick="unselectAll()" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Unselect All</button>
            <button type="submit" onclick="return confirm('Are you sure you want to delete the selected photos?')" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Delete Selected</button>
            @endif
            <div class="flex flex-wrap -mx-4">
                @forelse ($photos as $photo)
                    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 px-4 mb-8">
                        <div class="bg-white shadow rounded-lg overflow-hidden">
                            <label class="flex items-center space-x-3 p-2">
                                <input type="checkbox" name="photos[]" value="{{ $photo->id }}" class="form-checkbox h-5 w-5 photo-checkbox">
                                <span class="text-gray-900 font-medium">Select</span>
                            </label>
                            <a href="{{ asset('storage/' . $photo->directory . '/' . $photo->fileName) }}">
                                <img src="{{ asset('storage/' . $photo->thumbnail) }}" data-src="{{ asset('storage/' . $photo->directory . '/' . $photo->fileName) }}" alt="{{ $photo->title }}" class="w-full h-64 object-cover caesar-lightbox">
                            </a>
                            <div class="p-6">
                                <h2 class="text-xl font-bold">{{ $photo->title }}</h2>
                                <div class="mt-4">
                                    <a href="{{ route('photos.edit', $photo->id) }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-white text-center text-4xl mx-auto pb-8">No Images Found</p>
                @endforelse
            </div>
        </form>
        <div class="my-8">
            {{ $photos->links() }}
        </div>
    </div>
</x-app-layout>

<script>
function deletePhoto(photoId) {
    if (confirm('Are you sure you want to delete this photo?')) {
        fetch(`{{ url('photos') }}/${photoId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }).then(() => {
            location.reload();
        });
    }
}

function selectAll() {
    let checkboxes = document.querySelectorAll('.photo-checkbox');
    checkboxes.forEach(checkbox => checkbox.checked = true);
}

function unselectAll() {
    let checkboxes = document.querySelectorAll('.photo-checkbox');
    checkboxes.forEach(checkbox => checkbox.checked = false);
}
</script>