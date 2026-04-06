<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Detail Jurusan</title>

    <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/templatemo-scholar.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css')}}">
  </head>
 <div class="main-button" style="margin-bottom: 24px;">
              <a href="{{ route('welcome') }}">Kembali</a>
            </div>
<body>
  <div class="contact-us section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="section-heading">
            <h6>Jurusan</h6>
            <h2>{{ $jurusan->jurusan }}</h2>
            <p>{{ $jurusan->tentang_jurusan }}</p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="contact-us-content">
            <div class="row">
              <div class="col-lg-12">
                @if($jurusan->foto)
                <img src="{{ asset('storage/jurusan/' . $jurusan->foto ) }}" alt="{{ $jurusan->jurusan }}" class="main-image" />
                @else
                <p>Foto jurusan belum tersedia.</p>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/isotope.min.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/owl-carousel.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/counter.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/custom.js')}}"></script>
  </body>
</html>
