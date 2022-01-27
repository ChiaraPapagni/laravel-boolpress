@extends('layouts.admin')


@section('content')

<h1>Post: {{$post->id}}</h1>

<h3>{{$post->title}}</h3>
<img src="{{$post->image}}" alt="{{$post->title}}">
<h5 class="mt-3">Written by: author</h5>
<h6>Category: {{$post->category != null ? $post->category->name : 'Uncategorized'}}</h6>
<p>{{$post->content}}</p>

@endsection