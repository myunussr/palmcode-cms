<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Post\Index;
use App\Livewire\Post\Create;
use App\Livewire\Post\Edit;
use App\Livewire\Dashboard;


Route::view('/', 'welcome');


Route::get('/dashboard', Dashboard::class)->name('dashboard');


Route::get('/posts', Index::class)->name('post.index');
Route::get('/posts/create', Create::class)->name('post.create');
Route::get('/posts/{post}/edit', Edit::class)->name('post.edit');


// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
