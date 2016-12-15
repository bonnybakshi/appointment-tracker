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

<form method='POST' action='/appointments/create'>

{{ csrf_field() }}

<h4>Pick an Appointment date</h4>
    <input type="text" class="datepicker" data-date-format="yyyy-mm-dd" name="date" id="date" class="form-control" value='{{ old('date') }}'>
    
    <br>
    <div class='error'>
        @if(count($errors) > 0)
            Please select an appointment date to proceed 
        @endif
    </div>
    <br>
<button type="submit" class="btn btn-primary">Get Available Time Slots</button>
<br>
<h4>Available Appointment Time Slots</h4>
<select name="time" id="time">
    <option value="">-----</option>
</select>

@if(Auth::user()->admin)
<h4>Client list</h4>
<select name="client" id="client">
    <option value="">-----</option>
</select>
@endif
<br>
    
</form>
    </div>
    </div>
</div>
</div>
</div>
<script>
$.fn.datepicker.defaults.format = "yyyy-mm-dd";
$('.datepicker').datepicker({
    autoclose: true,
    todayHighlight: true,
    toggleActive: true,
    todayBtn: true,
    startDate: 'd',
}).on('changeDate', function (ev) {
        $(this).datepicker('hide');
}); 
</script>
@stop