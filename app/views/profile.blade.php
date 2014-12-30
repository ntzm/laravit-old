@extends('default')

@section('content')
  <div class="row">
    <div class="large-8 columns">
      @foreach($user->posts()->paginate(15) as $post)
        @include('snippets.post', array('post' => $post))
      @endforeach
      {{ $user->posts()->paginate(15)->links('snippets.pagination') }}
    </div>
    <div class="large-4 columns panel">
      <p>User for {{ Helper::timeAgo($user->created_at, 'user') }}</p>
      <p>{{ $user->posts->count() }}</p>
    </div>
  </div>
@stop
