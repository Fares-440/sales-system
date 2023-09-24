<?php

namespace App\Http\Livewire\CategoryType;

use App\Models\CategoryType;
use Livewire\Component;

class Delete extends Component
{
    public $categoryTypeId;
    public $name;

    public function mount($categoryTypeId, $name)
    {
        $this->categoryTypeId = $categoryTypeId;
        $this->name = $name;
    }


    public function render()
    {
        return view('livewire.category-type.delete');
    }

    public function submit()
    {
        try {
            $categoryType = CategoryType::whereDoesntHave('categories')->whereId($this->categoryTypeId)->exists();
            if ($categoryType) {
                CategoryType::destroy($this->categoryTypeId);
                toastr()->success('تم حذف البيانات بنجاح');
            } else {
                toastr()->error('لا يمكن حذف النوع لانه يحتوي على اصناف');
            }
            $this->emit('hideModal');
            $this->emit('refreshIndexTable');
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            $this->emit('hideModal');
        }
    }
}
