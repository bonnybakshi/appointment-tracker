@extends('layouts.master')

@section('title')
    View Clients
@endsection

@section('content')
    <div class="container">
    <div class="row">
    <div class="col-md-12">
        @if(sizeof($clients) == 0)
        You have no Clients <a href='/'>add a client to get started</a>.
        @else
            <div id='client'>
                <section class='client'>
                    <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Client Name</th>
                        <th>Client Phone</th>
                        <th>Client Email</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <?php $i = 0; ?>
                    @foreach($clients as $client)
                    <tr>
                        <td> {{ ++$i }}</td> 
                        <td><a href='/appointments/{{ $client->id }}'>
                        {{$client->name}}</a></td>
                        <td>{{ $client->phone}}</td>
                        <td>{{ $client->email }}</td>
                        <td><button class="btn btn-primary"> <a class='button' href='/clients/{{ $client->id }}/delete'>Delete this client</a></button></td>
                    </tr>
                    @endforeach
                   </table>
                   <button class="btn btn-primary"> <a class='button' href='/clients/create'>Add a new client</a></button>
                </section>
                
            </div>
        @endif
    </div>
    </div>
    </div>
@endsection