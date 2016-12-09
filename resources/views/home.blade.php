@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h2>Welcome {{Auth::user()->name}}!</h2>
		@if(Auth::user()->admin) <h3>You have administrative privileges. You can make changes to client and appointment database. </h3>
		@endif
        </div>
    </div>
</div>
@endsection
