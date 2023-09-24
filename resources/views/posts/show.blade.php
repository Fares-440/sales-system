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
                    <div class="col-6">
                        {{$post->title}}
                    </div>
                    <div class="col-6">
                        {{$post->body}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
