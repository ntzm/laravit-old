@extends('default')

@section('content')
  <div class="row">
    <div class="column">
      <h2>New Post</h2>
      {{ Form::open(array('action', 'PostController@newPost')) }}
        {{ Form::label('title', 'Title') }}
        {{ Form::text('title') }}
        {{ Form::label('url', 'URL') }}
        {{ Form::text('url') }}
        {{ Form::label('sub', 'Sub') }}
        {{ Form::text('sub') }}
        {{ Form::submit('Go!', array('class' => 'button')) }}
      {{ Form::close() }}
      @foreach ($errors->all() as $message)
        <p>{{{ $message }}}</p>
      @endforeach
    </div>
  </div>
@stop
