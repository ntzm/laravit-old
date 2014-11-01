@extends('default')

@section('content')
  <div class="row">
    <div class="column">
@foreach ($posts as $post)
      <div class="panel">
        <a href="{{ $post->url }}"><h3>{{{ $post->title }}}</h3></a>
        <a href="/u/{{{ $post->user->name }}}">{{{ $post->user->name }}}</a>
      </div>
@endforeach
    {{ $posts->links('pagination') }}
    </div>
  </div>
@stop
