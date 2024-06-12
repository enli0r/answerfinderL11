<div
    x-data="{visible:false}"
    x-on:commentadded.window="visible=false"
    class="lgMin:relative"
>


    {{-- Reply buttons --}}
    <button
        @click="visible = true"
        class="flex gap-1 items-center fixed bottom-0 right-0 rounded-full bg-blue-500 text-white px-5 py-3 mb-6 mr-6 z-20 shadow-dialog hover:bg-blue-400 transition text-xs uppercase font-semibold lgMin:hidden"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
        </svg>

        Comment
    </button>

    <button
        @click=
        "
        visible = !visible
        "
        class="rounded-2xl bg-blue-500 text-white px-5 py-3 mb-6 hover:bg-blue-400 transition z-20 lg:hidden"
    >
        Reply
    </button>
    {{-- end of reply buttons --}}

    {{-- Transparent background popup --}}
    <div
        x-cloak
        x-show="visible"
        x-transition:enter="transition linear duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition linear duration-150"
        x-transition:leave-start="opacity-100s"
        x-transition:leave-end="opacity-0"

        class="bg-half-transparent fixed top-0 right-0 bottom-0 left-0 h-full z-30 hover:cursor-pointer overflow-y-hidden lgMin:hidden"
    >

    </div>
    {{-- end of background --}}



    {{-- Form popup for phone--}}
    <div
        x-cloak
        x-show="visible"

        x-transition:enter="transition linear duration-300"
        x-transition:enter-start="origin-bottom scale-y-0"
        x-transition:enter-end="origin-bottom scale-y-100"
        x-transition:leave="transition linear duration-150"
        x-transition:leave-start="origin-bottom scale-y-100"
        x-transition:leave-end="origin-bottom scale-y-0"


        class="fixed top-56 right-5 lg:h-screen left-5 z-30 bg-white rounded-xl p-6 shadow-dialog overflow-y-hidden lgMin:hidden"
    >

        <div class="flex w-full justify-end relative">
            <button
            @click="visible=false"
            class="absolute -top-5 -right-5"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>

        <h2 class="text-lg font-bold mb-3 text-center">Add comment</h2>
        <p class="text-xs mb-8 text-center">Post your answer and help someone solve their problem!</p>

        @auth
            <form wire:submit.prevent='addComment' action="#" method="POST">
                @csrf
                <textarea name="body" id="body" wire:model.difer="body" class="rounded-2xl border-none bg-gray-100 w-full text-sm text-black mb-2" rows="7" name="" id="" placeholder="Tell us what you think" style="resize: none;"></textarea>
                @error('body')
                    <small class="block text-red-500 font-semibold mb-2">*{{ $message }}</small>
                @enderror

                <div class="flex justify-end mt-3">
                    <button class="rounded-2xl bg-blue-500 text-white px-5 py-3 hover:bg-blue-400 transition lg:rounded-full lg:text-xs lg:uppercase sm:font-semibold" type="submit">Post comment</button>
                </div>

            </form>
        @endauth

        @guest
            <div class="flex justify-center gap-3 text-center">
                <a href="{{ route('login') }}" class="bg-blue-500 text-white text-md font-semibold pointer rounded-2xl px-4 py-3 flex-1 hover:bg-blue-400">Log in</a>
                <a href="{{ route('register') }}" class="bg-gray-200 text-black text-md font-semibold pointer rounded-2xl px-4 py-3 flex-1 hover:bg-gray-100">Sign up</a>
            </div>
        @endguest
    </div>


    {{-- Form popup for PC --}}
    <div
        x-cloak
        x-show="visible"
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-out duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="absolute w-2/3 bg-white rounded-xl p-6 shadow-dialog top-16 left-0 right-0 lg:hidden z-20"
    >

        <div class="flex w-full justify-end relative">
            <button
            @click="visible=false"
            class="absolute -top-5 -right-5"
            >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>

        <h2 class="font-bold text-center text-lg uppercase mb-5">Add comment</h2>

        @auth
            <form wire:submit.prevent='addComment' action="#" method="POST">
                @csrf
                <textarea name="body" id="body" wire:model.difer="body" class="rounded-2xl border-none bg-gray-100 w-full text-sm text-black mb-2" rows="7" name="" id="" placeholder="Tell us what you think" style="resize: none;"></textarea>
                @error('body')
                    <small class="block text-red-500 font-semibold mb-2">*{{ $message }}</small>
                @enderror

                <div class="flex justify-end mt-3">
                    <button class="rounded-2xl bg-blue-500 text-white px-5 py-3 hover:bg-blue-400 transition lg:rounded-full lg:text-xs lg:uppercase sm:font-semibold" type="submit">Post comment</button>
                </div>

            </form>
        @endauth

        @guest
            <p class="text-sm font-semibold mb-4 lg:text-center text-gray-600">Please login to be able to comment on posts!</p>

            <div class="flex justify-center gap-3 text-center">
                <a href="{{ route('login') }}" class="bg-blue-500 text-white text-md font-semibold pointer rounded-2xl px-4 py-3 flex-1 hover:bg-blue-400">Log in</a>
                <a href="{{ route('register') }}" class="bg-gray-200 text-black text-md font-semibold pointer rounded-2xl px-4 py-3 flex-1 hover:bg-gray-100">Sign up</a>
            </div>
        @endguest
    </div>
    {{-- end of form popup --}}

</div>
