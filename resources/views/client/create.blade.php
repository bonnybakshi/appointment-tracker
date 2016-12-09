@extends('layouts.master')

@section('title')
    Add a new Client
@stop

@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
    <h3>Add a new Client</h3>
    <div class="row">
    <div class="col-md-12">
    <form method='POST' action='/clients'>

        {{ csrf_field() }}

        <div class='form-group'>
           <label>Name</label>
            <input
                type='text'
                id='name'
                name='name'
                value='{{ old('name') }}'
            >
           <div class='error'>{{ $errors->first('name') }}</div>
        </div>


        <div class='form-group'>
           <label>Phone</label>
           <input
               type='text'
               id='phone'
               name='phone'
               value='{{ old('phone') }}'
           >
           <div class='error'>{{ $errors->first('phone') }}</div>
        </div>

        <div class='form-group'>
           <label>Email</label>
           <input
               type='text'
               id='email'
               name='email'
               value='{{ old('email') }}'
           >
           <div class='error'>{{ $errors->first('email') }}</div>
        </div>

        <button type="submit" class="btn btn-primary">Add Client</button>

        {{--
        <ul class=''>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        --}}

        <div class='error'>
            @if(count($errors) > 0)
                Please correct the errors above and try again.
            @endif
        </div>

    </form> 
    </div>
    </div>
</div>
</div>
</div>

@stop