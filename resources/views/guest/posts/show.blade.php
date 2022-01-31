@extends('layouts.app')

@section('content')

<div class="container">
    <div class="m-auto">
        <div class="post">
            <img src="{{asset('storage/' . $post->image)}}" alt="{{$post->title}}">

            <h4>{{$post->title}}</h4>
            <small class="text-muted">
                By <strong> author</strong> | Post on {{$post->created_at}}
            </small>
            <h6 class="my-1">Category:
                @if($post->category)
                <a href="{{route('categories.posts', $post->category->slug)}}">{{$post->category->name}}</a>
                @else
                <span>'Uncategorized'</span>
                @endif
            </h6>
            <p>
                {{$post->content}}
            </p>

            <p>
                @forelse($post->tags as $tag)
                <a href="{{route('tags.posts', $tag->slug)}}" class="badge bg-info">
                    {{$tag->name}}
                </a>
                @empty
                <span class="badge bg-dark">Untagged</span>
                @endforelse
            </p>

            <a class="btn btn-primary mt-3 text-white" href="{{route('posts.index')}}" role="button">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </div>
</div>
@endsection