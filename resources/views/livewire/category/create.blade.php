<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;">{{ __('category_trans.add') }}</h5>
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
                        <label for="name" class="mr-sm-2">{{ __('category_trans.name-input') }}
                            :</label>
                        <input id="name" type="text" wire:model="name"
                            class="form-control @error('name') border border-danger @enderror">
                        @error('name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <label for="type" class="control-label">{{ __('category_trans.type') }}</label>
                        <select wire:model="type" id="type" class="custom-select">
                            <option value="" selected>{{ __('category_trans.type-select') }}
                            </option>
                            @foreach ($categoryTypes as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        @error('type')
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
