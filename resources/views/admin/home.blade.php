@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="card my-4">
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
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h3 class="card-title">Posts</h3>
                    <a class="btn btn-primary w-100 text-white" href="{{route('admin.posts.create')}}" role="button">
                        Add new Post
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h3 class="card-title">Category</h3>
                    <a class="btn btn-primary w-100 text-white" href="{{route('admin.categories.index')}}"
                        role="button">
                        Add new Category
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h3 class="card-title">Tags</h3>
                    <a class="btn btn-primary w-100 text-white" href="{{route('admin.tags.index')}}" role="button">
                        Add new Tags
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection