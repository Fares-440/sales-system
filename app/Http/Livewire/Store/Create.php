<?php

namespace App\Http\Livewire\Store;

use App\Models\Purchase;
use App\Models\Store;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{

    public $purchase;
    public $price;


    public function mount(Purchase $purchase)
    {
        $this->purchase = $purchase;
    }

    public function render()
    {
        return view('livewire.store.create')->with([
            'purchase' => Purchase::whereId($this->purchase)->get()
        ]);
    }

    function rules()
    {
        return [
            'price' => 'required|regex:/^\d*(\.\d{2})?$/',
        ];
    }

    protected $messages = [
        '*.required' => 'يرجى تعبئة الحقل',
        '*.regex' => 'يرجى تعبئة الحقل ببيانات صحيحه',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        // Display an info toast with no title
        $this->validate();
        DB::beginTransaction();
        try {
            DB::commit();
            $store = Store::where('category_id', $this->purchase->category->id)->first();
            if ($store) {
                $store->amount += $this->purchase->amount;
                $store->old_price = $store->new_price;
                $store->new_price = $this->price;
                $store->save();
            } else {
                Store::create([
                    'category_id' => $this->purchase->category->id,
                    'amount' => $this->purchase->amount,
                    'old_price' =>  $this->price,
                    'new_price' => $this->price,
                ]);
            }
            $this->purchase->is_storage = 1;
            $this->purchase->save();
            toastr()->success('تم اضافه الصنف الى المخزن بنجاح');
            // $this->emptyInputs();
            $this->emit('hideModal');
            $this->emit('refreshIndexTable');
        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error($e->getMessage());
            $this->emit('hideModal');
        }
    }
}
