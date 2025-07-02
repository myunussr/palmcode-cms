<?php

namespace App\Livewire\Post;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Post;
use Livewire\WithFileUploads;

#[Layout('layouts.app')]

class Edit extends Component
{
    use WithFileUploads;

    public $post, $title, $content, $excerpt, $status, $image, $imagePreview;

    public function mount(Post $post)
    {
        $this->post         = $post;
        $this->title        = $post->title;
        $this->content      = $post->content;
        $this->excerpt      = $post->excerpt;
        $this->status       = $post->status;
        $this->imagePreview = $post->image ? asset('storage/' . $post->image) : null;
    }

    public function update()
    {
        $this->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:255',
            'status'  => 'required|in:draft,published',
            'image'   => 'nullable|image|max:2048',
        ]);

        if ($this->image) {
            $path = $this->image->store('posts', 'public');
            $this->post->image = $path;
        }

        $this->post->title     = $this->title;
        $this->post->content   = $this->content;
        $this->post->excerpt   = $this->excerpt;
        $this->post->status    = $this->status;

        $this->post->save();

        session()->flash('success', 'Post updated successfully.');
        return redirect()->route('post.index');
    }

    public function render()
    {
        return view('livewire.post.edit');
    }
}
