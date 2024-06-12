<x-app-layout>
    <div class="flex lg:px-5 lgMin:gap-5">
        <div class="w-70 overflow-hidden lg:hidden">
            <livewire:create-post />
        </div>

        <div class="w-175 lg:w-full">
            <div class="back-button mb-6">
                <a href="{{ route('posts.index') }}" class="inline-block rounded-xl font-semibold py-2 px-5 bg-gray-800 text-white">

                    <i class="fa-solid fa-chevron-left text-sm mr-2"></i>
                      
                    Back</a>
            </div>
        
            <livewire:post-show :post="$post"/>
            
            <livewire:post-comments :post="$post"/>
        
            <livewire:post-delete-popup :post="$post" />
        </div>
    </div>
</x-app-layout>