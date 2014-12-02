<div class="panel">
  <div class="row">
    <div class="small-1 columns text-center">
      <i class="fa fa-lg fa-arrow-up vote"></i>
    </div>
    <div class="small-11 columns">
      <a href="{{ $post->url }}">
        <h3>{{{ $post->title }}}</h3>
      </a>
    </div>
  </div>
  <div class="row">
    <div class="small-1 columns text-center">
      <i class="fa fa-lg fa-arrow-down vote"></i>
    </div>
    <div class="small-11 columns">
      submitted {{ Helper::timeAgo($post->created_at) }} ago by
      <a href="/u/{{ $post->user->name }}">
        {{ $post->user->name }}
      </a>
      to
      <a href="/r/{{ $post->sub->name }}">
        {{ $post->sub->name }}
      </a>
    </div>
  </div>
  <div class="row">
    <div class="small-offset-1 columns">
      <a href="/r/{{ $post->sub->name }}/comments/{{ $post->id }}">
        {{ $post->comments->count() }} comments
      </a>
    </div>
  </div>
</div>
