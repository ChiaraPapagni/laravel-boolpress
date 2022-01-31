@extends('layouts.app')


@section('content')

<div class="container">
    <h1 class="display-3 text-center mb-5">Tag: {{$tag->name}}</h1>

    <div class="row justify-content-center">

        @forelse($posts as $post)
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="{{asset('storage/' . $post->image)}}" alt="{{$post->title}}">
                <div class="card-body">
                    <a href="{{route('posts.show', $post->id)}}">
                        <h4 class="card-title">{{$post->title}}</h4>
                    </a>
                </div>
            </div>
        </div>

        @empty
        <div class="col">
            <p>Nothing to see here.</p>
        </div>

        @endforelse

        <a class="btn btn-primary mt-4 text-white" href="{{route('posts.index')}}" role="button">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>
</div>

@stop