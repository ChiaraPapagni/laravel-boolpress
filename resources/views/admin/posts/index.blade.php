@extends('layouts.admin')


@section('content')

<div class="d-flex justify-content-between align-items-center my-2">
    <h1>Posts</h1>
    <a class="btn btn-dark" href="{{route('admin.posts.create')}}" role="button">
        <i class="fas fa-pen fa-fw"></i>
        Create Post
    </a>
</div>

<div class="container my-2">
    @include('partials.session_message')
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
                <button type="button" class="btn btn-danger btn-sm text-white" data-bs-toggle="modal"
                    data-bs-target="#delere_post_{{$post->slug}}">
                    <i class="fas fa-trash-alt fa-fw"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="delere_post_{{$post->slug}}" tabindex="-1" role="dialog"
                    aria-labelledby="modal_{{$post->slug}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Post: {{$post->title}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to proceed?
                                This operation is irreversible!
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="{{route('admin.posts.destroy', $post->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger text-white"
                                        data-bs-dismiss="modal">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{$posts->links()}}
</div>
@endsection