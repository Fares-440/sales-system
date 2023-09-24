<?php

namespace App\Http\Livewire\Supplier;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Create extends Component
{
    public $supplier;
    public $name;
    public $phone;
    public $street;
    public $city;
    public $states = [];
    public $cities = [];

    public function mount(Supplier $supplier)
    {
        $this->supplier = $supplier;
    }

    public function render()
    {
        return view('livewire.supplier.create')->with([
            "countries" => Country::get()
        ]);
    }

    function rules()
    {
        return [
            'name' => 'required|min:3|max:255|unique:suppliers,name,' . $this->supplier->id,
            'phone' => 'required|numeric|digits:9',
            'street' => 'required|max:255',
            'city' => 'required',
        ];
    }

    protected $messages = [
        '*.required' => 'يرجى ادخال البيانات',
        '*.unique' => 'هذا الاسم مسجل مسبقاً',
        '*.min' => 'لا بد ان يكون اقل عدد من الحروف :min',
        '*.max' => 'لا بد ان يكون اكثر عدد من الحروف :max',
        'phone.required' => 'يرجى ادخال رقم التلفون',
        'phone.numeric' => 'يرجى من ادخال رقم صحيح',
        'phone.digits' => 'يرجى ادخال عدد  الارقام :digits',
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
            Supplier::create([
                'name' => $this->name,
                'phone' => $this->phone,
                'street' => $this->street,
                'city_id' => $this->city,
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
        $this->phone = null;
        $this->street = null;
        $this->city = null;
    }
    // this code for selected change
    public  function setCountryId($country)
    {
        $this->states = State::where("country_id", $country)->get();
        $this->cities = [];
        $this->city = null;
    }
    public  function setStateId($state)
    {
        $this->cities = City::where("state_id", $state)->get();
    }
}
