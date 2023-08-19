<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Post Form</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/css/style.css" rel="stylesheet">

  <link href="/front_end/css/style.css" rel="stylesheet">
  <link href="/back_end/css/style.css" rel="stylesheet">
  @stack('css')

</head>

<body>
    <div id='app'>
        @include('front_end::header')

        <div class="d-flex main-container">
          @include('back_end::sidebar')
  
          @yield('page-content')
        </div>

        @include('front_end::footer')
    </div>

    <script src='/back_end/js/app.js'></script>
    <script src="/assets/js/main.js"></script>

    @stack('script')
    
    </body>
</html>