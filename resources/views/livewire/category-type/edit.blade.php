<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;">{{ __('category_type_trans.edit') }}</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form wire:submit.prevent="submit" method="POST">
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <label for="name" class="mr-sm-2">{{ __('category_type_trans.type-input') }}
                            :</label>
                        <input id="name" type="text" wire:model="name"
                            class="form-control @error('name') border border-danger @enderror">
                        @error('name')
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
