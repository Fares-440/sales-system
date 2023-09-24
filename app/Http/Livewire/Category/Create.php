<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use App\Models\CategoryType;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    public $category;
    public $name;
    public $type;


    public function mount(Category $category)
    {
        $this->category = $category;
    }

    public function render()
    {
        return view('livewire.category.create')->with([
            'categoryTypes' => CategoryType::all()
        ]);
    }


    function rules()
    {
        return [
            'name' => 'required|min:3|max:255|unique:categories,name,' . $this->category->id,
            'type' => 'required',
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
            Category::create([
                'name' => $this->name,
                'category_type' => $this->type,
            ]);
            DB::commit();
            toastr()->success('تم اضافة البيانات بنجاح');
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
        $this->type = null;
    }
}
