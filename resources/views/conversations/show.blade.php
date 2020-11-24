<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex-1">
                {{ __('Mes conversations') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <livewire:conversation :conversation="$conversation">
    </div>

</x-app-layout>
