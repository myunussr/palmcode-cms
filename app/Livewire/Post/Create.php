<?php

namespace App\Livewire\Post;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Create extends Component
{
    use WithFileUploads;

    public $title, $content, $excerpt, $status = 'draft', $published_at, $image, $category_ids = [];

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $post = Post::create([
            'title' => $this->title,
            'slug' => Str::slug($this->title),
            'content' => $this->content,
            'excerpt' => Str::limit(strip_tags($this->content), 150),
            'status' => $this->status,
            'published_at' => $this->status === 'published' ? now() : null,
            'image' => $this->image ? $this->image->store('uploads', 'public') : null,
        ]);

        $post->categories()->sync($this->category_ids);

        session()->flash('message', 'Post created!');
        return redirect()->route('post.index');
    }

    public function render()
    {
        return view('livewire.post.create', [
            'categories' => Category::all(),
        ]);
    }
}
