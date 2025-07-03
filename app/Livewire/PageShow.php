<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Page;

use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class PageShow extends Component
{
    public string $slug;
    public Page $page;

    public function mount($slug)
    {
        $this->slug = $slug;
        $this->page = Page::where('slug', $slug)->firstOrFail();
    }


    public function render()
    {
        return view('livewire.page-show');
    }
}
