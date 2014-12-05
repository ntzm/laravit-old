@extends('default')

@section('content')
  <div class="row">
    <div class="column">
      <h2>Create Sub</h2>
      {{ Form::open() }}
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name') }}
        {{ Form::submit('Go!', array('class' => 'button')) }}
      {{ Form::close() }}
      @foreach ($errors->all('<p>:message</p>') as $message)
        {{ $message }}
      @endforeach
    </div>
  </div>
@stop
