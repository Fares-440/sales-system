<?php

namespace App\Http\Livewire\CategoryType;

use App\Models\CategoryType;
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
        return view('livewire.category-type.index')->with([
            'categories' => CategoryType::paginate(),
        ]);
    }
}
