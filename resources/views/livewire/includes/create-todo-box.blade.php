{{--  Input Form  --}}
<div class="w-1/2 mt-2">
    <span class="block bg-blue-600/40 h-1 rounded-md"></span>
    <h2 class="font-semibold text-xl my-5">Create Todo List</h2>
    @if (session('success'))
        <span
            class="block text-white p-2 bg-green-600 rounded-md my-2 font-semibold text-center">{{ session('success') }}</span>
    @endif
    <form class="flex flex-col gap-2">
        <div class="block">
            <input wire:model="name" type="text" name="name" id="name" placeholder="Todo..."
                class="px-3 py-2 border-2 border-black/20 invalid:border-red-600 rounded-md focus:outline-none focus:border-black/50">
            <span class="block text-sm text-red-600 font-medium my-1">
                @error('name')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <button wire:click.prevent="createTodo" type="submit"
            class="flex justify-center items-center gap-2 text-lg font-semibold py-2 px-3 bg-blue-600 rounded-md w-max hover:bg-blue-600/80 active:bg-blue-600/80">
            <span class="flex justify-center items-center text-white">Create</span>
            <span class="flex justify-center items-center text-white text-xl" wire:ignore>
                <ion-icon name="add-outline"></ion-icon>
            </span>
        </button>
    </form>
    <span class="block bg-blue-600/20 h-1 rounded-md my-5"></span>
</div>
{{--  End Input Form  --}}
