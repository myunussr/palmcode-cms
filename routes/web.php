<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Post\Index;
use App\Livewire\Post\Create;
use App\Livewire\Post\Edit;
use App\Livewire\PostShow;
use App\Livewire\PageShow;
use App\Livewire\Dashboard;
use App\Livewire\Home;
use App\Livewire\Category\Index as CategoryIndex;
use App\Livewire\Category\Create as CategoryCreate;
use App\Livewire\Category\Edit as CategoryEdit;
use App\Livewire\Page\Index as PageIndex;
use App\Livewire\Page\Create as PageCreate;
use App\Livewire\Page\Edit as PageEdit;


Route::get('/', Home::class)->name('home');
Route::get('/posts/{slug}', PostShow::class)->name('post.view');
Route::get('/pages/{slug}', PageShow::class)->name('page.view');



Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/', CategoryIndex::class)->name('category.index');
        Route::get('/create', CategoryCreate::class)->name('category.create');
        Route::get('/{category}/edit', CategoryEdit::class)->name('category.edit');
    });

    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    Route::prefix('posts')->group(function () {
        Route::get('/', Index::class)->name('post.index');
        Route::get('/create', Create::class)->name('post.create');
        Route::get('/{post}/edit', Edit::class)->name('post.edit');
    });

    Route::prefix('pages')->group(function () {
        Route::get('/', PageIndex::class)->name('page.index');
        Route::get('/create', PageCreate::class)->name('page.create');
        Route::get('/{page}/edit', PageEdit::class)->name('page.edit');
    });
});


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
