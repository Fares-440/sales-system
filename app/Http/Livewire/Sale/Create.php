<?php

namespace App\Http\Livewire\Sale;

use App\Models\Sale;
use App\Models\SaleBill;
use App\Models\Store;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Create extends Component
{

    use WithPagination;
    public $products = [];
    public $total = 0;
    public $customerName;
    public $phone;
    protected $listeners = [
        'refreshIndexTable' => '$refresh',
        'addProduct' => 'add',
        'editProduct' => 'edit'
    ];

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.sale.create')->with([
            'stores' => Store::paginate(5),
            'products' => $this->products
        ]);
    }

    public function searchPrudcut($id)
    {
        $isFind = in_array($id, array_column($this->products, 'id'));
        if ($isFind) {
            toastr()->error('<strong>تم اضافة الصنف مسبقاْ في الفاتوره !!</strong>');
        } else {
            $this->emit('showModal', 'sale.add-sale', $id);
        }
    }

    public function add($array)
    {
        array_push($this->products, $array);
        $this->total();
    }
    public function delete($id)
    {
        unset($this->products[$id]);
        $this->total();
        // $this->emit('refreshIndexTable');
    }


    public function edit($id, $data)
    {
        $this->products[$id]['amount'] = $data['amount'];
        $this->products[$id]['total'] = $data['total'];
        $this->total();
    }


    public function total()
    {
        $this->total = 0;
        foreach ($this->products as $product) {
            $this->total += ($product['price'] * $product['amount']);
        }
    }

    public function sumbit()
    {
        $this->validate([
            'customerName' => 'required|max:255',
        ], [
            '*.required' => 'يرجى تعبئة الحقل',
            '*.max' => 'يرجى ان لا يتعدى طول الحقل اكثر من :max',
        ]);

        DB::beginTransaction();
        try {
            $bill = new SaleBill();
            $bill->customer_name = $this->customerName;
            $bill->money = $this->total;
            $bill->price = $this->total;
            // $bill->total = $this->total;
            $bill->save();
            foreach ($this->products as $product) {
                Sale::create([
                    'bill_id' => $bill->id,
                    'category_id' => $product['id'],
                    'price' => $product['price'],
                    'amount' => $product['amount']
                ]);
            }
            $this->products = [];
            $this->total = 0;
            DB::commit();
            toastr()->success('تم اضافة البيانات بنجاح');
        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error($e->getMessage());
        }
    }
}
