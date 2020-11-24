<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex-1">
                {{ __('Mes conversations') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @foreach($conversations as $conversation)
                    <a href="{{ route('conversation.show', $conversation->id) }}" class="focus:outline-none">
                        <div class="p-6 flex items-center justify-between px-3 py-10 mb-3 shadow-md rounded mb-3 hover:border-green-300 cursor-pointer">
                            <p class="font-semibold">{{ Illuminate\Support\Str::limit($conversation->messages->last()->content, 50) }}
                            </p>
                            <p class="font-thin text-gray-500">envoyé par <strong>{{ auth()->user()->id === $conversation->messages->last()->user->id ? 'vous' : $conversation->messages->last()->user->name }}</strong> {{ $conversation->messages->last()->created_at->diffForHumans() }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>
