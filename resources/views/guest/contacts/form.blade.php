@extends('layouts.app')

@section('content')

<div class="p-5 bg-light">
    <div class="container">
        <h1 class="display-3">Contact Us</h1>
    </div>
</div>


<div class="container">

    @include('partials.errors')

    @if(session('message'))
    @include('partials.session_message')
    @endif

    <form action="{{route('contacts.send')}}" method="post">
        @csrf
        <div class="mb-3">
            <div class="row">
                <div class="col">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Your Name"
                        aria-describedby="nameHelper" value="{{old('name')}}">
                    <small id="nameHelper" class="text-muted">Type your name here. [Max:50 characters]</small>
                </div>
                <div class="col">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="email@example.com"
                        aria-describedby="emailHelper" value="{{old('email')}}">
                    <small id="emailHelper" class="text-muted">Type your email here. </small>
                </div>
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" name="message" id="message" rows="3">
                    {{old('message')}}
                </textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary text-white">Send</button>
    </form>

</div>

@endsection