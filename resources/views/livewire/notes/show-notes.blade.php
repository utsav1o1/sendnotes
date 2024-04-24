<?php

use Livewire\Volt\Component;
use App\Models\Note;

new class extends Component {
    public function with(): array
    {
        return [
            'notes' => Auth::user()->notes()->orderBy('send_date')->get(),
        ];
    }
    
    public function delete($noteId){
        $note = Note::where('id',$noteId)->first();
        $this->authorize('delete',$note);
        $note->delete();
    }
}; ?>

<div>
    <div class="space-y-2">
        @if ($notes->isEmpty())
            <div class="text-center">
                <p class="text-xl font-bold">No Notes Yet</p>
                <p class="text-sm"> Lets create your first note to send.</p>
                <x-button primary right-icon="plus" class="mt-6" href="{{ route('notes.create') }}" wire:navigate>Create Notes</x-button>
            </div>
        @else
        <x-button primary right-icon="plus" class="mb-6" href="{{ route('notes.create') }}" wire:navigate>Create Notes</x-button>
            <div class="grid grid-cols-3 gap-4 mt-6">
                @foreach ($notes as $note)
                    <x-card wire:key='{{ $note->id }}'>
                        <div class="flex justify-between">
                            <div>
                                <a href="{{route('notes.edit',$note->id)}}"
                                    class="text-xl font-bold hover:underline hover:text-blue-500">{{ $note->name }}</a>
                                <p class="mt-2 text-sm">{{Str::limit($note->description,30)}}</p>
                            </div>
                            <div class="text-xs text-gray-500">
                                {{ \Carbon\Carbon::parse($note->send_date)->format('M/d/Y') }}
                            </div>
                        </div>
                        <div class="flex items-end justify-between mt-4 space-x-1">
                            <p class="text-xs">Recipient: <span class="font-semibold">{{ $note->recipient }}</span></p>
                            <div>
                                <x-button.circle icon="eye"></x-button.circle>
                                <x-button.circle icon="trash" wire:click="delete('{{$note->id}}')"></x-button.circle>
                            </div>
                        </div>
                    </x-card>
                @endforeach
            </div>
        @endif
    </div>

</div>
