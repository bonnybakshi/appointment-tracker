@extends('layouts.master')

@section('title')
    View {{$client->name}}'s Appointments
@endsection

@section('content')
    <div class="container">
        @if(sizeof($appointment) == 0)
        You have no Appointment for this client
        @else
            <div id='client'>
                <section class='client'>
                <h4>Appointments for {{$client->name}}</h4>
                <div class="table-responsive">
                    <table id="example" class="display table table-striped table-bordered" cellspacing="0" >
                    <thead>
                        <tr class="info">
                            <th class="sort">#</th>
                            <th class="sort">Visit date</th>
                            <th class="sort">Visit Time</th>
                            <th class="sort">Status</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr class="info">
                            <th>#</th>
                            <th>Visit date</th>
                            <th>Visit Time</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
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
                </div>
                </section>
                
            </div>
        @endif
    </div>
@endsection