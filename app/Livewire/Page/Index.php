<?php

namespace App\Livewire\Page;

use Livewire\Component;
use App\Models\Page;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]
class Index extends Component
{
    public function delete($id)
    {
        Page::findOrFail($id)->delete();

        session()->flash('success', 'Page deleted successfully.');
    }

    public function render()
    {
        return view('livewire.page.index', [
            'pages' => Page::latest()->paginate(3)
        ]);
    }
}
