<?php

namespace App\Http\Livewire\Supplier;

use App\Models\Supplier;
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
        return view('livewire.supplier.index')->with([
            'suppliers' => Supplier::paginate()
        ]);
    }
}
