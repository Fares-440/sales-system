@extends('layouts.app')
@section('PageTitle')
    posts
@endsection
@section('title')
    posts
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <a href="{{ route('posts.create') }}" class="button x-small"
                        wire:click="$emit('showModal', 'supplier.create')">
                        {{ trans('supplier_trans.create') }}
                    </a>
                    <div class="table-responsive mt-3">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                            style="text-align: center">
                            <thead class="table-secondary">
                                <tr>
                                    <th>#</th>
                                    <th>titel</th>
                                    <th>body</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>{{ $post->body }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex flex-row-reverse">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
