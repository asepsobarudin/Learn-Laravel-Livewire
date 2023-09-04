<div class="flex justify-center items-center gap-3 mb-5">
    <ion-icon name="search-outline" class="text-3xl text-black/60"></ion-icon>
    <input wire:model.live.debounce.500ms="search" list="text" name="search" id="search" placeholder="Search..."
        class="px-3 py-2 border-2 rounded-md focus:outline-none focus:border-black/30">
</div>
