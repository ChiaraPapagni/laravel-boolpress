@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-8 m-auto">
        @foreach($posts as $post)
        <div class="mb-5">
            <img src="{{$post->image}}" alt="{{$post->title}}" height="290px">

            <h4>{{$post->title}}</h4>
            <small class="text-muted">
                By <strong> author</strong> | in

                @if($post->category)
                <a href="{{route('categories.posts', $post->category->slug)}}">{{$post->category->name}}</a>
                @else
                <span>'Uncategorized'</span>
                @endif

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
    <div class="d-flex justify-content-center">
        {{$posts->links()}}
    </div>
</div>
@endsection