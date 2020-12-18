<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>{{ config('app.name')}}</title>
  </head>
  <body>
    <!-- Navbar -->
    @include('includes.navbarHome')
    <!-- Akhir Navbar -->
    <div class="content">
      {{-- Jumbotron --}}
      <div class="jumbotron jumbotron-fluid">
          <div class="container">
          </div>
      </div>
      <div class="container">
        <div class="content">
          <a href="https://www.facebook.com/confidenceadultcare/" class="fa fa-facebook"></a><a href="https://www.facebook.com/confidenceadultcare/" class="tulisan">Confidence Adult Diapers</a>
          <a href="#" class="alamatweb btn btn-link">www.confidence-adultcare.com</a>
        </div>
      </div>
    </div>
    {{-- Akhir Jumbotron --}}
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>