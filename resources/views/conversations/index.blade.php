<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="flex-1 text-xl font-semibold leading-tight text-gray-800">
                {{ __('Mes conversations') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                @forelse($conversations as $conversation)
                    <a href="{{ route('conversation.show', $conversation->id) }}" class="focus:outline-none">
                        <div class="flex items-center justify-between p-6 px-3 py-10 mb-3 rounded shadow-md cursor-pointer hover:border-green-300">
                            <p class="font-semibold">{{ Illuminate\Support\Str::limit($conversation->messages->last()->content, 50) }}
                            </p>
                            <p class="font-thin text-gray-500">envoyé par <strong>{{ auth()->user()->id === $conversation->messages->last()->user->id ? 'vous' : $conversation->messages->last()->user->name }}</strong> {{ $conversation->messages->last()->created_at->diffForHumans() }}</p>
                        </div>
                    </a>
                @empty
                    <div>Vous n'avez pas de conversations en cours.</div>
                @endforelse
            </div>
        </div>
    </div>

</x-app-layout>
