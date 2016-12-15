@extends('layouts.master')

@section('title')
    View Clients
@endsection

@section('content')
    <div class="container">
    <div class="row">
    <div class="col-md-12">
        @if(sizeof($clients) == 0)
        <h4>You have no Clients</h4> 
        <button class="btn btn-primary"> <a class='button' href='/clients/create'>Add a new client</a></button>
        @else
        <h3>Client List </h3>
        <button class="btn btn-primary"> <a class='button' href='/clients/create'>Add a new client</a></button>
        <br><br>
        <div id='client table-responsive'>
            <section class='client'>
            <div class="table-responsive">
                <table id="example" class="display table table-striped table-bordered" cellspacing="0" >
                <thead>
                <tr class="info">
                    <th class="sort">#</th>
                    <th class="sort">Client Name</th>
                    <th class="sort">Client Phone</th>
                    <th class="sort">Client Email</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tfoot>
                <tr class="info">
                    <th>#</th>
                    <th>Client Name</th>
                    <th>Client Phone</th>
                    <th>Client Email</th>
                </tr>
                </tfoot>
                <?php $i = 0; ?>
                @foreach($clients as $client)
                <tr>
                    <td> {{ ++$i }}</td> 
                    <td><a href='/appointments/{{ $client->id }}'>
                    {{$client->name}}</a></td>
                    <td>{{ $client->phone}}</td>
                    <td><a href='mailto:{{$client->email}}?subject=Appointment Tracker'> {{$client->email}} </a> </td>
                    <td><button class="btn btn-primary"> <a class='button' href='/clients/{{ $client->id }}/delete'>Delete this client</a></button></td>
                </tr>
                @endforeach
               </table>
            </div>
            </section>
            
        </div>
        @endif
    </div>
    </div>
    </div>
@endsection