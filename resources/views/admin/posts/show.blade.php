@extends('layouts.admin')


@section('content')

<h1>Posts {{$post->id}}</h1>

<h3>{{$post->title}}</h3>
<img src="{{$post->image}}" alt="{{$post->title}}">
<h5 class="mt-3">Written by: {{$post->author}}</h5>
<p>{{$post->content}}</p>

@endsection