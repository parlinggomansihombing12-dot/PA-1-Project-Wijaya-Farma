<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
<<<<<<< HEAD
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- LEFT -->
=======
    
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- KIRI -->
>>>>>>> bf05e2790f4a7fcaa09a23a8d3c61a514c76fa00
            <div class="flex">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">
<<<<<<< HEAD
                    <a href="{{ route('admin.dashboard') }}">
=======
                    <a href="{{ url('/') }}">
>>>>>>> bf05e2790f4a7fcaa09a23a8d3c61a514c76fa00
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

<<<<<<< HEAD
                <!-- Navigation -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link 
                        :href="route('admin.dashboard')" 
                        :active="request()->routeIs('admin.dashboard')">
                        Dashboard
=======
                <!-- Menu -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    
                    <x-nav-link :href="url('/')" :active="request()->is('/')">
                        Home
>>>>>>> bf05e2790f4a7fcaa09a23a8d3c61a514c76fa00
                    </x-nav-link>

                    <x-nav-link :href="route('produk.index')">
                        Produk
                    </x-nav-link>

                    <x-nav-link :href="route('artikel.index')">
                        Artikel
                    </x-nav-link>

                    <x-nav-link :href="route('layanan.index')">
                        Layanan
                    </x-nav-link>

                </div>
            </div>

<<<<<<< HEAD
            <!-- RIGHT (USER) -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

=======
            <!-- KANAN -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">

                {{-- ✅ JIKA SUDAH LOGIN --}}
>>>>>>> bf05e2790f4a7fcaa09a23a8d3c61a514c76fa00
                @auth
                <x-dropdown align="right" width="48">
                    
                    <x-slot name="trigger">
<<<<<<< HEAD
                        <button class="inline-flex items-center px-3 py-2 text-sm text-gray-500 bg-white hover:text-gray-700">

                            <!-- 🔥 FIX USER -->
                            <div>{{ auth()->user()->name ?? auth()->user()->username }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
=======
                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-500 bg-white rounded-md hover:text-gray-700">
                            
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" viewBox="0 0 20 20">
                                    <path d="M5.293 7.293L10 12l4.707-4.707"/>
>>>>>>> bf05e2790f4a7fcaa09a23a8d3c61a514c76fa00
                                </svg>
                            </div>

                        </button>
                    </x-slot>

                    <x-slot name="content">
<<<<<<< HEAD
                        <x-dropdown-link :href="route('admin.profile.edit')">
=======

                        <x-dropdown-link :href="route('profile.edit')">
>>>>>>> bf05e2790f4a7fcaa09a23a8d3c61a514c76fa00
                            Profile
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
<<<<<<< HEAD
                            <x-dropdown-link href="#"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Logout
=======
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Log Out
>>>>>>> bf05e2790f4a7fcaa09a23a8d3c61a514c76fa00
                            </x-dropdown-link>
                        </form>

                    </x-slot>
                </x-dropdown>
                @endauth

<<<<<<< HEAD
=======

                {{-- ❗ JIKA BELUM LOGIN --}}
                @guest
                    <a href="{{ route('login') }}" class="text-sm text-blue-500 me-3">
                        Login
                    </a>

                    <a href="{{ route('register') }}" class="text-sm text-green-500">
                        Register
                    </a>
                @endguest

>>>>>>> bf05e2790f4a7fcaa09a23a8d3c61a514c76fa00
            </div>

            <!-- MOBILE -->
            <div class="-me-2 flex items-center sm:hidden">
<<<<<<< HEAD
                <button @click="open = ! open"
                    class="p-2 text-gray-400 hover:text-gray-500 hover:bg-gray-100">
                    ☰
=======
                <button @click="open = ! open" class="p-2 text-gray-400 hover:text-gray-500">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }"
                            class="inline-flex"
                            stroke="currentColor" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        
                        <path :class="{'hidden': ! open, 'inline-flex': open }"
                            class="hidden"
                            stroke="currentColor" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
>>>>>>> bf05e2790f4a7fcaa09a23a8d3c61a514c76fa00
                </button>
            </div>

        </div>
    </div>

    <!-- MOBILE MENU -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">

        <div class="pt-2 pb-3 space-y-1">
<<<<<<< HEAD
            <x-responsive-nav-link 
                :href="route('admin.dashboard')" 
                :active="request()->routeIs('admin.dashboard')">
                Dashboard
=======

            <x-responsive-nav-link :href="url('/')">
                Home
>>>>>>> bf05e2790f4a7fcaa09a23a8d3c61a514c76fa00
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('produk.index')">
                Produk
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('artikel.index')">
                Artikel
            </x-responsive-nav-link>

        </div>

<<<<<<< HEAD
        @auth
=======
        <!-- USER INFO -->
>>>>>>> bf05e2790f4a7fcaa09a23a8d3c61a514c76fa00
        <div class="pt-4 pb-1 border-t border-gray-200">

            @auth
            <div class="px-4">
<<<<<<< HEAD
                <div class="text-gray-800">{{ auth()->user()->name ?? auth()->user()->username }}</div>
                <div class="text-gray-500 text-sm">{{ auth()->user()->email ?? '-' }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('admin.profile.edit')">
=======
                <div class="text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
>>>>>>> bf05e2790f4a7fcaa09a23a8d3c61a514c76fa00
                    Profile
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
<<<<<<< HEAD
                    <x-responsive-nav-link href="#"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        Logout
=======
                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        Log Out
>>>>>>> bf05e2790f4a7fcaa09a23a8d3c61a514c76fa00
                    </x-responsive-nav-link>
                </form>
            </div>
            @endauth

            @guest
            <div class="px-4">
                <a href="{{ route('login') }}" class="text-blue-500">Login</a><br>
                <a href="{{ route('register') }}" class="text-green-500">Register</a>
            </div>
            @endguest

        </div>
        @endauth

    </div>
<<<<<<< HEAD
=======

>>>>>>> bf05e2790f4a7fcaa09a23a8d3c61a514c76fa00
</nav>