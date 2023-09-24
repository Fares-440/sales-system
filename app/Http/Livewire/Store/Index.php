<?php

namespace App\Http\Livewire\Store;

use App\Models\Store;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        return view('livewire.store.index')->with([
            'stores' => Store::paginate()
        ]);
    }
}
