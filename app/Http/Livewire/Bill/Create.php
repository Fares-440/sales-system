<?php

namespace App\Http\Livewire\Bill;

use App\Models\Category;
use App\Models\CategoryType;
use App\Models\Purchase;
use App\Models\PurchaseBill;
use App\Models\Store;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    public $supplier;
    public $supplier_name;
    public $categoryType_id;
    public $category_type_name;
    public $categories = [];
    public $category_id;
    public $category_name;
    public $amount = 1;
    public $price;
    public $purchases  = [];
    public $total = 0;
    public $item_id;
    public $add_item = true;
    public $showSupplier = true;

    protected $listeners = [
        'refreshIndexTable' => '$refresh',
        'setcategoryTypeId' => 'edit',
    ];



    public function render()
    {
        return view('livewire.bill.create')->with([
            'categoryTypes' => CategoryType::all(),
            'purchases' => $this->purchases,
            'suppliers' => Supplier::all(),
        ]);
    }

    public function addSupplier()
    {
        $this->validate(['supplier' => 'required'], [
            'supplier.required' => 'يرجى اختيار المورد'
        ]);
        $this->supplier_name = Supplier::where('id', $this->supplier)->pluck('name');
        $this->showSupplier = false;
    }

    public function add()
    {
        $this->validate([
            'category_id' => 'required',
            'categoryType_id' => 'required',
            'price' => 'required|regex:/^\d*(\.\d{2})?$/',
            'amount' => 'required|integer|min:1',
        ], [
            '*.required' => 'يرجى تعبئة الحقل',
            '*.regex' => 'يرجى تعبئة الحقل ببيانات صحيحه',
            '*.max' => 'يرجى ان لا يتعدى طول الحقل اكثر من :max',
            '*.min' => 'يرجى ان لا يقل طول الحقل من :min'
        ]);

        $array = [
            "categoryType_id" => $this->categoryType_id,
            "category_type_name" => $this->category_type_name[0],
            "category_id" => $this->category_id,
            "category_name" => $this->category_name[0],
            "supplier" => $this->supplier_name[0],
            "price" => $this->price,
            "amount" => $this->amount,
            "total_amount" => $this->price * $this->amount,
        ];
        array_push($this->purchases, $array);
        $this->total();
        $this->clearInputs();
    }

    public function delete($id)
    {
        unset($this->purchases[$id]);
        $this->total();
        // $this->emit('refreshIndexTable');
    }
    public function edit($id)
    {
        $this->add_item = false;
        $this->item_id = $id;
        $this->price = $this->purchases[$id]['price'];
        $this->amount = $this->purchases[$id]['amount'];
        $this->category_id = $this->purchases[$id]['category_id'];
        $this->category_name = $this->purchases[$id]['category_name'];
        $this->categoryType_id = $this->purchases[$id]['categoryType_id'];
        $this->category_type_name = $this->purchases[$id]['category_type_name'];
        $this->setcategoryTypeId($this->categoryType_id);
    }

    public function update()
    {
        $this->validate([
            'category_id' => 'required',
            'categoryType_id' => 'required',
            'price' => 'required|regex:/^\d*(\.\d{2})?$/',
            'amount' => 'required|integer|min:1',
        ], [
            '*.required' => 'يرجى تعبئة الحقل',
            '*.regex' => 'يرجى تعبئة الحقل ببيانات صحيحه',
            '*.max' => 'يرجى ان لا يتعدى طول الحقل اكثر من :max',
            '*.min' => 'يرجى ان لا يقل طول الحقل من :min'
        ]);
        $this->purchases[$this->item_id]['price'] = $this->price;
        $this->purchases[$this->item_id]['amount'] = $this->amount;
        $this->purchases[$this->item_id]['category_id'] = $this->category_id;
        $this->purchases[$this->item_id]['category_name'] = is_string($this->category_name) ? $this->category_name : $this->category_name[0];
        $this->purchases[$this->item_id]['categoryType_id'] = $this->categoryType_id;
        $this->purchases[$this->item_id]['category_type_name'] = is_string($this->category_type_name) ? $this->category_type_name : $this->category_type_name[0];
        $this->purchases[$this->item_id]['total_amount'] = $this->price * $this->amount;
        $this->total();
        $this->clearInputs();
        $this->add_item = true;
    }
    public function total()
    {
        $this->total = 0;
        foreach ($this->purchases as $purchase) {
            $this->total += ($purchase['price'] * $purchase['amount']);
        }
    }
    public function setcategoryTypeId($id)
    {
        $this->category_type_name = CategoryType::whereId($id)->get()->pluck('name');
        $this->categories = Category::where('category_type', $id)->get();
    }
    public function setcategoryId($id)
    {
        $this->category_id = $id;
        $this->category_name = Category::whereId($id)->get()->pluck('name');
    }

    public function back()
    {
        $this->showSupplier = true;
    }

    public function clearInputs()
    {
        $this->name = "";
        $this->price = "";
        $this->amount = 1;
        $this->category_id = "";
        $this->category_name = "";
        $this->categoryType_id = "";
        $this->category_type_name = "";
    }

    public function save()
    {
        DB::beginTransaction();
        try {
            $bill = new PurchaseBill();
            $bill->supplier_id = $this->supplier;
            $bill->user_id = auth()->id();
            // $bill->type = "فاتورة شراء";
            $bill->total = $this->total;
            $bill->save();
            foreach ($this->purchases as $purchase) {
                Purchase::create([
                    'bill_id' => $bill->id,
                    'category_id' => $purchase['category_id'],
                    'price' => $purchase['price'],
                    'amount' => $purchase['amount']
                ]);
            }
            $this->purchases = [];
            $this->total = 0;
            DB::commit();
            toastr()->success('تم اضافة البيانات بنجاح');
        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error($e->getMessage());
        }
    }
}
