@extends('layouts.admin')


@section('content')

<h1>Post: {{$post->id}}</h1>

<h3>{{$post->title}}</h3>
<img src="{{$post->image}}" alt="{{$post->title}}">
<h5 class="mt-3">Written by: author</h5>
<h6>Category: {{$post->category != null ? $post->category->name : 'Uncategorized'}}</h6>
<p>{{$post->content}}</p>
<p>
    @forelse($post->tags as $tag)
    <a href="{{route('tags.posts', $tag->slug)}}" class="badge bg-info">
        {{$tag->name}}
    </a>
    @empty
    <span class="badge bg-dark">Untagged</span>
    @endforelse
</p>

<a class="btn btn-dark mt-3 text-white" href="{{route('admin.posts.index')}}" role="button">
    <i class="fas fa-arrow-left"></i> Back
</a>
@endsection