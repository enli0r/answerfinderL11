<div
x-cloak
x-show="commentDelete"
@custom-comment-delete-popup.window="commentDelete=true"
@click.away=
"
commentDelete=false
editClosed=true
"


class="w-full ml-3 flex flex-col self-center">
    <h3 class="text-base font-semibold text-center mb-6">Are you sure you want to delete this comment?</h3>

    <div class="flex justify-center gap-4">
        <button 
        wire:click.prevent="deleteComment()"
        class="rounded-lg hover:bg-gray-200 transition">
            <svg
            xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-600 hover:cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
        </button>
        

        <button
        @click=
        "
        commentDelete=false
        editClosed=true
        "
        class="rounded-lg hover:bg-gray-200 transition"
        >

        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-red-600 hover:cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>

        </button>
        
    </div>
    
</div>
