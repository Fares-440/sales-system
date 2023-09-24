<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $listeners = [
        'refreshIndexTable' => '$refresh',
    ];

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.category.index')->with([
            'categories' => Category::paginate(),
        ]);
    }
}
