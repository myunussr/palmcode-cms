<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class Edit extends Component
{
    public $categoryId;
    public $name;

    public function mount(Category $category)
    {
        $this->categoryId = $category->id;
        $this->name = $category->name;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::findOrFail($this->categoryId)->update([
            'name' => $this->name,
        ]);

        session()->flash('success', 'Category updated successfully!');
        return redirect()->route('category.index');
    }

    public function goToIndex()
    {
        return redirect()->route('category.index');
    }

    public function render()
    {
        return view('livewire.category.edit');
    }
}
