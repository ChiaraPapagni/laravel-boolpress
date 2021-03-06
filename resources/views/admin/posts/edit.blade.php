@extends('layouts.admin')


@section('content')

<h1>Update Post: {{$post->title}}</h1>

@include('partials.errors')

<form action="{{route('admin.posts.update', $post->id)}}" method="post" enctype="multipart/form-data">
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
        <div class="row">
            <div class="col-4">
                <img src="{{asset('storage/' . $post->image)}}" alt="{{$post->title}}" class="img-fluid">
            </div>
            <div class="col">
                <label for="image" class="form-label">Change Image</label>
                <input type="file" name="image" id="image" aria-describedby="imageHelper" accept="images/*"
                    class="form-control @error('image') is_invalid @enderror">
                <small id="imageHelper" class="text-muted">Add your post image here. [Max 500kb]</small>
            </div>
        </div>

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
            <option value="{{$category->id}}" {{$category->id === $post->category_id ? 'selected' : ''}}>
                {{$category->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="tags" class="form-label">Tags</label>
        <select multiple class="form-select" name="tags[]" id="tags">
            <option disabled>Select all tags</option>
            @foreach($tags as $tag)
            <option value="{{$tag->id}}" {{$post->tags->contains($tag->id) ? 'selected' :''}}> {{$tag->name}}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-dark">Update</button>
</form>
@endsection