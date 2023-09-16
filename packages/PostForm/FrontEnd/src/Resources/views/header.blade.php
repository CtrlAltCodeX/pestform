<!-- ======= Header ======= -->
@if (url()->current() != route('front_end.user.index')
    && url()->current() != route('front_end.register.index'))

  <header id="header" class="fixed-top">
    <div class="px-5 mx-3 d-flex align-items-center justify-content-between">

      <h1 class="logo">
        <img src='/front_end/client-4.png'>
        <a href="/">Post Form</a>
      </h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          @if (! Auth::check())
            <li><a class="nav-link scrollto active" href="/login">Sign In</a></li>
            <li><a class="nav-link scrollto" href="#services">Start new Trail</a></li>
          @endif
          
          @if (Auth::check())
            <li><a class="nav-link scrollto" href="{{ route('back_end.form.index') }}">Dashboard</a></li>
            
            <li><a class="nav-link scrollto" href="{{ route('front_end.user.logout') }}">Log out</a></li>
          @endif
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header>

@endif
<!-- End Header -->
