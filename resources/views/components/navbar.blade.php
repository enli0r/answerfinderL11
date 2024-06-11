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

        <div class="navigation space-x-8 mr-6 flex justify-between items-center">
            <a href="{{ route('posts.index') }}" class=" text-gray-800 navigation-link">All posts</a>

            <a href="#" class=" text-gray-800 navigation-link">About us</a>

            <a href="#" class=" text-gray-800 navigation-link">Contact</a>


        </div>

        
        @auth

            <div class="separator h-6 w-[1px] bg-gray-500 mr-4"></div>

            {{-- <p class=" mr-2">{{ auth()->user()->name }}</p> --}}

            <div class="flex gap-4 items-center">
                <form class="" method="POST" action="{{ route('logout') }}">
                    @csrf
    
                    <a class="navigation-link-2 font-semibold text-blue-500" href="route('logout')"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                            Sign out
                    </a>
                </form>
    
                <button
                @click="dropdown=!dropdown"
                class="flex items-center gap-1 p-1 rounded-lg hover:bg-white transition">
    
                
    
                <img src="https://media.istockphoto.com/id/1184187261/photo/portrait-of-cheerful-bearded-black-man-over-yellow-background.jpg?s=612x612&w=0&k=20&c=me77y_a3sfKKOauLJpMMQo3wctCyMTf9_PtQT6YLhN4=" alt=""
                    class="block rounded-xl h-10 w-10">
    
                </button> 
            </div>

            
        @endauth

        @guest
            <div class="flex flex-start">
                @if (Route::has('register'))
                    <a href="{{ route('login') }}" class="px-3 py-[5px] border-2 border-sky-600 text-sky-600 border-r-0 font-semibold hover:text-sky-800 transition rounded-tl-md rounded-bl-md">Log in</a>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="px-3 py-[5px] border-2 bg-sky-600 border-sky-600 text-white hover:text-sky-600 hover:bg-white transition font-semibold rounded-tr-md rounded-br-md">Sign up</a>
                @endif
            </div>
        @endguest  

        
    </div>

</div>