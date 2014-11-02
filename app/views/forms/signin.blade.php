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
        {{ Form::checkbox('remember') }}
        {{ Form::label('remember', 'Remember me') }}
        <br>
        {{ Form::submit('Go!', array('class' => 'button')) }}
      {{ Form::close() }}
      {{ Session::get('error') }}
      <a href="/signup">Don't have an account? Sign up here!</a>
    </div>
  </div>
@stop
