<?php

namespace App\Http\Livewire\Sale;

use App\Models\Store;
use Livewire\Component;

class EditSale extends Component
{

    public $store;
    public $amount;
    public $total = 0;
    public $index;

    public function mount(Store $store, $amount, $index)
    {
        $this->store = $store;
        $this->amount = $amount;
        $this->index = $index;
        $this->total = $store->new_price * $amount;
    }

    public function render()
    {
        return view('livewire.sale.edit-sale')->with([
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
            'amount' => $this->amount,
            'total' => $this->total,
        ];
        $this->emit('editProduct', $this->index, $array);
        $this->emit('hideModal');
    }
}
