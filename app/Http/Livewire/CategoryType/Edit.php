<?php

namespace App\Http\Livewire\CategoryType;

use App\Models\CategoryType;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Edit extends Component
{
    public function render()
    {
        return view('livewire.category-type.edit');
    }
    public $name;
    public $categoryTypeId;


    public function mount($categoryTypeId)
    {
        $this->categoryTypeId = $categoryTypeId;
        $category = CategoryType::whereId($categoryTypeId)->first();
        $this->name = $category->name;
    }

    function rules()
    {
        return [
            'name' => 'required|min:3|max:255|unique:category_types,name,' . $this->categoryTypeId,
        ];
    }

    protected $messages = [
        '*.required' => 'يرجى ادخال البيانات',
        '*.unique' => 'هذا الاسم مسجل مسبقاً',
        '*.min' => 'لا بد ان يكون اقل عدد من الحروف :min',
        '*.max' => 'لا بد ان يكون اكثر عدد من الحروف :max',
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
            CategoryType::whereId($this->categoryTypeId)->update([
                'name' => $this->name,
            ]);
            DB::commit();
            toastr()->success('تم تعديل البيانات بنجاح');
            // $this->emptyInputs();
            $this->emit('hideModal');
            $this->emit('refreshIndexTable');
        } catch (\Exception $e) {
            DB::rollback();
            toastr()->error($e->getMessage());
            $this->emit('hideModal');
        }
    }

    public function emptyInputs()
    {
        $this->name = null;
    }
}
