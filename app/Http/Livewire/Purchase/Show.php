<?php

namespace App\Http\Livewire\Purchase;

use App\Models\Purchase;
use App\Models\PurchaseBill;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    public $bill_id;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function mount($bill_id)
    {
        $this->bill_id = $bill_id;
    }
    public function render()
    {
        return view('livewire.purchase.show')->with([
            'bill' => PurchaseBill::whereId($this->bill_id)->first(),
            'purchases' => Purchase::where('bill_id', $this->bill_id)->get()
        ]);
    }
}
