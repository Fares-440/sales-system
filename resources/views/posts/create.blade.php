@extends('layouts.app')
@section('PageTitle')
    posts create
@endsection
@section('title')
    posts create
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form action="{{ route('posts.store') }}" method="POST">
                        <!-- add_form -->
                        @csrf
                        <div class="row mb-2">
                            <div class="col-sm-12 col-md-6">
                                <label for="name" class="mr-sm-2">{{ __('category_trans.name') }}
                                    :</label>
                                <input name="title" type="text" class="form-control"> </input>
                                @error('title')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <label for="name" class="mr-sm-2">{{ __('category_trans.name') }}
                                    :</label>
                                <textarea name="body" class="form-control"></textarea>
                                @error('body')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('main_trans.store') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
