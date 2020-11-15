<div class="flex-1" x-data="{ open: true }">
    <div class="hidden sm:flex sm:items-center inline-block relative">
        <input @click.away="{ open = false; @this.resetIndex(); }" @click="{ open = true }" class="bg-gray-200 text-gray-700 border-2 focus:outline-none placeholder-gray-500 py-1 px-2 rounded-full mr-3 w-full" placeholder="Rechercher une mission ..." wire:model="query" wire:keydown.arrow-down.prevent="incrementIndex" wire:keydown.arrow-up.prevent="decrementIndex" wire:keydown.backspace="resetIndex" wire:keydown.enter.prevent="showJob">
    </div>
    @if(strlen($query) > 2)
        <div x-show="open" class="absolute border bg-gray-200 text-md" style="width: 37rem">
            @if(count($jobs) > 0)
                @foreach($jobs as $index => $job)
                    <p class="p-6 {{ $index ==$selectedIndex ? 'text-green-500 bg-gray-100' : '' }}">{{ $job->title }}</p>
                @endforeach
            @else
                <span>Pas de résultat pour {{ $query }}</span>
            @endif
        </div>
    @endif
</div>
