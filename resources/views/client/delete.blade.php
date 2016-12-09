@extends('layouts.master')

@section('title')
    Confirm deletion: {{ $client->name }}
@endsection
@section('head')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <script>
  $( function() {
    $( "#dialog-confirm" ).dialog({
      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
      buttons: {
        "Delete all items": function() {
          $( this ).dialog( "close" );
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      }
    });
  } );
  </script>

@endsection
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">

    <h3>Confirm deletion</h3>
    <form method='POST' action='/clients/{{ $client->id }}'>

        {{ method_field('DELETE') }}

        {{ csrf_field() }}

        <h3><em>{{ $client->name }}</em> will be permanently deleted and cannot be recovered. Are you sure?</h3>
		<button class="btn btn-primary" type='submit' value='Yes'>YES</button>
		<button class="btn btn-primary"> <a class='button' href='/clients/'>NO</a></button>
        {{-- <input type='submit' value='Yes'> --}}
        
    </form>
    <div id="dialog-confirm" title="Empty the recycle bin?">
        <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>These items will be permanently deleted and cannot be recovered. Are you sure?</p>
    </div>
</div>
</div>
</div>
@endsection