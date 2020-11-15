<div class="p-6 border-t border-gray-200">
    <div class="flex items-center">
        <button class="focus:outline-none" wire:click="like">
            <svg xmlns="http://www.w3.org/2000/svg" fill="{{ $job->isLiked() ? 'currentColor' : 'none' }}" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8 text-gray-400">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
            </svg>
        </button>
        <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">{{ $job->title }}</div>
    </div>
    <div class="ml-12">
        <div class="mt-2 text-sm text-gray-500">
            <p>{{ $job->description }}</p>
            <div class="flex items-center">
                <span class="h-2 w-2 bg-green-300 rounded-full mr-1"></span>
                <span class="text-sm text-gray-600">{{ number_format($job->price / 100, 2, ',',  ' ') }} €</span>
            </div>
        </div>
        <a href="{{ route('job.show', $job) }}">
            <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                <div>Voir la mission</div>
                <div class="ml-1 text-indigo-500">
                    <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </div>
            </div>
        </a>
    </div>
</div>
