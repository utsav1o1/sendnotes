<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Note;

new #[Layout('layouts.app')] class extends Component {
    public Note $note;
    public $noteName;
    public $noteDescription;
    public $noteRecipient;
    public $noteSendDate;
    public $noteIsPublished;

    public function submit()
    {
        
        $validate = $this->validate([
            'noteName' => ['required', 'string', 'min:5'],
            'noteDescription' => ['required', 'string', 'min:20'],
            'noteRecipient' => ['required', 'email'],
            'noteSendDate' => ['required', 'date'],
            'noteIsPublished' => ['required', 'boolean'],
            
        ]);

        $this->note->update([
            'name'=>$this->noteName,
            'description'=>$this->noteDescription,
            'recipient'=>$this->noteRecipient,
            'send_date'=>$this->noteSendDate,
            'is_published'=>$this->noteIsPublished,
            
         ]);

         $this->dispatch('note-saved');
         

        //  redirect(route('notes'));
    }


        public function mount(Note $note)
        {
            $this->authorize('update', $note);
            $this->fill($note);
            $this->noteName = $note->name;
            $this->noteDescription = $note->description;
            $this->noteRecipient = $note->recipient;
            $this->noteSendDate = $note->send_date;
            $this->noteIsPublished = $note->is_published;
        }

        
   
}; ?>

<div>

    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-action-message on="note-saved" class="mb-6" />
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <x-button icon='arrow-left'  negative href="{{route('notes')}}" wire:navigate>Go Back</x-button>
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <form wire:submit='submit' class="space-y-4">
                    <x-input wire:model="noteName" label="Title" placeholder="It's been a Great Day." />
                    <x-textarea wire:model="noteDescription" label="Your Note"
                        placeholder="Share all your thoughts with your Friend." />
                    <x-input icon="user" wire:model="noteRecipient" label="Recipient"
                        placeholder="Yourfriend@gmail.com" type="email" />
                    <x-input icon="calendar" wire:model="noteSendDate" type="date" label="Send Date" />
                    <x-checkbox label="Note Published" wire:model='noteIsPublished' />
                   
                    <div class="pt-4">
                        <x-button primary right-icon="calendar" type="submit"  spinner="submit">Save Note</x-button>
                    </div>
                    <x-errors />
                </form>
            </div>
        </div>
    </div>


</div>
