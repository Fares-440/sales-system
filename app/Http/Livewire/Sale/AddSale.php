<?php

namespace App\Http\Livewire\Sale;

use App\Models\Store;
use Livewire\Component;

class AddSale extends Component
{

    public $store;
    public $amount;
    public $total = 0;


    public function mount(Store $store)
    {
        $this->store = $store;
    }
    public function render()
    {
        return view('livewire.sale.add-sale')->with([
            'store' => $this->store
        ]);
    }

    function rules()
    {
        return [
            'amount' =>     'required|integer|min:1|max:' . $this->store->amount,
        ];
    }

    protected $messages = [
        '*.required' => 'يرجى ادخال البيانات',
        '*.integer' => 'يرجى تعبئة الحقل ببيانات صحيحه',
        '*.max' => 'يرجى ان لا يتعدى عدد الكمية الموجوده اكثر من :max',
        '*.min' => 'يرجى ان لا يقل العدد اقل من :min'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function sumTotal()
    {
        $this->total = intval($this->amount) * $this->store->new_price;;
    }

    public function submit()
    {
        $this->validate();
        $array = [
            'id' => $this->store->id,
            'name' => $this->store->category->name,
            'type' => $this->store->category->categoryType->name,
            'amount' => $this->amount,
            'total' => $this->total,
            'price' => $this->store->new_price,
        ];
        $this->emit('addProduct', $array);
        $this->emit('hideModal');
        $this->emit('refreshIndexTable');
    }
}
