@extends('default')

@section('content')
  <div class="row">
    <div class="column">
      @include('snippets.post', $post)
    </div>
  </div>
@stop
