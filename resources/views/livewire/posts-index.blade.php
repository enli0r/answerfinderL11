<div>
    {{-- Filters --}}
    <div x-data='{visible:false' class="mb-6">
        <div class="flex justify-start items-baseline mb-2 gap-3">

             
            <div 
                
                class="flex justify-start items-baseline gap-3 lg:self-end">
                <div class="relative">
                    {{-- Newest first/Oldest firstt --}}
                    <button 
                    
                    @click='visible = !visible' 
                    @click.away='visible = false'
                    class="text-sm rounded-2xl bg-white font-semibold hover:cursor-pointer border border-slate-200 py-3 px-5">
    
                        Oldest First
                        
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
                        class="mb-6 bg-white font-semibold rounded-md text-left py-1 mt-12 absolute left-0 top-0 w-full shadow-card border"
                    >
                        <a wire:click.prevent="sort('desc')" class="block py-2 px-5 hover:bg-gray-100 text-sm " href="">Newest first</a>

                    </div>
                    {{-- end of appearing menu --}}
    
                </div>
    
                {{-- Other filter button --}}
                <button class="text-sm rounded-2xl bg-white font-semibold hover:cursor-pointer  border border-slate-200 py-3 px-5">
                    Filter
                    <i class="fa-solid fa-angle-down ml-1"></i>
                </button>
            </div>
            


            {{-- Search --}}
            <div 
            class="flex-1 w-full">
                {{-- pc version of search --}}
                <form action="" method="POST" class="sm:hidden overflow-hidden search-form" id="pc-search">
                    @csrf

                    <div class="relative">
                        <input wire:model="search" type="search" class="search-form-input rounded-2xl bg-white text-black border border-slate-200 text-sm py-3 pl-12 placeholder-gray-900 w-full placeholder:font-semibold focus:border-slate-200 focus:outline-none focus:ring-0" style="border-color: #e5e7eb" placeholder="Search" id="pc-search-input">

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
                        <input wire:model="search" type="search" class="search-form-input rounded-2xl bg-white text-black border-none text-sm py-3 placeholder-gray-900 w-full" style="border-color: #e5e7eb" id="phone-search-input">

                        <div 
                        x-show="!fullSearch"
                        class="absolute" style="left:50%; top:50%;  transform: translate(-50%, -50%);" >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
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
</div>
