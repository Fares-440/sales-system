<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class Delete extends Component
{
    public $category_id;
    public $name;

    public function mount($category_id, $name)
    {
        $this->category_id = $category_id;
        $this->name = $name;
    }

    public function render()
    {
        return view('livewire.category.delete');
    }

    public function submit()
    {
        try {
            $category = Category::whereDoesntHave('purchases')->whereId($this->category_id)->exists();
            if ($category) {
                Category::destroy($this->category_id);
                toastr()->success('تم حذف البيانات بنجاح');
            } else {
                toastr()->error('لا يمكن حذف الصنف لانه يحتوي على مشتريات');
            }
            $this->emit('hideModal');
            $this->emit('refreshIndexTable');
        } catch (\Exception $e) {
            toastr()->error($e->getMessage());
            $this->emit('hideModal');
        }
    }
}
