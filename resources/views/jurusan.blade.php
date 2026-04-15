<!DOCTYPE html>
<html lang="id">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Fraunces:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">

    <title>Detail Jurusan</title>

    <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/templatemo-scholar.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/esa-theme.css') }}">
    <style>
      body.esa-theme {
        font-family: 'Plus Jakarta Sans', sans-serif;
      }

      .esa-jurusan-detail {
        min-height: 100vh;
        padding: 56px 0 72px;
        background:
          radial-gradient(circle at top right, rgba(66, 165, 245, 0.12), transparent 28%),
          linear-gradient(180deg, #f8fbff 0%, #eef4fb 100%);
      }

      .esa-detail-shell {
        max-width: 1180px;
        margin: 0 auto;
      }

      .esa-back-link {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 12px 18px;
        border-radius: 999px;
        background: #ffffff;
        color: var(--esa-primary);
        font-weight: 700;
        text-decoration: none;
        box-shadow: var(--esa-shadow-soft);
        border: 1px solid rgba(21, 101, 192, 0.12);
      }

      .esa-back-link:hover {
        color: var(--esa-primary-deep);
        transform: translateY(-1px);
      }

      .esa-jurusan-card {
        padding: 18px;
        border-radius: 32px;
        background: rgba(255, 255, 255, 0.88);
        border: 1px solid rgba(255, 255, 255, 0.72);
        box-shadow: 0 24px 52px rgba(17, 56, 100, 0.14);
        backdrop-filter: blur(10px);
      }

      .esa-jurusan-copy {
        padding: 22px 10px 22px 6px;
      }

      .esa-jurusan-copy .section-heading h6 {
        display: inline-flex;
        align-items: center;
        min-height: 38px;
        padding: 0 14px;
        border-radius: 999px;
        background: rgba(21, 101, 192, 0.10);
        color: var(--esa-primary);
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        margin-bottom: 18px;
      }

      .esa-jurusan-copy .section-heading h2 {
        font-family: 'Fraunces', serif;
        font-size: clamp(32px, 4.4vw, 54px);
        line-height: 1.08;
        margin-bottom: 18px;
        color: #16324f;
      }

      .esa-jurusan-copy .section-heading p {
        font-size: 16px;
        line-height: 1.9;
        color: #5f7289;
        max-width: 520px;
      }

      .esa-jurusan-media {
        padding: 10px;
      }

      .esa-jurusan-media .contact-us-content {
        padding: 0;
        background: transparent;
        border: 0;
        box-shadow: none;
      }

      .esa-jurusan-image-wrap {
        position: relative;
        overflow: hidden;
        border-radius: 28px;
        min-height: 460px;
        background: linear-gradient(135deg, #dfefff 0%, #edf5ff 100%);
        border: 1px solid rgba(21, 101, 192, 0.10);
      }

      .esa-jurusan-image-wrap::after {
        content: '';
        position: absolute;
        inset: auto -60px -80px auto;
        width: 220px;
        height: 220px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.14);
        pointer-events: none;
      }

      .esa-jurusan-image-wrap img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
      }

      .esa-jurusan-empty {
        min-height: 460px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 32px;
        text-align: center;
        color: #5f7289;
        font-weight: 600;
      }

      @media (max-width: 991px) {
        .esa-jurusan-detail {
          padding: 34px 0 52px;
        }

        .esa-jurusan-copy {
          padding: 10px 4px 0;
        }

        .esa-jurusan-image-wrap,
        .esa-jurusan-empty {
          min-height: 360px;
        }
      }
    </style>
  </head>
<body class="esa-theme esa-frontend">
  <section class="esa-jurusan-detail">
    <div class="container esa-detail-shell">
      <div class="mb-4">
        <a href="{{ route('welcome') }}" class="esa-back-link">
          <i class="fas fa-arrow-left"></i>
          <span>Kembali ke Beranda</span>
        </a>
      </div>

      <div class="contact-us section p-0" id="contact">
        <div class="esa-jurusan-card">
          <div class="row align-items-center g-4">
            <div class="col-lg-6 align-self-center">
              <div class="section-heading esa-jurusan-copy">
                <h6>Jurusan</h6>
                <h2>{{ $jurusan->jurusan }}</h2>
                <p>{{ $jurusan->tentang_jurusan }}</p>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="contact-us-content esa-jurusan-media">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="esa-jurusan-image-wrap">
                      @if($jurusan->foto)
                      <img src="{{ asset('storage/jurusan/' . $jurusan->foto ) }}" alt="{{ $jurusan->jurusan }}" class="main-image" />
                      @else
                      <div class="esa-jurusan-empty">
                        <p class="mb-0">Foto jurusan belum tersedia.</p>
                      </div>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="{{ asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/isotope.min.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/owl-carousel.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/counter.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/custom.js')}}"></script>
  </body>
</html>
