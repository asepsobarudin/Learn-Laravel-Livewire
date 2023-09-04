<div wire:key="{{ $id }}" class="block">
    <span class="block bg-blue-600/40 h-1 rounded-md"></span>
    <div class="flex justify-between items-center px-3 py-5 rounded-md">
        <div class="w-full flex flex-col gap-3">
            <div class="flex justify-start items-center gap-2">
                @if ($completed)
                    <input wire:click="toggle({{ $id }})" type="checkbox" name="check_list" id="check_list"
                        checked>
                @else
                    <input wire:click="toggle({{ $id }})" type="checkbox" name="check_list" id="check_list">
                @endif

                @if ($editingTodoID === $id)
                    <div class="block">
                        <input type="text" wire:model="editingTodoName" name="name" id="name"
                            class="px-3 py-2 border-2 border-black/20 invalid:border-red-600 rounded-md focus:outline-none focus:border-black/50">
                        <span class="block text-sm text-red-600 font-medium my-1">
                            @error('editingTodoName')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                @else
                    <h2 class="text-xl font-medium">{{ $name }}</h2>
                @endif
            </div>
            <h3 class="text-sm font-medium">{{ $created_at }}</h3>
            @if ($editingTodoID === $id)
                <div class="flex justify-start items-center gap-2">
                    <button wire:click="updateTodo()"
                        class="flex justify-center items-center text-lg font-semibold py-2 px-3 bg-green-600 rounded-md w-max hover:bg-green-600/80 active:bg-green-600/80">
                        <span class="flex justify-center items-center text-white">Update</span>
                    </button>
                    <button wire:click="cancleEdit()"
                        class="flex justify-center items-center text-lg font-semibold py-2 px-3 bg-red-600 rounded-md w-max hover:bg-red-600/80 active:bg-red-600/80">
                        <span class="flex justify-center items-center text-white">Cancel</span>
                    </button>
                </div>
            @endif
        </div>
        <div class="text-3xl text-black/60 flex gap-2 justify-center items-center">
            <button wire:ignore wire:click="editTodo({{ $id }})">
                <ion-icon name="create-outline"></ion-icon>
            </button>
            <button wire:ignore wire:click="deleteTodo({{ $id }})">
                <ion-icon name="trash-outline"></ion-icon>
            </button>
        </div>
    </div>
</div>
