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
    public $totalPosts, $totalPages, $totalCategories, $totalUsers, $latestPosts, $latestCategories, $latestUsers, $latestPages;

    public int $latestLimit = 2;

    public function mount()
    {
        $this->totalPosts = Post::count();
        $this->totalPages = Page::count();
        $this->totalCategories = Category::count();
        $this->totalUsers = User::count();

        $this->latestPosts = Post::latest()->take($this->latestLimit)->get();
        $this->latestCategories = Category::latest()->take($this->latestLimit)->get();
        $this->latestUsers = User::latest()->take($this->latestLimit)->get();
        $this->latestPages = Page::latest()->take($this->latestLimit)->get();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
