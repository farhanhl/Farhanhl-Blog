<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- SweetAlert2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <title>Farhanhl-Blog | {{ $title }}</title>
  </head>
  <body style="min-height: 100vh">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="/">Farhanhl Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ ($title === "Home") ? 'active' : '' }}" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($title === "About") ? 'active' : '' }}" href="/about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ ($title === "All Posts") ? 'active' : '' }}" href="/blog">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($title === "Categories") ? 'active' : '' }}" href="/categories">Categories</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ ($title === "Authors") ? 'active' : '' }}" href="/authors">Authors</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
            @guest
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle"></i> User
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a></li>
                <li><a class="dropdown-item" href="/register"><i class="bi bi-box-arrow-in-down"></i> Register</a></li>
              </ul>
            </li>
            @endguest
            @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome Back, {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
                <li>
                  <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-in-right"></i> Logout</button>
                  </form>
              </ul>
            </li>
            @endauth
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
        @yield('welcome')
    </div>
    <footer id="contact" class="bg-primary pb-5 mt-3 text-light" style="position: sticky; top: 100%">
        <div class="container">
          <div class="row">
            <div class="col-md-6 mt-3">
          <h1>Farhanhl</h1>
            </div>
          </div>
        </div>
      </footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>