<div
x-cloak
x-show="editOpen"
class="w-full overflow-hidden"
@click.away=
"
editOpen=false
visible=true
"
>
    <form
    class="w-full mb-5"

    wire:submit.prevent="edit" action="" method="POST">
        @csrf

        <input type="text" wire:model.defer="title" class="block w-full font-semibold mb-3 text-base border-none bg-gray-100 rounded-xl"/>
        <textarea wire:model.defer="description" class="w-full border-none bg-gray-100 rounded-lg" rows="6" style="resize: none;" autofocus></textarea>
    </form>

    <div class="flex justify-center gap-4">
        <button 
        wire:click.prevent="edit()"
        class="rounded-lg hover:bg-gray-200 transition"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-600 hover:cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
        </button>

        <button
        @click="
        editOpen=false
        visible=true
        showMore=false
        "
        class="rounded-lg hover:bg-gray-200 transition"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-red-600 hover:cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>
</div>
    
