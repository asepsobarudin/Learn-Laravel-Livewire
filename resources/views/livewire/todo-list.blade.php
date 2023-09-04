<div class="flex flex-col items-center">
    @if (session('error'))
        <div
            class="w-1/2 mt-10 border-2 border-b-0 border-red-500/80 px-2 py-4 flex justify-start items-center gap-3 bg-gradient-to-b from-[#ff0f7b] to-[#f89b29]">
            <ion-icon name="bug-outline" class="text-3xl text-white"></ion-icon>
            <span class="text-xl font-medium text-white">{{ session('error') }}</span>
        </div>
    @endif
    @include('livewire.includes.create-todo-box')
    <div class="w-1/2">
        {{--  Search Form  --}}
        @include('livewire.includes.search-box')
        {{--  End Search Form  --}}

        {{--  Todo List  --}}
        <div class="flex flex-col gap-2 mb-5">
            @foreach ($todos as $todo)
                @include('livewire.includes.card-list-todo', [
                    'id' => $todo->id,
                    'name' => $todo->name,
                    'created_at' => $todo->created_at,
                    'completed' => $todo->completed,
                ])
            @endforeach
        </div>

        <div class="flex justify-between items-center mb-5">
            <div>
                <span>Page {{ $todos->currentPage() }}</span>
                <span class="font-semibold text-black/80">From</span>
                <span class="font-semibold text-black/80">Page {{ $todos->lastPage() }}</span>
            </div>
            <div class="flex justify-center items-center gap-3">
                @if ($todos->currentPage() > 1)
                    <a href="/?page={{ $todos->currentPage() - 1 }}"
                        class="bg-slate-500 hover:bg-slate-500/80 rounded-md px-3 py-2 text-white">Prev</a>
                @endif

                @if ($todos->currentPage() < $todos->lastPage())
                    <a href="/?page={{ $todos->currentPage() + 1 }}"
                        class="bg-slate-500 hover:bg-slate-500/80 rounded-md px-3 py-2 text-white">Next</a>
                @endif
            </div>
        </div>
        {{--  End Todo List  --}}
    </div>
</div>
