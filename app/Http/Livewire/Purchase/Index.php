<?php

namespace App\Http\Livewire\Purchase;

use App\Models\Purchase;
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
        return view('livewire.purchase.index')->with([
            'purchases' => Purchase::where('is_storage', 0)->paginate(),
        ]);
    }
}
