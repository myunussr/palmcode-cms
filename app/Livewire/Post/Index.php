<?php

namespace App\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;



#[Layout('layouts.app')]
class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function delete($id)
    {
        $post = Post::findOrFail($id);

        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();

        session()->flash('success', 'Post deleted successfully.');
    }

    public function render()
    {
        return view('livewire.post.index', [
            'posts' => Post::latest()->get()
        ]);
    }
}
