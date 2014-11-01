<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="/css/foundation.min.css">
  <link rel="stylesheet" href="/css/font-awesome.min.css">
  <title>{{{ $title }}} | Laravit</title>
</head>
<body>
  <nav class="top-bar" data-topbar>
    <ul class="title-area">
      <li class="name">
        <h1><a href="/">Laravit</a></h1>
      </li>
      <li class="toggle-topbar"><a href="#"><i class="fa fa-bars fa-lg"></i></a></li>
    </ul>
    <section class="top-bar-section">
      <ul class="right">
        @if (Auth::check())
          <li class="has-dropdown"><a href="/submit"><i class="fa fa-pencil fa-lg"></i> New</a>
            <ul class="dropdown">
              <li><a href="/submit"><i class="fa fa-pencil-square-o fa-lg"></i> Post</a></li>
              <li><a href="#"><i class="fa fa-code-fork fa-lg"></i> Sub</a></li>
            </ul>
          </li>
        @endif
        @if (Auth::check())
          <li class="has-dropdown"><a href="/u/{{ Auth::user()->name }}"><i class="fa fa-user fa-lg"></i> User</a>
        @else
          <li class="has-dropdown"><a href="/signin"><i class="fa fa-user fa-lg"></i> User</a>
        @endif
          <ul class="dropdown">
            @if (Auth::check())
              <li><a href="/signout"><i class="fa fa-sign-out fa-lg"></i> Sign out</a></li>
            @else
              <li><a href="/signin"><i class="fa fa-sign-in fa-lg"></i> Sign in</a></li>
              <li><a href="/signup"><i class="fa fa-plus fa-lg"></i> Sign up</a></li>
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
