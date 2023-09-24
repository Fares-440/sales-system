<div>
    @section('PageTitle')
        {{ trans('purchase_trans.purchase_create') }}
    @endsection
    @section('title')
        {{ trans('purchase_trans.purchase_create') }}
    @endsection
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    @if ($showSupplier)
                        <form wire:submit.prevent="addSupplier" class="row pb-2 flex align-items-center">
                            <div class="col-1">
                                <button type="submit" class="btn btn-danger x-small">اضافة</button>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <label for="supplier"
                                    class="control-label">{{ __('purchase_trans.supplier_id') }}</label>
                                <select wire:model="supplier" id="supplier" class="custom-select h-50 nice-scrollbar">
                                    <option value="" selected>
                                        {{ __('purchase_trans.supplier_id-select') }}
                                    </option>
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                                @error('supplier')
                                    <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </form>
                    @else
                        <div class="col-xl-12 pb-2 fa-2x">
                            فاتورة شراء من التاجر \ {{ $supplier_name[0] }}
                        </div>
                        <button type="button" class="btn btn-dark x-small" wire:click="back">
                            {{ __('main_trans.back') }}
                        </button>
                        <form wire:submit.prevent=" @if ($add_item) add @else update @endif"
                            class="">
                            <fieldset class="row pb-2 pt-4 mt-5 mb-3 mr-2 ml-2">
                                <legend>البيانات:</legend>
                                <div class="col-sm-12 col-md-4 mb-2">
                                    <label for="categoryTypes"
                                        class="mr-sm-2 custom-font">{{ __('category_trans.type') }}</label>
                                    <select wire:model="categoryType_id"  wire:change="setcategoryTypeId($event.target.value)" id="categoryType_id"
                                        class="custom-select h-50 nice-scrollbar">
                                        <option value="" selected>
                                            {{ __('category_trans.type-select') }}
                                        </option>
                                        @foreach ($categoryTypes as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-4 mb-2">
                                    <label for="category"
                                        class="mr-sm-2 custom-font">{{ __('purchase_trans.category_id') }}</label>
                                    <select wire:model="category_id" wire:change="setcategoryId($event.target.value)"
                                        id="category" class="custom-select h-50 nice-scrollbar">
                                        <option value="" selected>
                                            {{ __('purchase_trans.category_id-select') }}
                                        </option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-4 mb-2">
                                    <label for="price"
                                        class="mr-sm-2 custom-font">{{ __('purchase_trans.price') }}
                                        :</label>
                                    <input id="price" type="text" wire:model="price"
                                        class="form-control @error('price') border border-danger @enderror">
                                    @error('price')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-4 mb-2">
                                    <label for="amount"
                                        class="mr-sm-2 custom-font">{{ __('purchase_trans.amount') }}
                                        :</label>
                                    <input id="amount" type="text" wire:model="amount"
                                        class="form-control @error('amount') border border-danger @enderror">
                                    @error('amount')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-sm-12 col-md-4 mb-2">
                                    <label for="total"
                                        class="mr-sm-2 custom-font">{{ __('purchase_trans.total') }}
                                        :</label>
                                    <div class="form-control">
                                        {{ $total }}
                                    </div>
                                </div>
                                <div class="col-12 pt-2">
                                    <button type="submit"
                                        class="btn @if ($add_item) btn-primary @else btn-success @endif ">
                                        @if ($add_item)
                                            {{ __('purchase_trans.add-item') }}@else{{ __('purchase_trans.edit-item') }}
                                        @endif
                                    </button>
                                    @if (!empty($purchases) && $add_item)
                                        <button type="button" wire:click="save" class="btn btn-success">
                                            {{ __('main_trans.store') }}
                                        </button>
                                    @endif
                                </div>
                            </fieldset>
                        </form>
                        <div style="border-top: 3px dashed #ddd"></div>
                        <div class="table-responsive mt-3 nice-scrollbar" style="max-height:400px">
                            <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                data-page-length="50" style="text-align: center">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>#</th>
                                        <th>{{ trans('category_trans.type') }}</th>
                                        <th>{{ trans('purchase_trans.category_id') }}</th>
                                        {{-- <th>{{ trans('purchase_trans.supplier_id') }}</th> --}}
                                        <th>{{ trans('purchase_trans.price') }}</th>
                                        <th>{{ trans('purchase_trans.amount') }}</th>
                                        <th>{{ trans('purchase_trans.total_amount') }}</th>
                                        <th>{{ trans('main_trans.settings') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($purchases as $key => $purchase)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td title="{{ trans('category_trans.type') }}">
                                                {{ $purchase['category_type_name'] }}
                                            </td>
                                            <td title="{{ trans('purchase_trans.category_id') }}">
                                                {{ $purchase['category_name'] }}
                                            </td>
                                            {{-- <td title="{{ trans('purchase_trans.supplier_id') }}">
                                                {{ $purchase['supplier'] }}</td> --}}
                                            <td title="{{ trans('purchase_trans.price') }}">
                                                {{ $purchase['price'] }}</td>
                                            <td title="{{ trans('purchase_trans.amount') }}">
                                                {{ $purchase['amount'] }}</td>
                                            <td title="{{ trans('purchase_trans.total_amount') }}">
                                                {{ $purchase['total_amount'] }}</td>
                                            <td title="{{ trans('main_trans.settings') }}">
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    wire:click="delete({{ $key }})"><i
                                                        class="fa fa-trash"></i></button>
                                                <button type="button" class="btn btn-primary btn-sm edit-purchase"
                                                    wire:click="edit({{ $key }})"><i
                                                        class="fa fa-edit"></i></button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">لا توجد بيانات</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        // $(document).ready(function() {
        if (document.querySelector('.edit-purchase')) {
            console.log("os")
            document.querySelector('.edit-purchase').addEventListener('click', function() {
                console.log("os")
            })
        }
        console.log("nsdfos")

        // });
    </script>
@endpush
