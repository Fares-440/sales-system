<?php

namespace App\Http\Livewire\CategoryType;

use App\Models\CategoryType;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    public $categoryType;
    public $name;


    public function mount(CategoryType $categoryType)
    {
        $this->categoryType = $categoryType;
    }
    public function render()
    {
        return view('livewire.category-type.create');
    }


    function rules()
    {
        return [
            'name' => 'required|min:3|max:255|unique:category_types,name,' . $this->categoryType->id,
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
            CategoryType::create([
                'name' => $this->name,
            ]);
            DB::commit();
            toastr()->success('تم اضافة البيانات بنجاح');
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
