@extends('default')

@section('content')
  <div class="row">
    {{ Form::open(array('action', 'PostController@new')) }}
      {{ Form::label('title', 'Title') }}
      {{ Form::text('title') }}
      {{ Form::label('content', 'Content') }}
      {{ Form::textarea('content') }}
      {{ Form::label('sub', 'Sub') }}
      {{ Form::text('sub') }}
      {{ Form::submit('Go!', array('class' => 'button')) }}
    {{ Form::close() }}
  </div>
@stop
