<div
    x-data="{editClosed:true, isOpen:false, commentDelete:false, showMore:false}"
>
    <div class="comment relative rounded-xl bg-white text-black p-5 mb-6 lgMin:ml-24 border">
        <div class="flex flex-col gap-5">

            <div class="flex gap-5 lg:gap-3 lg:flex-col-reverse">
                {{-- vote button and vote count --}}
                <div class="flex flex-col items-center justify-center mt-auto mb-auto rounded-xl lg:hidden">
                    <p class="text-center mb-4 mt-1"><span class="block font-semibold text-xl mb-0 @if($hasVoted) text-blue-500 @endif">{{ $votescount }}</span><span class="text-sm text-gray-500">Votes</span></p>

                    @if($hasVoted)
                        <button wire:click='vote()' class="bg-blue-500 text-white font-semibold uppercase text-xs rounded-2xl px-5 py-3 lg:px-4 lg:py-2 transition duration-150 ease-in-out">Voted</button>
                    @else
                        <button wire:click='vote()' class="bg-gray-200 text-black font-semibold uppercase text-xs rounded-2xl px-5 py-3 lg:px-4 lg:py-2 transition duration-150 ease-in-out">Vote</button>
                    @endif
                </div>
                {{-- end of voting --}}
                <div class="h-auto bg-gray-100 lg:hidden" style="width: 2px"></div>

                {{-- comment + user info --}}
                <div x-show="editClosed" class="w-full flex flex-col gap-4">
                    <div class="flex gap-3 items-top">
                        
                        <div class="w-14 shrink-0">
                            <img src="/storage/uploads/images/{{ $img_name }}" alt=""
                            class="w-full h-14 rounded-xl hover:cursor-pointer">

                            {{-- @if ($comment->user_id == $post->user_id)
                                <p class="block  text-blue-500 font-bold text-xs uppercase text-center mt-1">creator</p>
                            @endif --}}
                        </div>

                        

                        <p class="text-gray-600 @if(str_word_count($comment->body) <= 1) break-all @endif">{{ $comment->body }}</p>
                    </div>

                    <div class="flex justify-start gap-2 items-center text-xs font-semibold text-gray-400 lgMin:hidden">
                        <p class="text-sm text-gray-900 ">{{ $comment->user->name }} @if($comment->user_id == $post->user_id) <span class="text-blue-500 font-semibold">(Author)</span> @endif</p>
                        <p>•</p>
                        <p>{{ $comment->created_at->diffForHumans() }}</p>
                    </div>

                    <hr class="w-full h-2 gray-100 lgMin:hidden">

                    <div class="flex justify-between items-center mt-auto relative">

                        <div class="flex justify-start gap-2 items-center text-xs font-semibold text-gray-400 lg:hidden">
                            <p class="text-sm text-gray-900">{{ $comment->user->name }} @if($comment->user_id == $post->user_id) <span class="text-blue-500 font-semibold">(Author)</span> @endif</p>
                            <p>•</p>
                            <p>{{ $comment->created_at->diffForHumans() }}</p>
                        </div>

                        <div class="flex gap-1 border rounded-full pl-3 bg-gray-100 items-center lgMin:hidden">
                            <div class="flex flex-col items-center">
                                <p class="font-semibold text-sm mb-0 @if($hasVoted) text-blue-500 @endif">{{ $votescount }}</p>
                                <p class="text-xxs font-semibold leading-none text-gray-400">Votes</p>
                            </div>
                            
                            
                            @if($hasVoted)
                                <button wire:click='vote()' class="bg-blue-500 text-white border border-blue-500 font-bold text-xxs uppercase rounded-full transition duration-150 ease-in px-4 py-3">Voted</button>
                            @else
                                <button wire:click='vote()' class="bg-gray-200 border border-gray-200 font-bold text-xxs uppercase rounded-full hover:border-gray-400 transition duration-150 ease-in px-4 py-3">Vote</button>
                            @endif
                        </div>
                        




                        @if ($comment->user == auth()->user())
                            <div x-show="editClosed" class="flex justify-between gap-4">

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
                                x-transition:leave-start="opacity-100s"
                                x-transition:leave-end="opacity-0"
                                @click.away="showMore=false"
                                class="absolute bottom-0 right-0 w-24 rounded-xl bg-white shadow-dialog flex flex-col py-2 -mr-24 -mb-24 z-50 xl:-mr-0">
                                    <p
                                        @click="
                                        isOpen=true
                                        editClosed=false
                                        "
                                    class="hover:bg-gray-200 hover:cursor-pointer py-2 px-3 font-semibold" href="">Edit</p>
                                    <p
                                        @click=
                                        "
                                        editClosed=false
                                        commentDelete=true
                                        "
                                    class="hover:bg-gray-200 hover:cursor-pointer  py-2 px-3 font-semibold" href="">Delete</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                {{-- end of comment info --}}

                <livewire:edit-comment :key="$comment->id" :comment='$comment'/>
                <livewire:comment-delete-popup :comment='$comment' />
            </div>
        </div>
    
    </div>
</div>

