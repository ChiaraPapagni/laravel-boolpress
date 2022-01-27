@extends('layouts.admin')


@section('content')

<h1>Update Post {{$post->title}}</h1>

@include('partials.errors')

<form action="{{route('admin.posts.update', $post->id)}}" method="post">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
            placeholder="Your post title here..." aria-describedby="titleHelper" value=" {{$post->title}}">

        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input type="text" name="image" id="image" class="form-control @error('image') is-invalid @enderror"
            placeholder="https://" aria-describedby="imageHelper" value="{{$post->image}}">

        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content"
            rows="5">{{$post->content}}</textarea>
        @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Categories</label>
        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
            <option value="">Uncategorized</option>

            @foreach($categories as $category)
            <option value="{{$category->id}}" {{$category->id === $post->category->id ? 'selected' : ''}}>
                {{$category->name}}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-dark">Save</button>
</form>
@endsection