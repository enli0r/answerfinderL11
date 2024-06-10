<div
    x-data="{dropdown:false}"
    class="navbar flex items-center justify-between relative pl-5">

    
      
    <img src="../img/a5.png" alt="" class="w-[240px] mb-3">

    {{-- <div class="flex justify-between items-center space-x-3 border-2 border-blue-400 rounded-xl px-2 py-2">
        <img src="../img/cv.png" class="w-5 h-5" alt="">

        <img src="../img/linkedin.png" class="w-5 h-5" alt="">

        <img src="../img/github-mark.png" class="w-5 h-5" alt="">

    </div> --}}

    <div class="flex items-center justify-between">
        

        @if (Route::has('login'))
            <div class="px-6 py-4">
                
            </div>
        @endif

        <div class="navigation space-x-8 mr-8 flex justify-between items-center">
            <a href="#" class=" text-gray-800 navigation-link">All posts</a>

            <a href="#" class=" text-gray-800 navigation-link">About us</a>

            <a href="#" class=" text-gray-800 navigation-link">Contact</a>


        </div>
        

        
        
        <button
            @click="dropdown=!dropdown"
            class="flex items-center gap-1 p-1 rounded-lg hover:bg-white transition">

            

            <img src="https://media.istockphoto.com/id/1184187261/photo/portrait-of-cheerful-bearded-black-man-over-yellow-background.jpg?s=612x612&w=0&k=20&c=me77y_a3sfKKOauLJpMMQo3wctCyMTf9_PtQT6YLhN4=" alt=""
                class="block rounded-full h-10 w-10">

            
        </button>

        <a href="#" class="navigation-link-2 text-blue-500 font-semibold ml-2">Logout</a>
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