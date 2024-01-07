<!-- resources/views/about.blade.php -->

<x-app-layout>
    <div class="container mx-auto px-6 py-8">
        <!-- Hero Section -->
        <div class="h-64 w-full bg-cover bg-center" style="background-image: url({{ asset('img/home_1920_min.jpg') }})">
            <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                <div class="px-10 max-w-xl">
                    <h2 class="text-2xl text-white font-semibold">About Me</h2>
                    <p class="mt-2 text-gray-300">Hi, my name is Peter Steele and I am an avid landscape and portrait photographer based out of the Eastern Upper Peninsula of Michigan. Having started offering services back in 2015, I have been a long time resident of the area and have contributed for multiple events and some publications. I also pride myself in capturing the beauty of our area be it nature or the residents.</p>
                </div>
            </div>
        </div>

        <!-- About the company section -->
        <div class="md:flex mt-16">
            <div class="w-full md:w-1/2">
                <h4 class="text-3xl text-gray-800">Who we are</h4>
                <p class="mt-4 text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
            </div>
            <div class="w-full md:w-1/2 mt-8 md:mt-0">
                <img class="h-64 w-full object-cover" src="/path-to-your-image.jpg" alt="About our company">
            </div>
        </div>

        <!-- About the team section -->
        <div class="mt-16">
            <h4 class="text-3xl text-gray-800">Our Team</h4>
            <div class="flex flex-wrap mt-6">
                <div class="w-full md:w-1/2 lg:w-1/3">
                    <div class="mx-8 mb-8 md:mb-0">
                        <img class="h-64 w-full object-cover" src="/path-to-your-image.jpg" alt="team member">
                        <h2 class="mt-4 text-xl font-semibold">John Doe</h2>
                        <p class="mt-2 text-gray-600">UI Developer</p>
                    </div>
                </div>
                <!-- Repeat for other team members -->
            </div>
        </div>

        <!-- Company history timeline -->
        <div class="mt-16">
            <h4 class="text-3xl text-gray-800">Our History</h4>
            <div class="mt-6">
                <div class="flex">
                    <div class="w-1/2">
                        <h5 class="text-lg text-gray-800 font-semibold mb-2">2023</h5>
                        <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                    <div class="w-1/2">
                        <h5 class="text-lg text-gray-800 font-semibold mb-2">2022</h5>
                        <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>
                <!-- Repeat for other years -->
            </div>
        </div>
    </div>
</x-app-layout>