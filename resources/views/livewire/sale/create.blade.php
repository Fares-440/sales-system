<div>
    @section('PageTitle')
        {{ trans('main_trans.stores') }}
    @endsection
    @section('title')
        {{ trans('main_trans.stores') }}
    @endsection
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    {{-- <button type="button" class="btn btn-success x-small" wire:click="create">
                        {{ trans('category_trans.create') }}
                    </button> --}}

                    <div class="table-responsive mb-3">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0 custom-font"
                            data-page-length="50" style="text-align: center">
                            <thead class="table-secondary">
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('category_trans.name') }}</th>
                                    <th>{{ trans('category_trans.type') }}</th>
                                    <th>{{ trans('purchase_trans.amount') }}</th>
                                    <th>{{ trans('sale_trans.price') }}</th>
                                    <th>{{ trans('bill_trans.created-date') }}</th>
                                    <th>{{ trans('main_trans.settings') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stores as $store)
                                    @if ($store->amount >= 1)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $store->category->name }}</td>
                                            <td>{{ $store->category->categoryType->name }}</td>
                                            <td class=" @if ($store->amount <= 15) bg-danger text-white @endif">
                                                {{ $store->amount }}</td>
                                            <td>{{ $store->new_price }}</td>
                                            <td>{{ $store->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm"
                                                    wire:click="searchPrudcut({{ $store->id }})"
                                                    {{-- wire:click="$emit('showModal', 'sale.add-sale','{{ $store->id }}')" --}} title="{{ trans('main_trans.add') }}">
                                                    <i class="fa-solid fa-cart-plus"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                        </table>
                        <div class="d-flex flex-row-reverse">
                            {{ $stores->links() }}
                        </div>
                    </div>
                    <div style="border-top: 3px dashed #ddd"></div>
                    <form wire:submit.prevent="submit">
                        <fieldset class="row pb-2 pt-4 mt-5 mb-3 mr-2 ml-2 font-weight-bold">
                            <legend> فاتورة بيع:</legend>
                            <span style="position: absolute;left: 5px;top: 5px;">
                                التاريخ: {{ date("Y-m-d") }}
                            </span>
                            <div class="col-sm-12 col-md-6">
                                <label for="customerName" class="mr-sm-2">{{ __('sale_trans.customerName') }}
                                    :</label>
                                <input id="customerName" type="text" wire:model="customerName"
                                    class="form-control @error('customerName') border border-danger @enderror">
                                @error('customerName')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="phone" class="mr-sm-2 ">{{ __('sale_trans.phone') }}
                                    :</label>
                                <input id="phone" type="text" wire:model="phone"
                                    class="form-control @error('phone') border border-danger @enderror">
                                @error('phone')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-6 pt-2">
                                @if (!empty($products))
                                    <button type="button" wire:click="sumbit" class="btn btn-success">
                                        {{ __('main_trans.store') }}
                                    </button>
                                @endif
                            </div>

                            <div class="col-6 pt-4 mb-3 ">
                                <span class="bg-light p-3">
                                    اجمالي الفاتورة :
                                </span>
                                <span class="bg-primary text-white p-3">
                                    {{ $total }}
                                </span>
                            </div>
                        </fieldset>
                    </form>

                    <div class="table-responsive mt-3 nice-scrollbar" style="max-height:400px">
                        <table id="datatable" class="table table-hover table-sm table-bordered p-0 font-weight-bold"
                            data-page-length="50" style="text-align: center">
                            <thead class="table-secondary">
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('category_trans.type') }}</th>
                                    <th>{{ trans('purchase_trans.category_id') }}</th>
                                    <th>{{ trans('purchase_trans.price') }}</th>
                                    <th>{{ trans('purchase_trans.amount') }}</th>
                                    <th>{{ trans('purchase_trans.total_amount') }}</th>
                                    <th>{{ trans('main_trans.settings') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $key => $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td title="{{ trans('purchase_trans.category_id') }}">
                                            {{ $product['name'] }}
                                        </td>
                                        <td title="{{ trans('category_trans.type') }}">
                                            {{ $product['type'] }}
                                        </td>
                                        <td title="{{ trans('purchase_trans.price_item') }}">
                                            {{ $product['price'] }}</td>
                                        <td title="{{ trans('purchase_trans.amount') }}">
                                            {{ $product['amount'] }}</td>
                                        <td title="{{ trans('purchase_trans.total_amount') }}">
                                            {{ $product['total'] }}
                                        </td>
                                        <td title="{{ trans('main_trans.settings') }}">
                                            <button type="button" class="btn btn-danger btn-sm"
                                                wire:click="delete({{ $key }})"><i
                                                    class="fa fa-trash"></i></button>
                                            <button type="button" class="btn btn-primary btn-sm edit-purchase"
                                                wire:click="$emit('showModal', 'sale.edit-sale','{{ $product['id'] }}','{{ $product['amount'] }}','{{ $key }}')"><i
                                                    class="fa fa-edit"></i></button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">لا توجد بيانات</td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2">الاجمالي</td>
                                    <td class="bg-primary text-white">{{ $total }}</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @stack('scripts')
</div>
@push('scripts')
    <script>
        $(window).on('load', function() {
            $('#datatable_length').parent().parent().hide();
        });
    </script>
@endpush
