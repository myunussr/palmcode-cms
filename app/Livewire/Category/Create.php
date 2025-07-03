<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;


#[Layout('layouts.app')]

class Create extends Component
{
    public $name;
    public $description;

    public function goToIndex()
    {
        return redirect()->route('category.index');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
        ]);

        return redirect()->route('category.index');
    }

    public function render()
    {
        return view('livewire.category.create');
    }
}
