<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <form action="{{ route('photos.store') }}" method="post" enctype="multipart/form-data" class="space-y-8 divide-y divide-gray-200">
            @csrf
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Upload Photos
                    </h3>
                </div>
                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="album" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Album
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <select id="album" name="album_id" class="form-control">
                                @foreach ($albums as $album)
                                    <option value="{{ $album->id }}">{{ $album->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                        <label for="photos" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                            Upload Photos
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="max-w-lg flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28.59 18.59L34.17 12H4a2 2 0 00-2 2v20a2 2 0 002 2h44a2 2 0 002-2V24l-7.59-7.59a1.996 1.996 0 00-2.828 0l-2.828 2.828-2.828-2.83z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="photos" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                            <span>Upload a file</span>
                                            <input id="photos" name="photos[]" type="file" class="sr-only" multiple>
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs text-gray-500">
                                        PNG, JPG, GIF up to 10MB
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-5">
                <div class="flex justify-end">
                    <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Upload
                    </button>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>