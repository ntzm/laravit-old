@extends('default')

@section('content')
  <div class="row">
    <div class="column">
      @if ($posts->count() > 0)
        @foreach ($posts as $post)
          @include('snippets.post', array('post' => $post))
        @endforeach
      @else
        <p>There seems to be nothing here...</p>
      @endif
      @if ($posts->count() >= 15)
        {{ $posts->links('snippets.pagination') }}
      @endif
    </div>
  </div>
@stop
