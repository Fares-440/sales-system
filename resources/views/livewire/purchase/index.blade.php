<div>
    @section('PageTitle')
        {{ trans('main_trans.purchases') }}
    @endsection
    @section('title')
        {{ trans('main_trans.purchases') }}
    @endsection
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <button type="button" class="btn btn-success x-small" wire:click="create">
                        {{ trans('category_trans.create') }}
                    </button>
                    <div class="table-responsive mt-3">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead class="table-secondary custom-font">
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('category_trans.name') }}</th>
                                    <th>{{ trans('category_trans.type') }}</th>
                                    <th>{{ trans('purchase_trans.supplier_id') }}</th>
                                    <th>{{ trans('purchase_trans.user_id') }}</th>
                                    <th>{{ trans('purchase_trans.price') }}</th>
                                    <th>{{ trans('purchase_trans.amount') }}</th>
                                    <th>{{ trans('purchase_trans.total_amount') }}</th>
                                    <th>{{ trans('purchase_trans.created-date') }}</th>
                                    <th>{{ trans('main_trans.settings') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchases as $purchase)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $purchase->category->name }}</td>
                                        <td>{{ $purchase->category->categoryType->name }}</td>
                                        <td>{{ $purchase->bill->supplier->name }}</td>
                                        <td>{{ $purchase->bill->user->name }}</td>
                                        <td class="bg-warning text-white custom-font">{{ $purchase->price }}</td>
                                        <td class="bg-primary text-white custom-font">{{ $purchase->amount }}</td>
                                        <td class="bg-success text-white custom-font">{{ $purchase->total() }}</td>
                                        <td>{{ $purchase->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-sm"
                                                wire:click="$emit('showModal', 'store.create','{{ $purchase->id }}')"
                                                title="{{ trans('main_trans.add') }}">
                                                <i class="fa-solid fa-store"></i>
                                            </button>
                                            {{-- <button type="button" class="btn btn-danger btn-sm"
                                                wire:click="$emit('showModal', 'category.delete','{{ $purchase->id }}', '{{ $purchase->name }}')"
                                                title="{{ trans('main_trans.delete') }}"><i
                                                    class="fa fa-trash"></i></button> --}}
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                        <div class="d-flex flex-row-reverse">
                            {{ $purchases->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stack('scripts')
</div>
@push('scripts')
    <script></script>
@endpush
