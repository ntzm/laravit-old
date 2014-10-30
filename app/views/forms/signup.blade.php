@extends('default')

@section('content')
  <div class="row">
    <div class="column">
      <h2>Sign Up</h2>
      {{ Form::open(array('action', 'UserController@register')) }}
        {{ Form::label('name', 'Username') }}
        {{ Form::text('name') }}
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password') }}
        {{ Form::submit('Go!', array('class' => 'button')) }}
      {{ Form::close() }}
    </div>
  </div>
@stop
