<div id="post-{{ $post->id }}" class="post-container w-full rounded-xl bg-white mb-6 p-5 flex gap-5 hover:shadow-card hover:cursor-pointer lg:flex-col lg:gap-3 border border-solid border-slate-200
    
    {{-- @auth
        @php
            
            if($post->user_id == auth()->user()->id)
            echo('');


        @endphp
    @endauth --}}
    
    
    ">

    <div class="flex gap-3 justify-start shrink-0 lg:items-top">
            <div class="w-14 shrink-0">
                <img src="https://t4.ftcdn.net/jpg/06/10/19/43/360_F_610194339_3CtGOkv4wIiAyybcib4IrFX0nnc83Bv6.jpg" alt=""
                class="block rounded-xl h-14 full">
                
                {{-- @auth
                    @if ($post->user_id == auth()->user()->id)
                        <p class="block  text-purple-800 font-bold text-xs uppercase text-center mt-1">You</p>
                    @endif
                @endauth --}}
                
            </div>
            
            <a id="post-{{ $post->id }}-link" class="block font-semibold text-xl lgMin:hidden" href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>  

    </div>

    <div class="w-full">

        <div class="mb-8 lg:mb-4">
            
            <a id="post-{{ $post->id }}-link" class="block font-bold text-lg mb-3 lg:hidden" href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
            <p class="text-gray-600 line-clamp-3 lg:line-clamp-5 @if(str_word_count($post->description) <= 1) break-all @endif hover:cursor-text">{{ $post->description  }}</p>
        </div>
        

        <div class="flex justify-between items-center relative">
            <div class="flex gap-2 text-xs items-center w-full text-gray-400 font-semibold">
                <div class="">
                    <p class="text-sm text-blue-500">{{ $post->user->name }}</p>
                </div>
                <p class="">•</p>
                <p class="hover:cursor-text">{{ $post->created_at->diffForHumans() }}</p>
                <p class="">•</p>
                <p class="text-gray-900 hover:cursor-text w-20">{{ $post->comments->count() }} comments</p>
            </div>
        </div>
    </div>
    
</div>
