@extends('layouts.admin')


@section('content')

<h1 class="my-2">Messages</h1>

<div class="container my-2">
    @include('partials.session_message')
</div>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Subject</th>
            <th>Email</th>
            <th>Date</th>
            <th>Actions</th>

        </tr>
    </thead>
    <tbody>
        @foreach($contacts as $contact)
        <tr>
            <td scope="row">{{$contact->id}}</td>
            <td>{{$contact->name}}</td>
            <td>{{$contact->subject}}</td>
            <td>{{$contact->email}}</td>
            <td>{{$contact->created_at}}</td>
            <td class="d-flex align-items-center">
                <!-- Button trigger modal -->
                <button type="button" class="btn text-info p-0 me-3" data-bs-toggle="modal"
                    data-bs-target="#show_message_{{$contact->id}}">
                    <i class="fas fa-eye"></i>
                </button>

                <!-- Modal -->
                <div class="modal fade" id="show_message_{{$contact->id}}" tabindex="-1" role="dialog"
                    aria-labelledby="modalMessage_{{$contact->id}}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    Message by <strong>{{$contact->name}}</strong> -
                                    <strong>{{$contact->email}}</strong>
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Subject: <strong>{{$contact->subject}}</strong>
                                <p>
                                    {{$contact->message}}
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark text-white"
                                    data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Button trigger modal -->
                <button type="button" class="btn text-danger p-0" data-bs-toggle="modal"
                    data-bs-target="#delete_message_{{$contact->id}}">
                    <i class="far fa-trash-alt"></i>
                </button>
                <!-- Modal -->
                <div class="modal fade" id="delete_message_{{$contact->id}}" tabindex="-1" role="dialog"
                    aria-labelledby="modelMessage_{{$contact->id}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Message: {{$contact->id}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete the message?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                <form action="{{route('admin.contacts.destroy', $contact->id)}}" method="post">
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
@endsection