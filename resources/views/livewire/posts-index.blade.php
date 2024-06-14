<div>
    {{-- Filters --}}

    <div x-data='{visible:false, fullSearch:false, showFilters:false}' class="mb-6">
        <div class="flex justify-start items-baseline mb-2 gap-3">  
            <div 
                x-show="!fullSearch"
                class="flex justify-start items-baseline gap-3 lg:self-end">
                <div class="relative">
                    {{-- Newest first/Oldest firstt --}}
                    <button 
                    
                    @click='visible = !visible' 
                    @click.away='visible = false'
                    class=" text-sm rounded-2xl bg-white font-semibold hover:cursor-pointer border border-slate-200 py-3 px-5">
    
                        @if ($sortDirection == 'asc')
                            Oldest first
                        @else
                            Newest first
                        @endif
                        
                        <i class="fa-solid fa-angle-down ml-1"></i>
    
                    </button>
    
                    {{-- appearing menu --}}
                    <div x-cloak x-show='visible'
                        x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="origin-top scale-y-0"
                        x-transition:enter-end="origin-top scale-y-100"
                        x-transition:leave="transition ease-out duration-300"
                        x-transition:leave-start="origin-top scale-y-100"
                        x-transition:leave-end="origin-top scale-y-0"
                        class="mb-6 bg-white font-semibold rounded-md text-left py-1 mt-12 absolute left-0 top-0 w-full border shadow-2xl"
                    >
                        <a wire:click.prevent="sort('desc')" class="block py-2 px-5 hover:bg-gray-100 text-sm @if($sortDirection == 'desc') bg-gray-100 @endif" href="">Newest first</a>
                        <a wire:click.prevent="sort('asc')" class="block py-2 px-5 hover:bg-gray-100 text-sm @if($sortDirection == 'asc') bg-gray-100 @endif" href="">Oldest first</a>
                    </div>
                    {{-- end of appearing menu --}}
    
                </div>
    
                {{-- Other filter button --}}
                <div class="relative">
                    <button 
                    @click = "showFilters=!showFilters"
                    class="text-sm rounded-2xl bg-white font-semibold hover:cursor-pointer  border border-slate-200 py-3 px-5">
                        Filter
                        <i class="fa-solid fa-angle-down ml-1"></i>
                    </button>
    
                    <div x-cloak x-show='showFilters' @click.away="showFilters = false"
                            x-transition:enter="transition ease-out duration-150"
                            x-transition:enter-start="origin-top scale-y-0"
                            x-transition:enter-end="origin-top scale-y-100"
                            x-transition:leave="transition ease-out duration-300"
                            x-transition:leave-start="origin-top scale-y-100"
                            x-transition:leave-end="origin-top scale-y-0"
                            class="mb-6 bg-white font-semibold rounded-md text-left py-1 mt-12 absolute left-0 top-0  shadow-2xl border w-[220px] sm:-right-[80px] sm:left-auto"
                        >
                            <form action="" method="POST" class="p-4">
                                @csrf

                                <input 
                                @click = "showFilters = false"
                                wire:model.live="hasComments" type="checkbox" name="hasComments" value="1" id="hasComments" class="hover:cursor-pointer">
                                <label for="hasComments" class="text-gray-900 text-sm ml-2">Posts with comments</label>
                            </form>
                    </div>
                </div>
                
            </div>

            


            {{-- Search --}}
            <div 
            @click="fullSearch = true"
            @click.away="fullSearch =  false"
            class="flex-1 w-full">
                {{-- pc version of search --}}
                <form action="" method="POST" class="sm:hidden overflow-hidden" id="pc-search">
                    @csrf

                    <div class="relative">
                        <input wire:model.live="search" type="search" class="rounded-2xl bg-white text-black border border-slate-200 text-sm py-3 pl-12 placeholder-gray-900 w-full placeholder:font-semibold focus:border-slate-200 focus:outline-none focus:ring-0" style="border-color: #e5e7eb" placeholder="Search" id="pc-search-input">

                        <div class="absolute ml-5" style="left:0; top:50%; transform:translateY(-50%)">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                </form>

                {{-- phone version of search --}}
                <form action="" method="POST" class="smMin:hidden search-form" id="phone-search">
                    @csrf

                    <div class="relative">
                        <input wire:model.live="search" type="search" class="search-form-input rounded-2xl bg-white text-black border border-slate-200 text-sm py-3 pl-12 placeholder-gray-900 w-full placeholder:font-semibold focus:border-slate-200 focus:outline-none focus:pl-4" id="phone-search-input">

                        <div 
                        x-show="!fullSearch"
                        class="absolute" style="left:50%; top:50%;  transform: translate(-50%, -50%);" >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end of filters --}}



    @foreach ($posts as $post)
        <livewire:post-index :key="$post->id" :post="$post"/>
    @endforeach

    <div class="my-4">
        {{ $posts->links() }}
    </div>

    <hr clas="my-6">
    
    <h1 class="text-md font-semibold uppercase mt-8 mb-2">Recently seen</h1>

    @if (Cookie::get('title') != null)
        <div class="post-container w-full rounded-xl bg-white mb-6 p-5 flex gap-5 hover:shadow-md hover:cursor-pointer lg:flex-col lg:gap-3 border border-solid border-slate-200">

            <div class="flex gap-3 justify-start shrink-0 lg:items-top">
                    <div class="w-14 shrink-0">
                        
                        <img src="/storage/uploads/images/@php echo Cookie::get('img'); @endphp" alt="" class="block rounded-xl h-14 full">
                    </div>
                    
                    <a class="block font-semibold text-xl lgMin:hidden" href="/posts/@php echo Cookie::get('post_id') @endphp">@php echo(Cookie::get('title')); @endphp</a>  

            </div>

            <div class="w-full">

                <div class="mb-8 lg:mb-4">
                    <a class="block font-bold text-lg mb-3 lg:hidden" href="/posts/@php echo Cookie::get('post_id') @endphp">@php echo(Cookie::get('title')); @endphp</a>
                    <p class="text-gray-600 line-clamp-3 lg:line-clamp-5 @php if(str_word_count(Cookie::get('description')) <= 1) echo ('break-all'); @endphp hover:cursor-text">@php echo Cookie::get('description'); @endphp</p>
                </div>
                

                <div class="flex justify-between items-center relative">
                    <div class="flex gap-2 text-xs items-center w-full text-gray-400 font-semibold">
                        <div class="">
                            <p class="text-sm text-blue-500">@php echo Cookie::get('user_name'); @endphp</p>
                        </div>
                        <p class="">•</p>
                        <p class="hover:cursor-text">@php echo \Carbon\Carbon::parse(Cookie::get('created_at'))->diffForHumans(); @endphp</p>
                        <p class="">•</p>
                        <p class="text-gray-900 hover:cursor-text w-20">@php echo Cookie::get('commentsCount'); @endphp comments</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
