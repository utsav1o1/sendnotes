<?php

use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Models\Note;

new #[Layout('layouts.app')] class extends Component {
    
    public Note $note;
    
    public function mount(Note $note)
    {   
        $this->authorize('update',$note);
        $this->fill($note);
    }

    public function submit(){

        }


}; ?>

<div>
    <div>
       {{$note->name}}
    </div>
</div>
