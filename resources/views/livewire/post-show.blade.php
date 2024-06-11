<div 
x-data="{editOpen:false, visible:true, showMore:false}"
x-init="window.livewire.on('postWasEdited', () => {
    visible=true;
    editOpen=false;
})"
>
    <div class="w-full rounded-xl bg-white mb-4 p-5 flex gap-5 lg:flex-col lg:gap-3 border border-slate-200">
        
        <div 
            x-show="visible"
            class="flex gap-3 items-top justify-start shrink-0 lg:flex-row">
            <img src="https://icon-library.com/images/no-user-image-icon/no-user-image-icon-27.jpg" alt=""
            class="block rounded-xl h-14 w-14">

            <a class="block font-semibold text-xl lgMin:hidden">{{ $post->title }}</a>
        </div>
    
        <div
        x-show="visible"
        class="w-full">
            <div class="mb-8 lg:mb-4">
                <a class="block font-bold mb-3 text-lg lg:hidden">{{ $post->title }}</a>
                <p class="text-gray-600 lg:line-clamp-5 line-clamp-3  @if(str_word_count($post->description) <= 1) break-all @endif ">{{ $post->description }}</p>
            </div>
            
            <div class="flex justify-between items-center relative">

                <div class="flex gap-2 items-center text-gray-400 text-xs font-semibold">
                    <p class="text-sm lg:hidden text-blue-500">{{ $post->user->name }}</p>
                    <p class="lg:hidden">•</p>
                    <p>{{ $post->created_at->diffForHumans() }}</p>
                    <p>•</p>
                    <p class="text-gray-900 hover:cursor-text">{{ $post->comments->count() }} comments</p>     
                </div>

                @if ($post->user == auth()->user())

                    {{-- Show more button --}}
                    <div class="flex justify-between gap-4">
                        <button 
                        @click="showMore=!showMore"

                        class="bg-gray-100 border rounded-full flex justify-between gap-1" style="padding: 7px 10px;">

                        <svg style="width: 5px; height: 5px;" class="text-gray-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 31.955 31.955">
                            
                            <path d="M27.25,4.655C20.996-1.571,10.88-1.546,4.656,4.706C-1.571,10.96-1.548,21.076,4.705,27.3
                            c6.256,6.226,16.374,6.203,22.597-0.051C33.526,20.995,33.505,10.878,27.25,4.655z"/>
                                
                        </svg>

                        <svg style="width: 5px; height: 5px;" class="text-gray-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 31.955 31.955">
                            
                            <path d="M27.25,4.655C20.996-1.571,10.88-1.546,4.656,4.706C-1.571,10.96-1.548,21.076,4.705,27.3
                            c6.256,6.226,16.374,6.203,22.597-0.051C33.526,20.995,33.505,10.878,27.25,4.655z"/>
                                
                        </svg>

                        <svg style="width: 5px; height: 5px;" class="text-gray-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            viewBox="0 0 31.955 31.955">
                            
                            <path d="M27.25,4.655C20.996-1.571,10.88-1.546,4.656,4.706C-1.571,10.96-1.548,21.076,4.705,27.3
                            c6.256,6.226,16.374,6.203,22.597-0.051C33.526,20.995,33.505,10.878,27.25,4.655z"/>
                                
                        </svg>
                    </button>

                    <div 
                        x-cloak
                        x-show="showMore"
                        x-transition:enter="transition linear duration-150"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition linear duration-150"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        @click.away="showMore=false"
                        class="absolute bottom-0 right-0 w-24 rounded-xl bg-white shadow-dialog flex flex-col py-2 z-50 -mr-24 -mb-24 xl:-mr-0">
                            <p
                                @click=
                                "
                                visible=false
                                editOpen=true
                                "
                            class="hover:bg-gray-200 hover:cursor-pointer py-2 px-3 font-semibold" href="">Edit</p>
                            <p
                            @click=
                                "
                                showMore=false
                                $dispatch('custom-post-delete-popup')
                                "
                            class="hover:bg-gray-200 hover:cursor-pointer  py-2 px-3 font-semibold" href="">Delete</p>
                    </div>
                        
                    </div>

                @endif
            
                
            </div>
        </div>

        {{-- <livewire:edit-post :post="$post" /> --}}
    </div>
        
    {{-- <livewire:add-comment :post="$post"/> --}}
</div>    

