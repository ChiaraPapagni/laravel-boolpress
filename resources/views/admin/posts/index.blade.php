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
            <td class="text-center">
                <a href="{{route('admin.posts.show', $post->id )}}">
                    <i class="fas fa-eye fa-fw"></i>
                </a>
                <a href="{{route('admin.posts.edit', $post->id )}}">
                    <i class="fas fa-pencil-alt fa-fw"></i>
                </a>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                    data-bs-target="#delete{{$post->id}}">
                    <i class="far fa-trash-alt"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="delete{{$post->id}}" tabindex="-1" role="dialog"
                    aria-labelledby="modal-{{$post->id}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Post: {{$post->title}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this post?
                                This operation is not reversible!
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- <form action="{{route('admin.posts.destroy', $post->id)}}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form> -->
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{$posts->links()}}
</div>
@endsection