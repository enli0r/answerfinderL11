<div
    x-data="{showCreatePost:false}"
    x-init=
    "
        Livewire.on('postWasCreated', () => {
            showCreatePost=false;
        }); 
    "
>

    {{-- post your question button --}}
    <button 
        @click="showCreatePost = true"
        class="flex items-center gap-1 fixed bottom-0 right-0 rounded-full bg-blue-500 text-white px-5 py-3 mb-6 mr-6 z-20 shadow-dialog hover:bg-blue-400 transition text-xs uppercase font-semibold lgMin:hidden"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
        </svg>
        Question
    </button>


    {{-- Create post for pc --}}
    <div class="rounded-2xl bg-white p-6 self-baseline lg:hidden border border-slate-200">
        <div class="text-center">
            <h4 class="text-lg font-bold mb-3">Ask a question</h4>
            <p class="text-xs mb-8">Find the answer you are looking for!</p>
        </div>

    
        @auth
            <form wire:submit.prevent="submit" action="" method="POST" class="flex flex-col gap-3">
                @csrf
    
                <input wire:model.defer="title" type="text" class="rounded-2xl border-none bg-gray-100 text-black text-sm w-full" placeholder="Title">
                @error('title')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
                @enderror 
    
                <textarea wire:model.defer="description" type="text" class="rounded-2xl border-none bg-gray-100 text-black text-sm w-full" placeholder="Description" rows="5" style="resize: none;"></textarea>
                @error('description')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
                @enderror 
    
                <div class="flex justify-end">
                    <button type="submit" class="w-full bg-blue-400 border-2 border-blue-400 text-white text-md font-normal pointer rounded-xl px-5 py-2 hover:bg-blue-400 transition">ask away.</button>
                </div>
            </form>
        @endauth
    
        @guest
        <div class="flex justify-center text-center items-center">
            <a href="{{ route('login') }}" class="w-24 py-2 border-2 border-sky-600 text-sky-600 rounded-md hover:text-sky-800 font-semibold">Log in</a>
            <p class="text-sm font-semibold text-gray-600 mx-4">or</p>
            <a href="{{ route('register') }}" class="w-24 py-2 border-2 border-sky-600 bg-sky-600 text-white rounded-md hover:text-sky-800 hover:bg-white font-semibold transition">Sign up</a>
        </div>
        @endguest
    </div>

    {{-- Transparent background popup --}}
    <div 
        x-cloak
        x-show="showCreatePost"
        x-transition:enter="transition linear duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition linear duration-150"
        x-transition:leave-start="opacity-100s"
        x-transition:leave-end="opacity-0"
        @click="showCreatePost = false"

        class="bg-half-transparent fixed top-0 right-0 bottom-0 left-0 h-full z-30 hover:cursor-pointer overflow-y-hidden lgMin:hidden"
    >    
    
    </div>
    {{-- end of background --}}
    
    {{-- phone create post popup --}}
    <div 
        x-cloak
        x-show="showCreatePost"
        
        x-transition:enter="transition linear duration-300"
        x-transition:enter-start="origin-bottom scale-y-0"
        x-transition:enter-end="origin-bottom scale-y-100"
        x-transition:leave="transition linear duration-150"
        x-transition:leave-start="origin-bottom scale-y-100"
        x-transition:leave-end="origin-bottom scale-y-0"
        @click.away="showCreatePost = false"

        class="fixed top-[300px] right-5 lg:h-screen left-5 z-30 bg-white rounded-2xl p-6 shadow-dialog lgMin:hidden"
    >
        <div class="flex w-full justify-end relative">
            <button
            @click="showCreatePost=false"
            class="absolute -top-5 -right-5"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>


        <div class="text-center">
            <h4 class="text-lg font-bold mb-3">Ask a question</h4>
            <p class="text-xs mb-8">Find the answer you are looking for!</p>
        </div>
    
        @auth
            <form wire:submit.prevent="submit" action="#" method="POST" class="space-y-3">
                @csrf
    
                <input wire:model.defer="title" type="text" class="rounded-2xl border border-white bg-gray-100 text-black text-sm w-full" placeholder="Title">
                @error('title')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
                @enderror 
    
                <textarea wire:model.defer="description" type="text" class="rounded-2xl border-none bg-gray-100 text-black text-sm w-full" placeholder="Description" rows="5" style="resize: none;"></textarea>
                @error('description')
                    <small class="text-red-500 font-semibold">*{{ $message }}</small>
                @enderror 
    
                <button type="submit" class="bg-blue-500 text-white text-md font-semibold pointer rounded-full text-xs uppercase px-4 py-3 float-right hover:bg-blue-400 transition">Submit</button>
            </form>
        @endauth
    
        @guest
        <div class="flex justify-center gap-3 text-center">
            <a href="{{ route('login') }}" class="bg-blue-500 text-white text-md font-semibold pointer rounded-2xl px-4 py-3 flex-1 hover:bg-blue-400">Log in</a>
            <a href="{{ route('register') }}" class="bg-gray-200 text-black text-md font-semibold pointer rounded-2xl px-4 py-3 flex-1 hover:bg-gray-100">Sign up</a>
        </div>
        @endguest
    </div>
    
</div>
