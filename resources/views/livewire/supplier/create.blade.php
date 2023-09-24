<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;">{{ __('supplier_trans.add') }}</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form wire:submit.prevent="submit" method="POST">
            <div class="modal-body">
                <!-- add_form -->
                @csrf
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <label for="name" class="mr-sm-2">{{ __('supplier_trans.name-input') }}
                            :</label>
                        <input id="name" type="text" wire:model="name"
                            class="form-control @error('name') border border-danger @enderror">
                        @error('name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <label for="phone" class="mr-sm-2">{{ __('supplier_trans.phone-input') }}
                            :</label>
                        <input id="phone" type="text"
                            class="form-control  @error('phone') border border-danger @enderror" wire:model="phone">
                        @error('phone')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col-sm-12 col-md-6">
                        <label for="street" class="mr-sm-2">{{ __('supplier_trans.street-input') }}
                            :</label>
                        <input id="street" type="text"
                            class="form-control  @error('street') border border-danger @enderror" wire:model="street">
                        @error('street')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <label for="country" class="control-label">{{ __('supplier_trans.country') }}</label>
                        <select wire:change="setCountryId($event.target.value)" id="country" class="custom-select">
                            <option value="" selected disabled>{{ __('supplier_trans.country-select') }}
                            </option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col-sm-12 col-md-6">
                        <label for="state" class="control-label">{{ __('supplier_trans.state') }}</label>
                        <select  wire:change="setStateId($event.target.value)" id="state"
                            class="custom-select">
                            <option value="0" selected disabled>{{ __('supplier_trans.state-select') }}
                            </option>
                            @foreach ($states as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <label for="city" class="control-label">{{ __('supplier_trans.city') }}</label>
                        <select id="city" wire:model="city"
                            class="custom-select  @error('city') border border-danger @enderror">
                            <option value="" selected>{{ __('supplier_trans.city-select') }}
                            </option>
                            @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                        @error('city')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">{{ __('main_trans.close') }}</button>
                <button type="submit" class="btn btn-primary">{{ __('main_trans.store') }}</button>
            </div>
        </form>
    </div>
</div>

