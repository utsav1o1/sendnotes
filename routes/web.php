<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Models\Note;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('notes', 'notes.index')
    ->middleware(['auth'])
    ->name('notes');

Route::view('notes/create', 'notes.create')
    ->middleware(['auth'])
    ->name('notes.create');

Volt::route('notes/{note}/edit', 'notes.edit-notes')
     ->middleware(['auth'])
     ->name('notes.edit');
Route::get('notes/{note}', function (Note $note) {
   
    if(! $note->is_published)  {
            abort(404);

    }

    $user = $note->user;

    return view('notes.view', ['user'=> $user, 'note'=> $note]);

})->name('note.view');


require __DIR__ . '/auth.php';
