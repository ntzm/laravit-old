<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="/css/foundation.min.css">
  <link rel="stylesheet" href="/css/font-awesome.min.css">
  <link rel="stylesheet" href="/css/style.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{{ $title }}} | Laravit</title>
</head>
<body>
  <nav class="top-bar" data-topbar>
    <ul class="title-area">
      <li class="name">
        <h1>
          <a href="/">
            <img src="/img/laravit-logo.png" height="30" width="30" alt="Laravit Logo" class="logo">
            Laravit
          </a>
        </h1>
      </li>
      <li class="toggle-topbar"><a href="#">Menu</a></li>
    </ul>
    <section class="top-bar-section">
      <ul class="right">
        @if (Auth::check())
          <li class="has-dropdown"><a href="/submit">New</a>
            <ul class="dropdown">
              <li><a href="/post/new">Post</a></li>
              <li><a href="/sub/new">Sub</a></li>
            </ul>
          </li>
        @endif
        @if (Auth::check())
          <li class="has-dropdown"><a href="/u/{{ Auth::user()->name }}">User</a>
        @else
          <li class="has-dropdown"><a href="/signin">User</a>
        @endif
          <ul class="dropdown">
            @if (Auth::check())
              <li><a href="/signout">Sign out</a></li>
            @else
              <li><a href="/signin">Sign in</a></li>
              <li><a href="/signup">Sign up</a></li>
            @endif
          </ul>
        </li>
      </ul>
    </section>
  </nav>
  @yield('content')

  <script src="/js/jquery.min.js"></script>
  <script src="/js/foundation.min.js"></script>
  <script src="/js/fastclick.min.js"></script>
  <script src="/js/main.js"></script>
</body>
</html>
