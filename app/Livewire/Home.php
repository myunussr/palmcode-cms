<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]

class Home extends Component
{
    use WithPagination;

    public $selectedCategory = null;

    protected $updatesQueryString = ['selectedCategory'];

    public function updatingSelectedCategory()
    {
        $this->resetPage();
    }

    public function filterByCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
    }

    public function render()
    {
        $posts = Post::with('categories')
            ->where('status', 'published')
            ->when(
                $this->selectedCategory,
                fn($q) =>
                $q->whereHas('categories', fn($q2) => $q2->where('id', $this->selectedCategory))
            )
            ->get();

        return view('livewire.home', [
            'posts' => $posts,
            'categories' => Category::all(),
        ]);
    }
}
