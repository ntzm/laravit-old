<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="css/foundation.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
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
        <li><a href="/submit">New Post</a></li>
        <li class="has-dropdown"><a href="#"><i class="fa fa-user fa-lg"></i> User</a>
          <ul class="dropdown">
            <li><a href="#"><i class="fa fa-sign-out fa-lg"></i> Sign out</a></li>
          </ul>
        </li>
      </ul>
    </section>
  </nav>

@yield('content')

  <script src="js/jquery.min.js"></script>
  <script src="js/foundation.min.js"></script>
  <script src="js/fastclick.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
