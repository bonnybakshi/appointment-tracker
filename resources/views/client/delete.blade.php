@extends('layouts.master')

@section('title')
    Confirm deletion: {{ $client->name }}
@endsection

@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">

    <h3>Confirm deletion</h3>
    <form method='POST' action='/clients/{{ $client->id }}'>

        {{ method_field('DELETE') }}

        {{ csrf_field() }}

        <h3>Are you sure you want to delete <em>{{ $client->name }}</em>?</h3>
		<button class="btn btn-primary" type='submit' value='Yes'>YES</button>
		<button class="btn btn-primary"> <a class='button' href='/clients/'>NO</a></button>
        {{-- <input type='submit' value='Yes'> --}}
        
    </form>
</div>
</div>
</div>
@endsection