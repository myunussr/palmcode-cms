<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;

use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class PostShow extends Component
{
    public string $slug;
    public Post $post;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->post = Post::where('slug', $slug)->firstOrFail();
    }


    public function render()
    {
        return view('livewire.post-show');
    }
}
