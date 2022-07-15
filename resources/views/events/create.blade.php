@extends('welcome')
@section('content')
    <h3>Create Event</h3>

    <div>
        <form action="{{route('events.store')}}" method="POST">
            @include('events._form')
        </form>
    </div>
@endsection