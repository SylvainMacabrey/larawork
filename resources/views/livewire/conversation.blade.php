<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-8 text-2xl">Mission : {{ $conversation->job->title }}</div>
                </div>
                <div class="bg-gray-200 bg-opacity-25">
                    <div class="p-6 border-t border-gray-200">
                        <div class="mt-2 text-sm text-gray-500 max-w-1/2 w-1/2 mx-auto">
                            @foreach($conversation->messages as $message)
                                <div class="rounded-lg mb-4 py-3 px-6 mb-2 font-medium {{ $message->user->id === auth()->user()->id  ? 'bg-gray-500 text-white mr-auto max-w-1/2 w-1/2' : 'ml-auto bg-gray-800 text-white max-w-1/2 w-1/2'}}" style="{{ $message->user->id === auth()->user()->id ? 'margin-right: 50%' : 'margin-left: 50%' }}">
                                    <p class="font-light">{{ $message->user->id === auth()->user()->id  ? 'Vous avez dit : ' : $message->user->name . ' a dit :'}}</p>
                                    <p>{{ $message->content }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <textarea wire:keydown.enter.prevent="sendMessage" wire:model="message" class="border rounded px-3 py-4 mt-3 mb-5 shadow-md w-full" placeholder="Votre message ..."></textarea>
        </div>
    </div>
</div>

