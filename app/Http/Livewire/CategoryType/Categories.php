<?php

namespace App\Http\Livewire\CategoryType;

use App\Models\Category;
use App\Models\CategoryType;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{

    use WithPagination;

    public $categoryTypeId;

    protected $listeners = [
        'refreshIndexTable' => '$refresh',
    ];

    protected $paginationTheme = 'bootstrap';

    public function mount($id)
    {
        $this->categoryTypeId = $id;
    }

    public function render()
    {
        return view('livewire.category-type.categories')->with([
            'categoryType' => CategoryType::whereId($this->categoryTypeId)->get(),
            'categories' => Category::where('category_type', $this->categoryTypeId)->paginate(),
        ]);
    }
}
