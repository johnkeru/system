<div>
    <div class="d-flex flex-column mb-7 fv-row">
        <label class="fs-6 fw-bold mb-2">
            <span class="required">Region</span>
        </label>
        <select wire:model="selectedRegion" name="region_id" data-placeholder="Select a Region" class="form-select form-select-solid fw-bolder">
            <option value="">Select a Region</option>
            @foreach ($regions as $region)
            <option value="{{ $region->region_id }}">{{ $region->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="row g-9 mb-7">
        @if (!is_null($selectedRegion))
        <div class="col-md-6 fv-row">
            <label class="fs-6 fw-bold mb-2">
                <span class="required">Provinces</span>
            </label>
            <select wire:model="selectedProvince" name="province_id" data-placeholder="Select a Province" class="form-select form-select-solid fw-bolder">
                <option value="">Select a Province</option>
                @foreach ($provinces as $province)
                <option value="{{ $province->province_id }}">{{ $province->name }}</option>
                @endforeach
            </select>
        </div>
        @endif
        @if (!is_null($selectedProvince))
        <div class="col-md-6 fv-row">
            <label class="fs-6 fw-bold mb-2">
                <span class="required">Cities</span>
            </label>
            <select wire:model="selectedCity" name="city_id" data-placeholder="Select a City" class="form-select form-select-solid fw-bolder">
                <option value="">Select a City</option>
                @foreach ($cities as $city)
                <option value="{{ $city->city_id }}">{{ $city->name }}</option>
                @endforeach
            </select>
        </div>
        @endif
    </div>
    <div class="row g-9 mb-7">
        @if (!is_null($selectedCity))
        <div class="d-flex flex-column mb-7 fv-row">
            <label class="fs-6 fw-bold mb-2">
                <span class="required">Barangay</span>
            </label>
            <select name="barangay_id" data-placeholder="Select a Barangay" class="form-select form-select-solid fw-bolder">
                <option value="">Select a Barangay</option>
                @foreach ($barangays as $barangay)
                <option value="{{ $barangay->id }}">{{ $barangay->name }}</option>
                @endforeach
            </select>
        </div>
        @endif
    </div>
</div>
