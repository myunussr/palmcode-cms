<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;



#[Layout('layouts.app')]
class Index extends Component
{
    use WithPagination;

    protected $listeners = ['categoryCreated' => '$refresh'];


    public function delete($id)
    {
        Category::findOrFail($id)->delete();

        session()->flash('success', 'Category deleted successfully.');
    }

    public function render()
    {
        return view('livewire.category.index', [
            'categories' => Category::latest()->paginate(5)
        ]);
    }
}
