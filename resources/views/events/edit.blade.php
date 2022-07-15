@extends('welcome')
@section('content')
    <h3>Update Event</h3>

    <div>
        <form action="{{route('events.update',$event->id)}}" method="POST">
            @method('PUT')
            @include('events._form')
        </form>
    </div>
@endsection