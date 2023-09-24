<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;">{{ __('sale_trans.edit') }}</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form wire:submit.prevent="submit" method="POST">
            <div class="modal-body">
                <!-- add_form -->
                <div class="row mb-2">
                    <div class="col-sm-12 col-md-6">
                        <label for="name" class="mr-sm-2">{{ __('category_trans.name') }}
                            :</label>
                        <div class="form-control">
                            {{ $store->category->name }}
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-6">
                        <label for="name" class="mr-sm-2">{{ __('category_trans.type') }}
                            :</label>
                        <div class="form-control">
                            {{ $store->category->categoryType->name }}
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-12 col-md-6">
                        <label for="name" class="mr-sm-2">{{ __('purchase_trans.price_item') }}
                            :</label>
                        <div class="form-control">
                            {{ $store->new_price }}
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <label for="name" class="mr-sm-2">{{ __('purchase_trans.amount') }}
                            :</label>
                        <div class="form-control">
                            {{ $store->amount }}
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-12 col-md-6">
                        <label for="name" class="mr-sm-2">{{ __('purchase_trans.total_amount') }}
                            :</label>
                        <div class="form-control">
                            {{ $total }}
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <label for="name" class="mr-sm-2">{{ __('sale_trans.amount') }}
                            :</label>
                        <input id="amount" type="text" wire:model="amount" wire:keyup="sumTotal($event.target.value)"
                            class="form-control @error('amount') border border-danger @enderror">
                        @error('amount')
                            <span class="error">{{ $message }}</span>
                        @enderror
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
