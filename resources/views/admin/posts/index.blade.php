@extends('layouts.admin')


@section('content')

<div class="d-flex justify-content-between align-items-center my-2">
    <h1>Posts</h1>
    <a class="btn btn-dark" href="{{route('admin.posts.create')}}" role="button">
        <i class="fas fa-pen fa-fw"></i>
        Create Post
    </a>
</div>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Image</th>
            <th>Author</th>
            <th>Actions</th>

        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
        <tr>
            <td scope="row">{{$post->id}}</td>
            <td>{{$post->title}}</td>
            <td><img width="100" src="{{$post->image}}" alt="{{$post->title}}"></td>
            <td>{{$post->author}}</td>
            <td>
                <a href="{{route('admin.posts.show', $post->id )}}">
                    <i class="fas fa-eye fa-fw"></i>
                </a>
                <a href="{{route('admin.posts.edit', $post->id )}}">
                    <i class="fas fa-pencil-alt fa-fw"></i>
                </a>
                <i class="fas fa-trash fa-fw"></i>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{$posts->links()}}
</div>

@endsection