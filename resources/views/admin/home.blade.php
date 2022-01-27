@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card mt-4">
        <h4 class="card-header">{{ __('Welcome to the dashboard!') }}</h4>

        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            {{ __('You are logged in!') }}
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="card text-center my-4">
                <div class="card-body">
                    <h3 class="card-title">Posts</h3>
                    <a class="btn btn-primary w-100 text-white" href="{{route('admin.posts.create')}}" role="button">
                        Add new Post
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card text-center my-4">
                <div class="card-body">
                    <h3 class="card-title">Products</h3>
                    <a class="btn btn-primary w-100 text-white" href="" role="button">
                        Add new Products
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection