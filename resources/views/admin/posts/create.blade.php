@extends('layouts.admin')


@section('content')

<h1>Create a new Post</h1>

@include('partials.errors')

<form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
            placeholder="Your post title here..." aria-describedby="titleHelper" value="{{old('title')}}">

        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="file" name="image" id="image" accept="image/*" placeholder="https://"
            aria-describedby="imageHelper" class="form-control @error('image') is-invalid @enderror">
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content"
            rows="5">{{old('content')}}</textarea>
        @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Categories</label>
        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
            <option value="" selected>Select a category</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="tags" class="form-label">Tags</label>
        <select multiple class="form-select" name="tags[]" id="tags">
            <option disabled>Select all tags</option>
            @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-dark">Save</button>
</form>
@endsection