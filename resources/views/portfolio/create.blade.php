<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        @if (session('success'))
            <div class="status-message bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        <form action="{{ route('portfolio.store') }}" method="post" enctype="multipart/form-data" class="space-y-8 divide-y divide-gray-200 px-6">
            @csrf
            <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                <div>
                    <h3 class="text-4xl pt-4 leading-6 font-medium text-white text-center">
                        Upload Portfolio Photos
                    </h3>
                </div>
                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="tag" class="block text-xl font-medium text-white sm:mt-px sm:pt-2">
                            Tag
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <input id="tag" name="tag" type="text" class="form-control">
                        </div>
                    </div>
            
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="category" class="block text-xl font-medium text-white sm:mt-px sm:pt-2">
                            Category
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <select id="category" name="category" class="form-control">
                                <option value="">None</option>
                                <option value="landscape">Landscape</option>
                                <option value="portrait">Portrait</option>
                                <option value="wildlife">Wildlife</option>
                                <option value="macro">Macro</option>
                                <option value="astrophotography">Astrophotography</option>
                                <option value="architecture">Architecture</option>
                                <option value="street">Street</option>
                                <option value="pets">Pets</option>
                            </select>
                        </div>
                    </div>
                    <label for="photos" class="block text-xl font-medium text-white sm:mt-px sm:pt-2">
                        Upload Photos
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg flex flex-col justify-center items-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <div class="flex justify-center items-center">
                                    <i class="fa fa-image text-7xl text-white"></i>
                                </div>
                                <div class="flex justify-center items-center text-sm text-gray-600 pt-6">
                                    <label for="photos" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500 p-2 text-center">
                                        <span>Upload a file</span>
                                        <input id="photos" name="photos[]" type="file" class="sr-only" multiple>
                                    </label>
                                </div>
                                <p class="text-xs text-gray-500 text-center pt-5">
                                    PNG, JPG, GIF up to 10MB
                                </p>
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
            </div>
        </form>
        <div id="progress" class="hidden h-2 bg-indigo-200 rounded">
            <div id="progress-bar" class="h-full bg-indigo-600 rounded"></div>
        </div>
    </div>

</x-app-layout>