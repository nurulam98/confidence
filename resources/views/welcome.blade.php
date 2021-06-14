<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Font -->
    <link href="{{ asset('css/fontViga.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/fa-regular.css')}}">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>{{ config('app.name')}}</title>

  </head>
  <body>
    <!-- Navbar -->
    @include('includes.navbarHome')
    <!-- Akhir Navbar -->
      {{-- Jumbotron --}} 
     <div class="jumbotron">
          <div class="container">
          </div>
      </div> 
    {{-- Akhir Jumbotron --}}
    <script src="{{ asset('js/app.js') }}"></script>
<footer class="footer" id="sticky-footer">
		<div class="container text-center">
			<span class="text-muted" style="vertical-align: middle; line-height: 60px; margin-right:auto; margin-left: auto;">
<a href="https://www.facebook.com/confidenceadultcare/" class="fa fa-facebook" alt="facebook"></a>
<a href="https://www.instagram.com/confidenceadultcare/" class="fa fa-instagram" style="margin-left:1%;"></a></span>
<span style="margin-right:auto;"><a href="{{ route('privacyPolicy') }}">Privacy Policy</a></span>
		</div>
	</footer>
  </body>
</html>
