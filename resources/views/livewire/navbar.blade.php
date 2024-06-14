<div
    x-data="{dropdown:false, sidebar:false, uploadPhoto:false}"
    class="navbar flex items-center justify-between relative pl-5"
    @sidebar-open.window="document.getElementById('main-body').style.overflowY = 'hidden'"
    @sidebar-closed.window="document.getElementById('main-body').style.overflowY = 'auto'"
    >
    


    <a href="{{ route('posts.index') }}"><img src="../img/a5.png" alt="" class="w-[240px] mb-3 sm:w-[200px]"></a>

    <div 
    x-cloak
    x-show="!sidebar"
    @click="sidebar = true
    $dispatch('sidebar-open')"
    "
    class="lgMin:hidden z-40">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>
          
    </div>


    <div class="flex items-center justify-between lg:hidden">

        <div class="navigation space-x-8 mr-6 flex justify-between items-center">
            <a href="{{ route('posts.index') }}" class=" text-gray-800 navigation-link">All posts</a>

            <a href="{{ route('about-author') }}" class=" text-gray-800 navigation-link">About author</a>

        </div>

        
        @auth

            {{-- <div class="separator h-6 w-[1px] bg-gray-500 mr-4"></div> --}}

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
                @click="uploadPhoto = !uploadPhoto"
                class="flex items-center gap-1 p-1 rounded-lg hover:bg-white transition">

                    <img src="/storage/uploads/images/{{ $img_name }}" alt="" class="block rounded-xl h-10 w-10">
    
                </button> 

                <div x-cloak x-show="uploadPhoto" class="text-sm rounded-2xl bg-white font-semibold hover:cursor-pointer border border-slate-200 py-3 px-5 absolute top-16 right-0 z-20 shadow-2xl"
                x-transition:enter="transition ease-out duration-150"
                x-transition:enter-start="origin-top scale-y-0"
                x-transition:enter-end="origin-top scale-y-100"
                x-transition:leave="transition ease-out duration-300"
                x-transition:leave-start="origin-top scale-y-100"
                x-transition:leave-end="origin-top scale-y-0"
                >

                    <form action="{{ route('upload.img') }}" method="POST" class="flex items-center" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="img">

                        <button type="submit" name="uploadPhoto" value="1" class="px-3 py-2 bg-black rounded-lg text-white text-sm">Change photo</button>
                    </form>
                </div>
    
                
            </div>

            
        @endauth

        @guest
            <div class="flex">
                <a href="{{ route('login') }}" class="px-3 py-[5px] border-2 border-sky-600 text-sky-600 border-r-0 font-semibold hover:text-sky-800 transition rounded-tl-md rounded-bl-md">Log in</a>

                <a href="{{ route('register') }}" class="px-3 py-[5px] border-2 bg-sky-600 border-sky-600 text-white hover:text-sky-600 hover:bg-white transition font-semibold rounded-tr-md rounded-br-md">Sign up</a>
            </div>
        @endguest  
    </div>

    <div 
    x-cloak
    x-show="sidebar"
    @click="
    sidebar = false;
    $dispatch('sidebar-closed')"
    "

    class="lgMin:hidden z-40 text-gray-200 fixed top-[25px] right-5">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
        </svg>   
    </div>


    <aside 
        x-cloak
        x-show="sidebar" 
        x-transition:enter="transition linear duration-250"
        x-transition:enter-start="transform translate-x-full"
        x-transition:enter-end="transform translate-x-0"
        x-transition:leave="transition linear duration-250"
        x-transition:leave-start="transform translate-x-0"
        x-transition:leave-end="transform translate-x-full"
        class="lgMin:hidden h-[100%] w-full fixed top-0 right-0 bottom-0 z-30 text-gray-200 overflow-y-hidden flex">

        <div @click="
        sidebar=false;
        $dispatch('sidebar-closed')"
        " 
        class="w-1/4">
            
        </div>

        <div class="bg-gray-900 w-3/4">

            <div class="sidebar-nav mt-24 flex flex-col items-center justify-center text-center">

                <img src="../img/a5.png" alt="" class="w-[150px] mb-8">

                <a href="{{ route('posts.index') }}" class=" text-gray-200 w-full py-2 border-t border-b border-white hover:bg-gray-400">All posts</a>
    
                <a href="{{ route('about-author') }}" class=" text-gray-200 w-full py-2 border-b border-white hover:bg-gray-400">About author</a>
    
                

                @auth
                    <div class="fixed bottom-[100px]">
                        <form class="" method="POST" action="{{ route('logout') }}">
                            @csrf
            
                            <a class="font-semibold text-blue-500 flex gap-2 items-center" href="route('logout')"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                                    Sign out

                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-7 text-red-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                                    </svg>
                            </a>
                        </form>

                        
                          
                    </div>
                @endauth

                @guest
                    <div class="fixed bottom-[80px] flex">
                        <a href="{{ route('login') }}" class="px-3 py-[5px] border-2 border-sky-600 text-sky-600 border-r-0 font-semibold hover:text-sky-800 transition rounded-tl-md rounded-bl-md">Log in</a>
        
                        <a href="{{ route('register') }}" class="px-3 py-[5px] border-2 bg-sky-600 border-sky-600 text-white hover:text-sky-600 hover:bg-white transition font-semibold rounded-tr-md rounded-br-md">Sign up</a>
                    </div>
                @endguest

                
            </div>
        </div>
        
    </aside>

</div>
