<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20"> <!-- Increased height to h-20 -->
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('Home') }}">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" height="50" width="100" class="m-4">
                    </a>
                </div>

                <!-- Navigation Links -->
                @auth
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 lg:flex">
                        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-lg"> <!-- Increased font-size with text-lg -->
                            {{ __('Client Home') }}
                        </x-nav-link>
                    </div>
                @endauth
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 lg:flex">
                    <x-nav-link :href="route('Home')" :active="request()->routeIs('Home')" class="text-lg"> <!-- Increased font-size with text-lg -->
                        {{ __('Home') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 lg:flex">
                    <x-nav-link :href="route('Services')" :active="request()->routeIs('Services')" class="text-lg"> <!-- Increased font-size with text-lg -->
                        {{ __('Services') }}
                    </x-nav-link>
                </div>
                {{-- <div class="hidden space-x-8 sm:-my-px sm:ms-10 lg:flex">
                    <x-nav-link :href="route('Pricing')" :active="request()->routeIs('Pricing')" class="text-lg"> <!-- Increased font-size with text-lg -->
                        {{ __('Pricing') }}
                    </x-nav-link>
                </div> --}}
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 lg:flex">
                    <x-nav-link :href="route('portfolio.index')" :active="request()->routeIs('portfolio.index')" class="text-lg"> <!-- Increased font-size with text-lg -->
                        {{ __('Portfolio') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 lg:flex">
                    <x-nav-link :href="route('About')" :active="request()->routeIs('About')" class="text-lg"> <!-- Increased font-size with text-lg -->
                        {{ __('About') }}
                    </x-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 lg:flex">
                    <x-nav-link :href="route('Contact')" :active="request()->routeIs('Contact')" class="text-lg"> <!-- Increased font-size with text-lg -->
                        {{ __('Contact') }}
                    </x-nav-link>
                </div>
            </div>

                <!-- Login and Register Links -->
                @if (Route::has('login'))
                    <div class="hidden lg:flex lg:items-center lg:justify-end p-6">
                        @guest
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif
                        @endguest
                    </div>
                @endif

            <!-- Settings Dropdown -->
            @auth
                <div class="hidden lg:flex sm:items-center sm:ms-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            @if (auth()->user() && auth()->user()->email == 'petersteele111@gmail.com')
                            <x-dropdown-link :href="route('albums.index')">
                                {{ __('Manage Albums') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('portfolio.edit')">
                                {{ __('Manage Portfolio') }}
                            </x-dropdown-link>
                            @endif

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>
            @endauth

            <!-- Hamburger -->
            <div class="-me-2 flex items-center lg:hidden z-50">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden lg:hidden">
        @auth
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Client Home') }}
                </x-responsive-nav-link>
            </div>
        @endauth

    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('Home')" :active="request()->routeIs('Home')">
            {{ __('Home') }}
        </x-responsive-nav-link>
    </div>
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('Services')" :active="request()->routeIs('Services')">
            {{ __('Services') }}
        </x-responsive-nav-link>
    </div>
    {{-- <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('Pricing')" :active="request()->routeIs('Pricing')">
            {{ __('Pricing') }}
        </x-responsive-nav-link>
    </div> --}}
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('portfolio.index')" :active="request()->routeIs('portfolio.index')">
            {{ __('Portfolio') }}
        </x-responsive-nav-link>
    </div>
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('About')" :active="request()->routeIs('About')">
            {{ __('About') }}
        </x-responsive-nav-link>
    </div>
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('Contact')" :active="request()->routeIs('Contact')">
            {{ __('Contact') }}
        </x-responsive-nav-link>
    </div>
    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700 w-[95%] mx-auto">
    <div class="pt-2 pb-3 space-y-1">
        <x-responsive-nav-link :href="route('login')">
            {{ __('Log in') }}
        </x-responsive-nav-link>
        @if (Route::has('register'))
            <x-responsive-nav-link :href="route('register')">
                {{ __('Register') }}
            </x-responsive-nav-link>
        @endif
    </div>

        <!-- Responsive Settings Options -->
        @auth
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    @if (auth()->user() && auth()->user()->email == 'petersteele111@gmail.com')
                    <x-responsive-nav-link :href="route('albums.index')">
                        {{ __('Manage Albums') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('portfolio.edit')">
                        {{ __('Manage Portfolio') }}
                    </x-responsive-nav-link>
                    @endif

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth
    </div>
</nav>
