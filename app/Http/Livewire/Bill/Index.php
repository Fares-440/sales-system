<?php

namespace App\Http\Livewire\Bill;

use App\Models\Bill;
use App\Models\PurchaseBill;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    use WithPagination;

    public $bill_purchases = false;
    public $bill_id;


    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.bill.index')->with([
            // 'bills' => Bill::paginate(),
            'bills' => PurchaseBill::paginate(),
        ]);
    }

    public function showBillPurchases($id)
    {
        $this->bill_id = $id;
        $this->bill_purchases = true;
    }
}
