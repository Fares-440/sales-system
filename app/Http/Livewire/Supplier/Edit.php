<?php

namespace App\Http\Livewire\Supplier;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Edit extends Component
{
    public $supplier_id;
    public $name;
    public $phone;
    public $street;
    public $city;
    public $states = [];
    public $cities = [];
    public $country_id;
    public $state_id;
    public $city_id;

    public function mount($supplier_id)
    {
        $this->supplier_id = $supplier_id;
        $supplier = Supplier::whereId($supplier_id)->first();
        $this->name = $supplier->name;
        $this->phone = $supplier->phone;
        $this->street = $supplier->street;
        $this->city = $supplier->city;
        $city = City::whereId($supplier->city_id)->with(['state' => function ($q) {
            $q->with('country')->get();
        }])->first();
        $this->city = $city->id;
        $this->state_id = $city->state->id;
        $this->country_id = $city->state->country->id;
        $this->states =  State::where('country_id', $this->country_id)->get();
        $this->cities =  City::where('state_id', $this->state_id)->get();
    }

    public function render()
    {
        return view('livewire.supplier.edit')->with([
            "countries" => Country::get(),
        ]);
    }

    function rules()
    {
        return [
            'name' => 'required|min:3|max:255|unique:suppliers,name,' . $this->supplier_id,
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
            Supplier::whereId($this->supplier_id)->update([
                'name' => $this->name,
                'phone' => $this->phone,
                'street' => $this->street,
                'city_id' => $this->city,
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
