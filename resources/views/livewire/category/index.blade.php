<div>
    @section('PageTitle')
        {{ trans('main_trans.categories') }}
    @endsection
    @section('title')
        {{ trans('main_trans.categories') }}
    @endsection

    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <button type="button" class="button x-small" wire:click="$emit('showModal', 'category.create')">
                        {{ trans('category_trans.create') }}
                    </button>
                    <div class="table-responsive mt-3">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead class="table-secondary">
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('category_trans.name') }}</th>
                                    <th>{{ trans('category_trans.type') }}</th>
                                    <th>{{ trans('category_trans.created-date') }}</th>
                                    <th>{{ trans('category_trans.updated-date') }}</th>
                                    <th>{{ trans('main_trans.settings') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->categoryType->name }}</td>
                                        <td>{{ $category->created_at->format('Y-m-d') }}</td>
                                        <td>{{ $category->updated_at->format('Y-m-d') }}</td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm"
                                                wire:click='$emit("showModal", "category.edit","{{ $category->id }}")'
                                                title="{{ trans('main_trans.edit') }}"><i
                                                    class="fa fa-edit"></i></button>
                                            <button type="button" class="btn btn-danger btn-sm"
                                                wire:click='$emit("showModal", "category.delete","{{ $category->id }}", "{{$category->name}}")'
                                                title="{{ trans('main_trans.delete') }}"><i
                                                    class="fa fa-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                        <div class="d-flex flex-row-reverse">
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
