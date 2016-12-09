@extends('layouts.master')


@section('title')
    manage appointments
@endsection

@section('content')
    <div class="container">
    <div class="row">
    <div class="col-md-12">
    <h4>Appointments </h4>
    @if(sizeof($appointments) == 0)
        You have no appointments, do you want to <a href='/appointments/create'>add an appontment</a>.
    @else 
    <table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Client Name</th>
            <th>Appointment Date</th>
            <th>Appointment Time</th>
            <th>Appointment Status</th>
            @if(Auth::user()->admin)
            <th>Edit Status</th>
            @endif
        </tr>
    </thead>
    <?php $i = 0; ?>
    @foreach($appointments as $appointment)
        <tr>
            <td> {{ ++$i }}</td> 
            <td>{{$appointment->client->name}}</td> 
            <td>{{$appointment->visit_date}}</td>
            <td>{{$appointment->visit_time}}</td>
            <td>{{$appointment->visited}}</td>
            @if(Auth::user()->admin)
            <td><button class="btn btn-primary"> <a class='button' href='/appointments/{{ $appointment->id }}/edit'>Edit</a></button></td>
            @endif
        </tr>
    @endforeach
    </table>
    @endif
    </div>
    </div>
    </div>
@endsection