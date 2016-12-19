@extends('layouts.master')

@section('title')
    Create a new Appointment
@stop
@section('head') 

<link href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css' rel='stylesheet'>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>


@stop

@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
    <h3>Create a new appointment</h3>
    <div class="row">
    <div class="col-md-12">

<form method='POST' action='/appointments'>

{{ csrf_field() }}

<h4>Appointment Date:</h4>
<input type="text" data-date-format="yyyy-mm-dd" name="date" id="date" class="form-control" value='{{ $date_value }}' readonly>
<br>
<button class="btn btn-primary"><a href="/appointments/create"> Change Appointment Date</a></button>
<br>
<br>   
<h4>Available Appointment Time Slots</h4>
<select id="time" name="time">
    @if(empty($time_for_dropdown))
        <option value=''>All slots taken.</option>

    @else
    @foreach($time_for_dropdown as $time_for_dropdown)
        <option
            value='{{ $time_for_dropdown }}'
            >{{$time_for_dropdown}}</option>
    @endforeach
    @endif
</select>
@if(empty($time_for_dropdown))
    <div class="error">Change appointment date to proceed</div>
@endif
<br>
@if(Auth::user()->admin)
    <div class='form-group'>
        <h4>Appointment for Client</h4>
        <select name='client_id'>
            @foreach($clients_for_dropdown as $client_id => $client)
                <option
                value='{{$client_id}}'
                >{{$client}}</option>
            @endforeach
            <div class='error'>{{ $errors->first('client_id') }}</div>
        </select>
    </div>
@endif
    <br>
    <button type="submit" class="btn btn-primary" @if(empty($time_for_dropdown)) disabled @endif ?> Create Appointment</button>      

    <div class='error'>
        @if(count($errors) > 0)
            Please fill all fields before proceeding.
        @endif
    </div>
</form>
    </div>
    </div>
</div>
</div>
</div>

@stop