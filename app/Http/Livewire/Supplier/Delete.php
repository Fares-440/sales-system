<?php

namespace App\Http\Livewire\Supplier;

use App\Models\Supplier;
use Livewire\Component;

class Delete extends Component
{
    public $supplier_id;
    public $name;
    public function mount($supplier_id, $name)
    {
        $this->supplier_id = $supplier_id;
        $this->name = $name;
    }
    public function render()
    {
        return view('livewire.supplier.delete');
    }

    public function submit()
    {
        try {
            $supplier_id = Supplier::whereDoesntHave('bills')->whereId($this->supplier_id)->exists();
            if ($supplier_id) {
                Supplier::destroy($this->supplier_id);
                toastr()->success('تم حذف البيانات بنجاح');
            } else {
                toastr()->error('لا يمكن حذف المورد لانه يملك  فواتير');
            }
            $this->emit('hideModal');
            $this->emit('refreshIndexTable');
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            $this->emit('hideModal');
        }
    }
}
