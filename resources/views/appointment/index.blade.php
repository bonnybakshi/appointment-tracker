@extends('layouts.master')


@section('title')
    Manage Appointments
@endsection
@section('content')
    <div class="container">
    <div class="row">
    <div class="col-md-12">
    <h3>Appointments </h3>
    <h4>Today's date: {{ date('Y-m-d') }}</h4>
    @if(sizeof($appointments) == 0)
        <h4>You have no appointments.</h4>
        <button class="btn btn-primary"> <a class='button' href='/appointments/create'>Create an Appointment</a></button>
    @else
    @php $count = 0 @endphp
    @foreach($appointments as $appointment)
        @if($appointment->visit_date == date('Y-m-d'))
            @php $count++ @endphp
        @endif
    @endforeach
    @if($count == 1)
    <h4>You have {{$count}} appointment today.</h4>
    @elseif($count > 1)
    <h4>You have {{$count}} appointments today.</h4>
    @else 
    <h4>You have no appointments today.</h4>
    @endif
    <button class="btn btn-primary"> <a class='button' href='/appointments/create'>Create a new Appointment</a></button>
    <br><br>
    <div class="table-responsive"> 
    <table id="example" class="display table table-striped table-bordered" cellspacing="0" >
        <thead>
            <tr class="info">
                <th class="sort" >#</th>
                @if(Auth::user()->admin)
                <th class="sort">Client Name</th>
                @endif
                <th class="sort">Appointment Date (yy-mm-dd)</th>
                <th class="sort">Appointment Time</th>
                <th class="sort">Appointment Status</th>
                @if(Auth::user()->admin)
                <th>Edit Status</th>
                @else
                <th>Delete Appointment</th>
                @endif
            </tr>
        </thead>
        <tfoot>
            <tr class="info">
                <th>#</th>
                @if(Auth::user()->admin)
                <th>Client Name</th>
                @endif
                <th>Appointment Date (yy-mm-dd)</th>
                <th>Appointment Time</th>
                <th>Appointment Status</th>
            </tr>
        </tfoot> 
        <?php $i = 0; ?>
        <tbody>
        @foreach($appointments as $appointment)
            <tr>
                <td> {{ ++$i }}</td> 
                @if(Auth::user()->admin)
                <td>{{$appointment->client->name}}</td>
                @endif 
                <td>{{$appointment->visit_date}}</td>
                <td>{{$appointment->visit_time}}</td>
                <td>{{$appointment->visited}}
                @if(Auth::user()->admin)
                <td><button class="btn btn-primary"> <a class='button' href='/appointments/{{ $appointment->id }}/edit'>Edit</a></button></td>
                @else
                <td><button class="btn btn-primary"> <a class='button' href='/appointments/{{$appointment->id }}/delete'>Delete appointment</a></button></td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    
    @endif
    </div>
    </div>
    </div>
@endsection