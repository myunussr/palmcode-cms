<?php

namespace App\Livewire\Page;

use App\Models\Page;
use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]
class Edit extends Component
{
    public $page;
    public $title, $slug, $body, $status;

    public function goToIndex()
    {
        return redirect()->route('page.index');
    }

    public function mount(Page $page)
    {
        $this->page = $page;
        $this->title = $page->title;
        $this->slug = $page->slug;
        $this->body = $page->body;
        $this->status = $page->status;
    }

    public function update()
    {
        $this->validate([
            'title'  => 'required|string|max:255',
            'slug' => 'required|string|unique:pages,slug,' . $this->page->id,
            'body'   => 'required|string',
            'status' => 'required|in:draft,published',
        ]);

        $this->page->update([
            'title' => $this->title,
            'slug' => $this->slug,
            'body' => $this->body,
            'status' => $this->status,
        ]);

        return redirect()->route('page.index')->with('success', 'Page updated successfully.');
    }

    public function render()
    {
        return view('livewire.page.edit');
    }
}
