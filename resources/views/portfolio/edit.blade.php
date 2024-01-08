<x-app-layout>
    <div class="container mx-auto px-4 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-16">
        <x-breadcrumb />
        <div class="py-4 pb-8">
            <a href="{{ route('portfolio.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">Upload <i class="fa fa-upload"></i></a>
        </div>
        <div class="w-100">
            <div class="popular-photos">
                @if ($images->isNotEmpty())
                <div class="mb-4">
                    <button type="button" onclick="selectAll()" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Select All</button>
                    <button type="button" onclick="unselectAll()" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Unselect All</button>
                    <button type="submit" onclick="return confirm('Are you sure you want to delete the selected photos?')" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">Delete Selected</button>
                </div>
            @endif
                <form method="POST" action="{{ route('portfolio.massDelete') }}">
                    @csrf
                    @method('DELETE')
                    <div class="grid">
                        @foreach($images as $image)
                            <div class="grid-item relative group {{ $image->category }} w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 px-4 mb-8">
                                <div class="bg-white shadow rounded-lg overflow-hidden">
                                    <label class="flex items-center space-x-3 p-2">
                                        <input type="checkbox" name="delete[]" value="{{ $image->id }}" class="form-checkbox h-5 w-5 photo-checkbox">
                                        <span class="text-gray-900 font-medium">Select</span>
                                    </label>
                                    <img src="{{ asset('storage/' . $image->directory . '/' . $image->fileName) }}" data-src="{{ asset('storage/' . $image->directory . '/' . $image->fileName) }}" class="hover:opacity-75 transition ease-in-out duration-150 caesar-lightbox">
                                    <i class="fas fa-search absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-white text-3xl opacity-0 transition duration-500 group-hover:opacity-100 pointer-events-none"></i>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function selectAll() {
        let checkboxes = document.querySelectorAll('.photo-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = true);
    }

    function unselectAll() {
        let checkboxes = document.querySelectorAll('.photo-checkbox');
        checkboxes.forEach(checkbox => checkbox.checked = false);
    }
</script>