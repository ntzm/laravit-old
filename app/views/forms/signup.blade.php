@extends('default')

@section('content')
  <div class="row">
    <div class="column">
      <h2>Sign Up</h2>
      {{ Form::open() }}
        {{ Form::label('name', 'Username') }}
        {{ Form::text('name') }}
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password') }}
        {{ Form::submit('Go!', array('class' => 'button')) }}
      {{ Form::close() }}
      @foreach ($errors->all('<p>:message</p>') as $message)
        {{ $message }}
      @endforeach
      <a href="/signin">Already have an account? Sign in here!</a>
    </div>
  </div>
@stop
