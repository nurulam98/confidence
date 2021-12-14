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
    <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>{{ config('app.name')}}</title>

<!-- Script JS -->
<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/vendor/popper.js/popper.min.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('assets/js/carbon.js') }}"></script>
<script src="{{ asset('assets/js/demo.js') }}"></script>
<script>
	$(document).ready(function(){
		setTimeout(function(){$("#myModal").modal('show')},3000);
		//$("#myModal").modal('show');
	});
</script>
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
<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-dialog-centered  modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title text-white"><strong>Perhatian</strong></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body font-weight-bold">
				<p>Caring People,</p>

<p>Rewardvaganza by Confidence akan segera berakhir pada 31 Desember 2021.</p>

<p>Ayo masukkan kuponmu sebanyak mungkin sebelum periode berakhir. Menangkan voucher belanja @250.000 untuk 10 pemenang setiap bulannya.</p>

 

<p>Terima kasih atas perhatiannya.</p>
            </div>
        </div>
    </div>
</div>
  </body>
</html>
