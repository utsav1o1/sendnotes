<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <x-button secondary icon="arrow-left" class="mb-12" href="{{route('notes')}}">All Notes</x-button>
            <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                <livewire:notes.create-note />
            </div>
        </div>
    </div>
</x-app-layout>
