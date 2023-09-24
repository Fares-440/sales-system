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
                    <div class="table-responsive mt-3">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0 custom-font"
                            data-page-length="50" style="text-align: center">
                            <thead class="table-secondary">
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('category_trans.name') }}</th>
                                    <th>{{ trans('category_trans.type') }}</th>
                                    <th>{{ trans('purchase_trans.amount') }}</th>
                                    <th>{{ trans('store_trans.old_price') }}</th>
                                    <th>{{ trans('store_trans.new_price') }}</th>
                                    <th>{{ trans('bill_trans.created-date') }}</th>
                                    <th>{{ trans('main_trans.settings') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{ $stores }}
                                @foreach ($stores as $store)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $store->category->name }}</td>
                                        <td>{{ $store->category->categoryType->name }}</td>
                                        <td class=" @if ($store->amount <= 15) bg-danger text-white @endif">
                                            {{ $store->amount }}</td>
                                        <td>{{ $store->old_price }}</td>
                                        <td>{{ $store->new_price }}</td>
                                        <td>{{ $store->created_at->format('Y-m-d') }}</td>
                                        <td>

                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                        <div class="d-flex flex-row-reverse">
                            {{ $stores->links() }}
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
