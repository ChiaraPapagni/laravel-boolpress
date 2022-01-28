@extends('layouts.admin')


@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Categories</h2>
            <!-- Lista categorie -->
            <ul class="list-group">
                @foreach($categories as $category)
                <li class="list-group-item d-flex align-items-center justify-content-between">
                    <a class="badge rounded-pill bg-primary text-decoration-none"
                        href="{{route('categories.posts', $category->slug)}}">
                        {{ $category->posts()->count() }}
                    </a>

                    <form action="{{route('admin.categories.update', $category->id)}}" method="post">
                        @csrf
                        @method('PATCH')

                        <input class="border-0" type="text" name="name" id="name" value="{{$category->name}}">
                    </form>

                    <form action="{{route('admin.categories.destroy', $category->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn text-danger">
                            <i class="far fa-trash-alt fa-lg fa-fw"></i>
                        </button>
                    </form>
                </li>
                @endforeach
            </ul>
        </div>

        <div class="col-md-6">
            <h2>Add Category</h2>
            <!-- Form per creare una categoria -->
            <form action="{{route('admin.categories.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Category name here"
                        aria-describedby="nameHelper">
                    <small id="nameHelper" class="text-muted">Type a category name, max: 200</small>
                </div>
                <button type="submit" class="btn btn-dark">Add category</button>
            </form>
        </div>
    </div>
</div>



@stop