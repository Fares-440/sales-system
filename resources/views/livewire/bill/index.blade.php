<div>
    @if ($bill_purchases)
        @livewire('purchase.show', [$bill_id])
    @else
        @section('PageTitle')
            {{ trans('main_trans.bills') }}
        @endsection
        @section('title')
            {{ trans('main_trans.bills') }}
        @endsection
        <div class="row">
            <div class="col-xl-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="table-responsive mt-3">
                            <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                data-page-length="50" style="text-align: center">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>#</th>
                                        {{-- <th>{{ trans('bill_trans.type') }}</th> --}}
                                        <th>{{ trans('bill_trans.supplier_name') }}</th>
                                        <th>{{ trans('bill_trans.user_name') }}</th>
                                        <th>{{ trans('bill_trans.total_amount') }}</th>
                                        <th>{{ trans('bill_trans.created-date') }}</th>
                                        <th>{{ trans('main_trans.settings') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bills as $bill)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            {{-- <td>{{ $bill->type }}</td> --}}
                                            <td>{{ $bill->supplier->name }}</td>
                                            <td>{{ $bill->user->name }}</td>
                                            <td>{{ $bill->total }}</td>
                                            <td>{{ $bill->created_at->format('Y-m-d') }}</td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm"
                                                    wire:click="showBillPurchases({{ $bill->id }})"
                                                    title="{{ trans('main_trans.edit') }}"><i
                                                        class="fa fa-eye"></i></button>
                                                {{-- <button type="button" class="btn btn-danger btn-sm"
                                                wire:click="$emit('showModal', 'category.delete','{{ $purchase->id }}', '{{ $purchase->name }}')"
                                                title="{{ trans('main_trans.delete') }}"><i
                                                    class="fa fa-trash"></i></button> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                            <div class="d-flex flex-row-reverse">
                                {{ $bills->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @stack('scripts')
</div>
@push('scripts')
    <script></script>
@endpush
