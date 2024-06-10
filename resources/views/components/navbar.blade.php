<div
    x-data="{dropdown:false}"
    class="navbar flex items-center justify-between relative pl-5">

    <img src="../img/a5.png" alt="" class="w-[240px] mb-3">
    <div class="flex items-center justify-between">
        @if (Route::has('login'))
            <div class="px-6 py-4">
                
            </div>
        @endif

        <div class="navigation space-x-3 mr-5">
            <a href="#" class="font-semibold text-gray-800">All posts</a>

            <a href="#" class="font-semibold text-gray-800">About us</a>
        </div>
        

        <button
            @click="dropdown=!dropdown"
            class="flex items-center gap-1 p-1 rounded-lg hover:bg-white transition">

            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 font-bold" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    {{-- dropdown --}}
    <div
        x-cloak
        x-show="dropdown" 
        @click.away="dropdown=false"

        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="origin-top scale-y-0"
        x-transition:enter-end="origin-top scale-y-100"
        x-transition:leave="transition ease-out duration-300"
        x-transition:leave-start="origin-top scale-y-100"
        x-transition:leave-end="origin-top scale-y-0"


        class="absolute top-12 right-0 bg-white rounded-lg z-50 py-3 flex flex-col shadow-card border">

        @guest
            @if (Route::has('register'))
                <a href="{{ route('login') }}" class="hover:bg-gray-200 px-8 py-2 transition">Log in</a>
            @endif

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="hover:bg-gray-200 px-8 py-2 transition">Register</a>
            @endif
        @endguest    


        @auth
            <a href="#" class="hover:bg-gray-200 px-8 py-2 transition">My profile</a>

            <form class="w-full flex" method="POST" action="{{ route('logout') }}">
                @csrf

                <a class="w-full hover:bg-gray-200 px-8 py-2 transition" href="route('logout')"
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                        Sign out
                </a>
            </form>
        @endauth
    </div>

</div>