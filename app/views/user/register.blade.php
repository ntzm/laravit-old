@extends('default')

@section('content')
  <div class="row">
    <h2>Register</h2>
    {{ Form::open(array('action', 'UserController@register')) }}
      {{ Form::label('name', 'Username') }}
      {{ Form::text('name') }}
      {{ Form::label('password', 'Password') }}
      {{ Form::password('password') }}
      {{ Form::submit('Go!', array('class' => 'button')) }}
    {{ Form::close() }}

    @if (isset($messages))
      @foreach ($messages as $message)
        <p>{{{ $message }}}</p>
      @endforeach
    @endif
  </div>
@stop
