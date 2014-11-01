@extends('default')

@section('content')
  <div class="row">
    <div class="column">
@foreach ($posts as $post)
      <div class="panel">
        <a href="{{ $post->url }}">
          <h3>{{{ $post->title }}}</h3>
        </a>
        <div>
          <a href="/u/{{ $post->user->name }}">
            <i class="fa fa-user"></i> /u/{{ $post->user->name }}
          </a>
          <a href="/r/{{ $post->sub->name }}">
            <i class="fa fa-code-fork"></i> /r/{{ $post->sub->name }}
          </a>
        </div>
        <div>
          <a href="/p/{{ $post->id }}">
            <i class="fa fa-comments"></i> {{ $post->comments->count() }} comments
          </a>
        </div>
      </div>
@endforeach
      {{ $posts->links('snippets.pagination') }}
    </div>
  </div>
@stop
