@extends('layouts.master')

@section('title')
    View Clients
@endsection

@section('content')
    <div class="container">
        @if(sizeof($appointment) == 0)
        You have no Appointment for this client
        @else
            <div id='client'>
                <section class='client'>
                <h4>Appointments for {{$client->name}}</h4>
                    <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Visit date</th>
                        <th>Visit Time</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <?php $i = 0; ?>
                    @foreach($appointment as $appointment)
                    <tr>
                        <td> {{ ++$i }}</td> 
                        <td>{{$appointment->visit_date}}</td>
                        <td>{{$appointment->visit_time}}</td>
                        <td>{{$appointment->visited}}</td>
                    </tr>
                    @endforeach
                   </table>
                </section>
                
            </div>
        @endif
    </div>
@endsection