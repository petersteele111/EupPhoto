<x-app-layout>
    <div class="container mx-auto px-4 py-8 rounded-lg shadow-md">
        <div class="flex flex-col md:flex-row items-stretch space-x-0 md:space-x-12">
            <div class="md:w-1/2 p-8 bg-white rounded-lg shadow-md">
                <h2 class="text-4xl font-semibold text-gray-800">About Me</h2>
                <p class="mt-4 text-xl text-gray-600">Welcome to EUP Photography. I'm Peter Steele, a photographer with a deep love for landscapes and portraits. I started EUP Photography in 2015, and since then, I've been using my lens to capture the beauty of the outdoors and the unique spirit of people.</p>
                <p class="mt-4 text-xl text-gray-600">Photography for me is a journey of discovery. I've had the privilege of having my work recognized in various contests and published in different platforms. I believe that every landscape has a story to tell and every face has a tale to share.</p>
                <p class="mt-4 text-xl text-gray-600">My approach combines professional precision with a relaxed, easy-going attitude, aiming to make every photo session a memorable experience. My work is a reflection of my technical skill and my passion for capturing life's moments.</p>
                <p class="mt-4 text-xl text-gray-600">At EUP Photography, every click of the shutter is an opportunity to explore beauty, emotion, and connection. Join me on this visual journey, and let's create something beautiful together.</p>
                <a href="Contact" class="inline-block mt-8 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded transition duration-500">Schedule Consultation</a>
            </div>
            <div class="md:w-1/2 mt-4 md:mt-0">
                <img class="w-full h-full object-cover rounded-lg shadow-md filter grayscale" src="{{ asset('img/about 1.jpg') }}" alt="About me">
            </div>
        </div>
    </div>
</x-app-layout>