<?php

namespace App\Livewire\Page;

use Livewire\Component;
use App\Models\Page;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]
class Index extends Component
{
    public $pages;

    public function mount()
    {
        $this->pages = Page::latest()->get();
    }

    public function delete($id)
    {
        Page::findOrFail($id)->delete();

        $this->pages = Page::latest()->get();

        session()->flash('success', 'Page deleted successfully.');
    }

    public function render()
    {
        return view('livewire.page.index');
    }
}
