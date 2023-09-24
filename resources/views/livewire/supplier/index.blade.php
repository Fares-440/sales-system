<div>
    @section('PageTitle')
        {{ trans('main_trans.suppliers') }}
    @endsection
    @section('title')
        {{ trans('main_trans.suppliers') }}
    @endsection
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <button type="button" class="button x-small" wire:click="$emit('showModal', 'supplier.create')">
                        {{ trans('supplier_trans.create') }}
                    </button>
                    <div class="table-responsive mt-3">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead class="table-secondary">
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('supplier_trans.name') }}</th>
                                    <th>{{ trans('supplier_trans.phone') }}</th>
                                    <th>{{ trans('supplier_trans.street') }}</th>
                                    <th>{{ trans('supplier_trans.city') }}</th>
                                    <th>{{ trans('main_trans.settings') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suppliers as $supplier)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $supplier->name }}</td>
                                        <td>{{ $supplier->phone }}</td>
                                        <td>{{ $supplier->street }}</td>
                                        <td>{{ $supplier->city->name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm"
                                                wire:click="$emit('showModal', 'supplier.edit','{{ $supplier->id }}')"
                                                title="{{ trans('main_trans.edit') }}"><i
                                                    class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm"
                                                wire:click='$emit( "showModal",  "supplier.delete", "{{ $supplier->id }}", "{{ $supplier->name }}")'
                                                title="{{ trans('main_trans.delete') }}"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                        <div class="d-flex flex-row-reverse">
                            {{ $suppliers->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
