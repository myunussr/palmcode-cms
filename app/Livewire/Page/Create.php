<?php

namespace App\Livewire\Page;

use Livewire\Component;
use App\Models\Page;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Create extends Component
{
    public $title, $slug, $body, $status = 'draft';

    public function goToIndex()
    {
        return redirect()->route('page.index');
    }

    public function store()
    {
        $this->validate([
            'title'  => 'required|string|max:255',
            'slug'   => 'required|regex:/^[a-z0-9]+(?:-[a-z0-9]+)*$/|unique:pages,slug',
            'body'   => 'required|string',
            'status' => 'required|in:draft,published',
        ]);

        Page::create([
            'title'  => $this->title,
            'slug'   => $this->slug,
            'body'   => $this->body,
            'status' => $this->status,
        ]);

        return redirect()->route('page.index')->with('success', 'Page created successfully.');
    }

    public function render()
    {
        return view('livewire.page.create');
    }
}
