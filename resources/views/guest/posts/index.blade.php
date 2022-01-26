@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-8 m-auto">
        @foreach($posts as $post)
        <div class="mb-5">
            <img src="{{$post->image}}" alt="{{$post->title}}" height="290px">

            <h4>{{$post->title}}</h4>
            <small class="text-muted">
                By <strong> {{$post->author}}</strong> | Post on {{$post->created_at}}
            </small>

            <p class="clamp-3 mb-0">
                {{$post->content}}
            </p>
            <a href="{{route('posts.show', $post->id)}}">
                <i class="fa fa-angle-double-right"></i> Continue reading...
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection