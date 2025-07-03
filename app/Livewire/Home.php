<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]

class Home extends Component
{
    use WithPagination;

    public const DEFAULT_PER_PAGE = 5;

    public $perPage = self::DEFAULT_PER_PAGE;

    protected $listeners = ['load-more' => 'loadMore'];

    public function loadMore()
    {
        $this->perPage += self::DEFAULT_PER_PAGE;
    }

    public function render()
    {
        return view('livewire.home', [
            'posts'      => Post::where('status', 'published')->latest()->paginate($this->perPage)
        ]);
    }
}
