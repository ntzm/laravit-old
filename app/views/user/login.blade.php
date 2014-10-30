@extends('default')

@section('content')
  <div class="row">
    <h2>Login</h2>
    {{ Form::open(array('action', 'UserController@login')) }}
      {{ Form::label('name', 'Username') }}
      {{ Form::text('name') }}
      {{ Form::label('password', 'Password') }}
      {{ Form::password('password') }}
      {{ Form::submit('Go!', array('class' => 'button')) }}
    {{ Form::close() }}
  </div>
@stop
