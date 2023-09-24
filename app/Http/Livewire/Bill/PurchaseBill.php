<?php

namespace App\Http\Livewire\Bill;

use App\Models\Bill;
use App\Models\PurchaseBill as ModelsPurchaseBill;
use Livewire\Component;
use Livewire\WithPagination;

class PurchaseBill extends Component
{


    use WithPagination;

    public $bill_purchases = false;
    public $bill_id;


    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.bill.purchase-bill')->with([
            'bills' => ModelsPurchaseBill::paginate(),
            // 'bills' => Bill::where('type', 'فاتورة شراء')->paginate(),
        ]);
    }

    public function showBillPurchases($id)
    {
        $this->bill_id = $id;
        $this->bill_purchases = true;
    }
}
