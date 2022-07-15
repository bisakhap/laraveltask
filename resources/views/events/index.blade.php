@extends('welcome')
@section('content')
    <h3>Events</h3>
    <div>
        @if(auth()->check())
        <a href="/events/create" class='btn btn-primary'>Add Event</a>
        @endif
        <a href="/events?filter=active" class='btn btn-info'>Show Active Only</a>
        <a href="/events" class='btn btn-success'>Show All</a>

       <table class="table table-responsive">
        <thead>
            <th>Start Date</th>
            <th>Title</th>
            <th>Description </th>
            <th>End Date</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach($events as $event)
            <tr>
                <td>{{$event->start_date}}</td>
                <td>{{$event->title}}</td>
                <td>{{$event->description}}</td>
                <td>{{$event->end_date}}</td>
                <td>
                    @if(auth()->check())
                    <a href="/events/{{$event->id}}/edit" class="btn btn-info">Edit</a>&ensp;
                    <button class='btn btn-primary' onclick="deleteEvent({{$event->id}})">Delete</button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
       </table>
    </div>
    <script>
        function deleteEvent(id){
            $.ajax({
                url: '/events/'+id,
                type: 'delete',
                dataType: 'JSON',
                data: {'_token': CSRF_TOKEN},
                success: function(){
                    alert('Successfully Deleted');
                    window.location.reload();
                },
                errors:function(){

                }
            });
        }
    </script>
@endsection