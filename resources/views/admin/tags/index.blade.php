@extends('layouts.admin')


@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Tags</h2>
            <ul class="list-group">
                @foreach($tags as $tag)
                <li class="list-group-item d-flex align-items-center justify-content-between">
                    <a class="badge rounded-pill bg-primary text-decoration-none"
                        href="{{route('tags.posts', $tag->slug)}}">
                        {{ $tag->posts()->count() }}
                    </a>

                    <form action="{{route('admin.tags.update', $tag->id)}}" method="post">
                        @csrf
                        @method('PATCH')

                        <input class="border-0" type="text" name="name" id="name" value="{{$tag->name}}">
                    </form>

                    <form action="{{route('admin.tags.destroy', $tag->id)}}" method="post">
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
            <h2>Add Tag</h2>
            <form action="{{route('admin.tags.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Tag name here"
                        aria-describedby="nameHelper">
                    <small id="nameHelper" class="text-muted">Type a tag name, max: 200</small>
                </div>
                <button type="submit" class="btn btn-dark">Add tag</button>
            </form>
        </div>
    </div>
</div>



@stop