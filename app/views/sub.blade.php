@extends('default')

@section('content')
  <div class="row">
    <div class="column">
      @foreach ($posts as $post)
        @include('snippets.post', array('post' => $post))
      @endforeach
      {{ $posts->links('snippets.pagination') }}
    </div>
  </div>
@stop
