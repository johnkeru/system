<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Yajra\Address\Entities\City;
use Yajra\Address\Entities\Region;
use Yajra\Address\Entities\Barangay;
use Yajra\Address\Entities\Province;

class CountryProvinceCityBarangay extends Component
{
    public $regions;
    public $provinces;
    public $cities;
    public $barangay;

    public $selectedRegion = NULL;
    public $selectedProvince = NULL;
    public $selectedCity = NULL;

    public function mount()
    {
        $this->regions = Region::all();
        $this->provinces = collect();
        $this->cities = collect();
        $this->barangay = collect();
    }

    public function render()
    {
        return view('livewire.country-province-city-barangay');
    }

    public function updatedSelectedRegion($regions)
    {
        $this->provinces = Province::where('region_id', $regions)->orderBy('name')->get();
        $this->selectedProvince = NULL;
    }

    public function updatedSelectedProvince($provinces)
    {
        $this->cities = City::where('province_id', $provinces)->orderBy('name')->get();
        $this->selectedCity = NULL;
    }

    public function updatedSelectedCity($cities)
    {
        if(!is_null($cities)) 
        {
            $this->barangays = Barangay::where('city_id', $cities)->orderBy('name')->get();
        }
    }
}
