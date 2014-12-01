<div class="panel">
  <div class="row">
    <div class="small-1 columns text-center">
      <i class="fa fa-lg fa-arrow-up"></i>
    </div>
    <div class="small-11 columns">
      <a href="{{ $post->url }}">
        <h3>{{{ $post->title }}}</h3>
      </a>
    </div>
  </div>
  <div class="row">
    <div class="small-1 columns text-center">
      <i class="fa fa-lg fa-arrow-down"></i>
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
      <a href="/p/{{ $post->id }}">
        <i class="fa fa-comments"></i> {{ $post->comments->count() }} comments
      </a>
    </div>
  </div>
</div>
