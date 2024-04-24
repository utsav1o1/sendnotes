<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

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



require __DIR__ . '/auth.php';
