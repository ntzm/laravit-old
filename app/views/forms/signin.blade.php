@extends('default')

@section('content')
  <div class="row">
    <div class="column">
      <h2>Sign In</h2>
      {{ Form::open(array('action', 'UserController@login')) }}
        {{ Form::label('name', 'Username') }}
        {{ Form::text('name') }}
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password') }}
        {{ Form::submit('Go!', array('class' => 'button')) }}
      {{ Form::close() }}
      {{ Session::get('error') }}
    </div>
  </div>
@stop
