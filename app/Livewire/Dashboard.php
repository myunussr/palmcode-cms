<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Page;
use App\Models\Category;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]

class Dashboard extends Component
{
    public $totalPosts;
    public $totalPages;
    public $totalCategories;
    public $totalUsers;

    public function mount()
    {
        $this->totalPosts = Post::count();
        $this->totalPages = Page::count();
        $this->totalCategories = Category::count();
        $this->totalUsers = User::count();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
