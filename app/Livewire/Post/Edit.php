<?php

namespace App\Livewire\Post;

use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Post;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.app')]

class Edit extends Component
{
    use WithFileUploads;

    public $post, $title, $content, $excerpt, $status, $image, $imagePreview, $category_ids = [], $allCategories;

    public function goToIndex()
    {
        return redirect()->route('post.index');
    }

    public function mount(Post $post)
    {
        $this->post          = $post;
        $this->title         = $post->title;
        $this->content       = $post->content;
        $this->excerpt       = $post->excerpt;
        $this->status        = $post->status;
        $this->imagePreview  = $post->image ? asset('storage/' . $post->image) : null;
        $this->category_ids  = $post->categories()->pluck('id')->toArray(); // pre-select categories
        $this->allCategories = Category::all();
    }

    public function update()
    {
        $this->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'excerpt' => 'nullable|string|max:255',
            'status'  => 'required|in:draft,published',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'category_ids' => 'array',
            'category_ids.*' => 'exists:categories,id',
        ]);

        if ($this->image) {


            if ($this->post->image && Storage::disk('public')->exists($this->post->image)) {
                Storage::disk('public')->delete($this->post->image);
            }

            $this->post->image = $this->image->store('posts', 'public');
        }

        $this->post->title     = $this->title;
        $this->post->content   = $this->content;
        $this->post->excerpt   = $this->excerpt;
        $this->post->status    = $this->status;

        $this->post->save();

        $this->post->categories()->sync($this->category_ids);

        session()->flash('success', 'Post updated successfully.');

        return redirect()->route('post.index');
    }

    public function render()
    {
        return view('livewire.post.edit');
    }
}
