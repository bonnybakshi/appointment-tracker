@extends('layouts.master')


@section('title')
    manage appointments
@endsection

@section('content')
    <div class="container">
    <div class="row">
    <div class="col-md-12">
    <h4>Edit Appointment Status for {{$appointments->client->name}} </h4>
    <form method='POST' action='/appointments/{{ $appointments->id }}'>

    {{ method_field('PUT') }}
    {{ csrf_field() }} 
        <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Client Name</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Appointment Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php $i = 0; ?>
            <tr>
                <td> {{ ++$i }}</td> 
                <td>{{$appointments->client->name}}</td>
                <td>{{$appointments->visit_date}}</td>
                <td>{{$appointments->visit_time}}</td>
                <td><select name='status'>
                    @foreach($status_for_dropdown as $status)
                    <option
                    {{ ($status == $appointments->visited) ? 'SELECTED' : '' }}
                    value='{{ $status }}'
                    >{{ $status }}</option>
                    @endforeach
                    </select>
                </td>
                <td><button type="submit" class="btn btn-primary">Save changes</button></td>
            </tr>
        </table>
    </form>
    </div>
    </div>
    </div>
@endsection