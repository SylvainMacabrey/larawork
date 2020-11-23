<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight flex-1">
                {{ __('Mes missions') }}
            </h2>
            <livewire:search />
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div class="mt-8 text-2xl">{{ $job->title }}</div>
                </div>
                <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
                    <div class="p-6 border-t border-gray-200">
                        <div class="ml-12">
                            <div class="mt-2 text-sm text-gray-500">
                                <p>{{ $job->description }}</p>
                                <div class="flex items-center">
                                    <span class="h-2 w-2 bg-green-300 rounded-full mr-1"></span>
                                    <span class="text-sm text-gray-600">{{ number_format($job->price / 100, 2, ',',  ' ') }} €</span>
                                </div>
                                <p>Proposé par : {{ $job->user->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section x-data="{open: false}">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a class="text-green-500" href="#" @click="open = !open">Cliquer ici pour soumettre une candidature</a>
            <form x-show="open" method="POST" action="{{ route('proposal.store', $job) }}">
                @csrf
                <textarea class="p-3 font-thin w-full max-w-md" name="content"></textarea>
                <button class="bg-indigo-400 block text-white px-6 py-2 mt-3 w-full max-w-md" style="--tw-bg-opacity: 1;
                background-color: rgba(129, 140, 248, var(--tw-bg-opacity));">Soumettre</button>
            </form>
        </div>
    </section>

</x-app-layout>
