<x-app-layout>
    <div class="relative bg-transparent flex flex-col justify-center items-center mt-[-80px]" style="height: calc(100vh);">
        <div class="absolute inset-0 bg-center bg-no-repeat bg-cover" style="background-image: url({{asset('img/Smoky%20Mountains.jpg')}});"></div>
        <div class="container mx-auto px-4">
            <div class="flex justify-center items-center h-screen">
                <div class="bg-white p-6 rounded shadow-lg w-full md:w-1/2 z-10">
                    <h2 class="text-2xl font-bold mb-5 text-gray-800">Contact Us</h2>
                    <p class="mb-5 text-gray-600">We'd love to hear from you! Please fill out the form below and we'll get back to you as soon as possible.</p>

                    @if (session('success'))
                        <div class="status-message bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    <!-- Your form starts here -->
                    <form class="mt-8 space-y-6" method="POST" action="{{ route('contact.submit') }}">
                        @csrf
                        <div class="rounded-md shadow-sm space-y-4">
                            <div>
                                <label for="name" class="sr-only">Name</label>
                                <input id="name" name="name" type="text" autofocus required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Name">
                            </div>
                            <div>
                                <label for="email" class="sr-only">Email</label>
                                <input id="email" name="email" type="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="phone" class="sr-only">Phone Number:</label>
                                <input type="tel" id="phone" name="phone" placeholder="Phone Number" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                            </div>
                            <div>
                                <label for="message" class="sr-only">Message</label>
                                <textarea id="message" name="message" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Message" rows="3"></textarea>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Submit
                            </button>
                        </div>
                    </form>
                    <!-- Your form ends here -->

                </div>
            </div>
        </div>
    </div>
</x-app-layout>