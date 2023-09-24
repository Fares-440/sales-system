<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;">{{ __('store_trans.add') }}</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form wire:submit.prevent="submit" method="POST">
            <div class="modal-body">
                <!-- add_form -->
                @csrf
                <div class="row mb-2">
                    <div class="col-sm-12 col-md-6">
                        <label for="name" class="mr-sm-2">{{ __('category_trans.name') }}
                            :</label>
                        <div class="form-control">
                            {{ $purchase->category->name }}
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-6">
                        <label for="name" class="mr-sm-2">{{ __('category_trans.type') }}
                            :</label>
                        <div class="form-control">
                            {{ $purchase->category->categoryType->name }}
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-12 col-md-6">
                        <label for="name" class="mr-sm-2">{{ __('purchase_trans.amount') }}
                            :</label>
                        <div class="form-control">
                            {{ $purchase->amount }}
                        </div>

                    </div>
                    <div class="col-sm-12 col-md-6">
                        <label for="name" class="mr-sm-2">{{ __('purchase_trans.total_amount') }}
                            :</label>
                        <div class="form-control">
                            {{ $purchase->total() }}
                        </div>
                    </div>
                </div>
                <div class="row mb-2">

                    <div class="col-sm-12 col-md-6">
                        <label for="name" class="mr-sm-2">{{ __('purchase_trans.price_item') }}
                            :</label>
                        <div class="form-control">
                            {{ $purchase->price }}
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <label for="name" class="mr-sm-2">{{ __('purchase_trans.pay_item') }}
                            :</label>
                        <input id="price" type="text" wire:model="price"
                            class="form-control @error('price') border border-danger @enderror">
                        @error('price')
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
