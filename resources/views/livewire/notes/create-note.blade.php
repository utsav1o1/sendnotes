<?php

use Livewire\Volt\Component;

new class extends Component {
    public $noteName;
    public $noteDescription;
    public $noteRecipient;
    public $noteSendDate;

    public function submit()
    {
        $validate = $this->validate([
            'noteName' => ['required', 'string', 'min:5'],
            'noteDescription' => ['required', 'string', 'min:20'],
            'noteRecipient' => ['required', 'email'],
            'noteSendDate' => ['required', 'date'],
        ]);

        auth()->user()->notes()->create([
            'name'=>$this->noteName,
            'description'=>$this->noteDescription,
            'recipient'=>$this->noteRecipient,
            'send_date'=>$this->noteSendDate,
            'is_published'=>true,
            
    ]);
    redirect(route('notes'));
    }
}; ?>

<div>
    <form wire:submit='submit' class="space-y-4">
        <x-input wire:model="noteName" label="Title" placeholder="It's been a Great Day." />
        <x-textarea wire:model="noteDescription" label="Your Note"
            placeholder="Share all your thoughts with your Friend." />
        <x-input icon="user" wire:model="noteRecipient" label="Recipient" placeholder="Yourfriend@gmail.com"
            type="email" />
        <x-input icon="calendar" wire:model="noteSendDate" type="date" label="Send Date" />

        <div class="pt-4">
            <x-button primary right-icon="calendar" spinner>Schedule Note</x-button>
        </div>
        <x-errors />
    </form>
</div>
