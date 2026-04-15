<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="{{ asset('assets/images/logos/esa.png') }}" rel="icon">
  <title>ESA E-Learning SMK Assalaam</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/fontawesome.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/templatemo-scholar.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.css')}}">
  <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.css')}}">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
  <link rel="stylesheet" href="{{ asset('assets/css/esa-theme.css') }}"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Fraunces:ital,wght@0,600;0,700;1,600&display=swap" rel="stylesheet">

  <style>
    /* ─── Design Tokens ─────────────────────────────────── */
    :root {
      --blue-950: #071a33;
      --blue-900: #0d2748;
      --blue-800: #113864;
      --blue-600: #1a5fb4;
      --blue-500: #2272d6;
      --blue-400: #4b90e8;
      --blue-200: #a8cbf5;
      --blue-100: #dbeafe;
      --blue-50:  #eff6ff;
      --gold-500: #f59e0b;
      --gold-400: #fbbf24;
      --white:    #ffffff;
      --gray-50:  #f8fafc;
      --gray-100: #f1f5f9;
      --gray-200: #e2e8f0;
      --gray-400: #94a3b8;
      --gray-600: #475569;
      --gray-800: #1e293b;
      --radius-sm: 10px;
      --radius-md: 16px;
      --radius-lg: 24px;
      --radius-xl: 32px;
      --shadow-sm: 0 2px 8px rgba(7,26,51,0.08);
      --shadow-md: 0 8px 24px rgba(7,26,51,0.12);
      --shadow-lg: 0 20px 48px rgba(7,26,51,0.16);
      --shadow-xl: 0 32px 64px rgba(7,26,51,0.20);
    }

    *, *::before, *::after { box-sizing: border-box; }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background: var(--white);
      color: var(--gray-800);
      -webkit-font-smoothing: antialiased;
    }

    /* ─── Hero / Banner ──────────────────────────────────── */
    .esa-hero {
      background: linear-gradient(135deg, var(--blue-950) 0%, var(--blue-800) 55%, #1a4f8a 100%);
      position: relative;
      overflow: hidden;
      padding-top: 90px;
    }

    .esa-hero::before {
      content: '';
      position: absolute;
      inset: 0;
      background:
        radial-gradient(ellipse 80% 60% at 70% 50%, rgba(66,133,244,0.18) 0%, transparent 70%),
        radial-gradient(circle at 10% 80%, rgba(245,158,11,0.12) 0%, transparent 50%);
      pointer-events: none;
    }

    /* Decorative grid lines */
    .esa-hero::after {
      content: '';
      position: absolute;
      inset: 0;
      background-image:
        linear-gradient(rgba(255,255,255,0.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.04) 1px, transparent 1px);
      background-size: 60px 60px;
      pointer-events: none;
    }

    .hero-orb {
      position: absolute;
      border-radius: 50%;
      pointer-events: none;
    }
    .hero-orb-1 {
      width: 440px; height: 440px;
      top: -120px; right: -80px;
      background: radial-gradient(circle, rgba(66,144,232,0.22) 0%, transparent 70%);
    }
    .hero-orb-2 {
      width: 220px; height: 220px;
      bottom: -60px; left: 8%;
      background: radial-gradient(circle, rgba(245,158,11,0.18) 0%, transparent 70%);
    }

    .esa-hero .container { position: relative; z-index: 2; }

    .owl-banner .item {
      padding: 112px 0 124px;
      min-height: 620px;
      display: flex;
      align-items: center;
    }

    .hero-copy {
      max-width: 590px;
      padding: 24px 0 32px 20px;
    }

    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: rgba(255,255,255,0.12);
      border: 1px solid rgba(255,255,255,0.18);
      backdrop-filter: blur(8px);
      border-radius: 999px;
      padding: 6px 16px 6px 10px;
      color: #fff;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: 0.02em;
      margin-bottom: 24px;
    }

    .hero-badge .dot {
      width: 8px; height: 8px;
      border-radius: 50%;
      background: var(--gold-400);
      box-shadow: 0 0 0 3px rgba(251,191,36,0.3);
      animation: pulse-dot 2s infinite;
    }

    @keyframes pulse-dot {
      0%, 100% { box-shadow: 0 0 0 3px rgba(251,191,36,0.3); }
      50%       { box-shadow: 0 0 0 6px rgba(251,191,36,0.12); }
    }

    .hero-title {
      font-family: 'Fraunces', serif;
      font-size: clamp(34px, 5vw, 58px);
      font-weight: 700;
      color: #fff;
      line-height: 1.1;
      margin-bottom: 20px;
      letter-spacing: -0.02em;
      max-width: 540px;
    }

    .hero-title em {
      font-style: italic;
      color: var(--gold-400);
    }

    .hero-desc {
      font-size: 16px;
      color: rgba(255,255,255,0.72);
      line-height: 1.75;
      max-width: 500px;
      margin-bottom: 40px;
    }

    .hero-stat-row {
      display: flex;
      flex-wrap: wrap;
      gap: 32px;
      border-top: 1px solid rgba(255,255,255,0.12);
      padding-top: 28px;
      margin-top: 6px;
      max-width: 580px;
    }

    .hero-stat span {
      display: block;
    }
    .hero-stat .num {
      font-size: 26px;
      font-weight: 800;
      color: #fff;
      letter-spacing: -0.02em;
    }
    .hero-stat .lbl {
      font-size: 12px;
      color: rgba(255,255,255,0.55);
      font-weight: 500;
      margin-top: 2px;
    }

    /* ─── Section Common ─────────────────────────────────── */
    .esa-section {
      padding: 88px 0;
    }
    .esa-section-alt {
      background: var(--gray-50);
    }

    .section-tag {
      display: inline-block;
      background: var(--blue-50);
      color: var(--blue-600);
      font-size: 12px;
      font-weight: 700;
      letter-spacing: 0.08em;
      text-transform: uppercase;
      padding: 5px 14px;
      border-radius: 999px;
      margin-bottom: 14px;
    }

    .section-title-main {
      font-family: 'Fraunces', serif;
      font-size: clamp(26px, 3.5vw, 40px);
      font-weight: 700;
      color: var(--gray-800);
      line-height: 1.2;
      letter-spacing: -0.02em;
      margin-bottom: 14px;
    }

    .section-desc {
      font-size: 15px;
      color: var(--gray-600);
      line-height: 1.75;
      max-width: 560px;
      margin: 0 auto;
    }

    /* ─── Filter Pills ────────────────────────────────────── */
    .esa-filter-bar {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-bottom: 40px;
    }

    .esa-filter-bar a {
      display: inline-block;
      padding: 8px 20px;
      border-radius: 999px;
      font-size: 13px;
      font-weight: 600;
      color: var(--gray-600);
      background: var(--white);
      border: 1.5px solid var(--gray-200);
      text-decoration: none;
      transition: all 0.2s;
    }

    .esa-filter-bar a:hover,
    .esa-filter-bar a.active {
      background: var(--blue-600);
      border-color: var(--blue-600);
      color: #fff;
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(26,95,180,0.28);
    }

    /* ─── Jurusan Cards ──────────────────────────────────── */
    .jurusan-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 24px;
    }

    @media (max-width: 991px) { .jurusan-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 575px) { .jurusan-grid { grid-template-columns: 1fr; } }

    .jurusan-card {
      background: var(--white);
      border-radius: var(--radius-lg);
      border: 1.5px solid var(--gray-200);
      overflow: hidden;
      transition: transform 0.28s cubic-bezier(.22,.68,0,1.2), box-shadow 0.28s ease, border-color 0.2s;
      cursor: pointer;
    }

    .jurusan-card:hover {
      transform: translateY(-8px);
      box-shadow: var(--shadow-lg);
      border-color: var(--blue-200);
    }

    .jurusan-card-img {
      position: relative;
      height: 200px;
      overflow: hidden;
    }

    .jurusan-card-img img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .jurusan-card:hover .jurusan-card-img img {
      transform: scale(1.06);
    }

    .jurusan-card-img-placeholder {
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg, var(--blue-50) 0%, var(--blue-100) 100%);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--blue-400);
    }

    .jurusan-card-img-placeholder svg {
      width: 48px; height: 48px; opacity: 0.5;
    }

    .jurusan-label {
      position: absolute;
      top: 14px; left: 14px;
      background: var(--blue-600);
      color: #fff;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.05em;
      text-transform: uppercase;
      padding: 4px 12px;
      border-radius: 999px;
    }

    .jurusan-card-body {
      padding: 22px 24px 24px;
    }

    .jurusan-card-meta {
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.06em;
      text-transform: uppercase;
      color: var(--blue-500);
      margin-bottom: 8px;
    }

    .jurusan-card-title {
      font-size: 17px;
      font-weight: 700;
      color: var(--gray-800);
      margin-bottom: 10px;
      line-height: 1.3;
    }

    .jurusan-card-desc {
      font-size: 13px;
      color: var(--gray-600);
      line-height: 1.65;
      margin-bottom: 18px;
    }

    .jurusan-card-link {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      font-size: 13px;
      font-weight: 700;
      color: var(--blue-600);
      text-decoration: none;
      transition: gap 0.2s;
    }

    .jurusan-card-link:hover {
      gap: 10px;
      color: var(--blue-500);
    }

    /* ─── Team Section ───────────────────────────────────── */
    .esa-team-section {
      background: var(--blue-950);
      padding: 88px 0;
      position: relative;
      overflow: hidden;
    }

    .esa-team-section::before {
      content: '';
      position: absolute;
      inset: 0;
      background-image:
        linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px);
      background-size: 48px 48px;
    }

    .esa-team-section .section-tag {
      background: rgba(255,255,255,0.1);
      color: var(--blue-200);
    }

    .esa-team-section .section-title-main {
      color: #fff;
    }

    .esa-team-section .section-desc {
      color: rgba(255,255,255,0.55);
    }

    .team-scroll-outer {
      position: relative;
      overflow: hidden;
      margin: 0 -8px;
      padding: 0 8px;
    }

    .team-track {
      display: flex;
      gap: 20px;
      transition: transform 0.4s cubic-bezier(.22,.68,0,1.1);
      will-change: transform;
    }

    .teacher-card {
      flex: 0 0 calc(25% - 15px);
      min-width: 220px;
    }

    @media (max-width: 991px) { .teacher-card { flex: 0 0 calc(33.33% - 14px); } }
    @media (max-width: 767px) { .teacher-card { flex: 0 0 calc(50% - 10px); } }
    @media (max-width: 480px) { .teacher-card { flex: 0 0 220px; } }

    .teacher-card-inner {
      background: rgba(255,255,255,0.06);
      border: 1px solid rgba(255,255,255,0.1);
      border-radius: var(--radius-lg);
      overflow: hidden;
      transition: transform 0.25s ease, background 0.25s ease;
      backdrop-filter: blur(4px);
    }

    .teacher-card:hover .teacher-card-inner {
      transform: translateY(-6px);
      background: rgba(255,255,255,0.1);
    }

    .teacher-img-wrap {
      height: 200px;
      overflow: hidden;
    }

    .teacher-img-wrap img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.5s ease;
    }

    .teacher-card:hover .teacher-img-wrap img {
      transform: scale(1.05);
    }

    .teacher-card-body {
      padding: 18px 18px 20px;
    }

    .teacher-role-badge {
      display: inline-block;
      background: rgba(66,144,232,0.2);
      color: var(--blue-200);
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.05em;
      text-transform: uppercase;
      padding: 3px 10px;
      border-radius: 999px;
      margin-bottom: 10px;
    }

    .teacher-name {
      font-size: 15px;
      font-weight: 700;
      color: #fff;
      line-height: 1.35;
    }

    /* Scroll nav buttons */
    .scroll-nav {
      display: flex;
      gap: 10px;
      justify-content: flex-end;
      margin-bottom: 28px;
    }

    .scroll-nav-btn {
      width: 42px; height: 42px;
      border-radius: 50%;
      border: 1.5px solid rgba(255,255,255,0.2);
      background: rgba(255,255,255,0.08);
      color: #fff;
      display: flex; align-items: center; justify-content: center;
      cursor: pointer;
      transition: all 0.2s;
      font-size: 14px;
    }

    .scroll-nav-btn:hover:not(:disabled) {
      background: var(--blue-600);
      border-color: var(--blue-600);
      transform: scale(1.08);
    }

    .scroll-nav-btn:disabled {
      opacity: 0.3;
      cursor: not-allowed;
    }

    /* ─── Fade-in on scroll ──────────────────────────────── */
    .reveal {
      opacity: 0;
      transform: translateY(28px);
      transition: opacity 0.55s ease, transform 0.55s ease;
    }
    .reveal.in-view {
      opacity: 1;
      transform: translateY(0);
    }
    .reveal-delay-1 { transition-delay: 0.1s; }
    .reveal-delay-2 { transition-delay: 0.2s; }
    .reveal-delay-3 { transition-delay: 0.3s; }

    /* ─── Materi image util ──────────────────────────────── */
    .materi-image {
      width: 100%;
      height: 200px;
      object-fit: cover;
    }

    /* ─── Responsive hero fix ────────────────────────────── */
    @media (max-width: 767px) {
      .owl-banner .item {
        padding: 88px 0 84px;
        min-height: 520px;
      }
      .hero-copy {
        padding: 12px 4px 20px;
      }
      .hero-stat-row { gap: 20px; }
    }
  </style>
</head>

<body class="esa-theme esa-frontend">

  <!-- Preloader -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots"><span></span><span></span><span></span></div>
    </div>
  </div>

  @include('layouts.component-frontend.navbar')

  <!-- ══════════════════════════════════════════════
       HERO BANNER
  ══════════════════════════════════════════════ -->
  <section class="esa-hero" id="top">
    <div class="hero-orb hero-orb-1"></div>
    <div class="hero-orb hero-orb-2"></div>

    <div class="container">
      <div class="owl-carousel owl-banner">

        <div class="item">
          <div class="hero-copy">
            <div class="hero-badge">
              <span class="dot"></span>
              ESA Learning Space
            </div>
            <h1 class="hero-title"><em>Belajar lebih rapi, cepat, dan terhubung dalam satu sistem.</em></h1>
            <p class="hero-desc">Website e-learning SMK Assalaam untuk mendukung pembelajaran daring — akses materi, tugas, dan quiz dengan pengalaman yang lebih nyaman.</p>
            <div class="hero-stat-row">
              <div class="hero-stat"><span class="num">100+</span><span class="lbl">Materi aktif</span></div>
              <div class="hero-stat"><span class="num">20+</span><span class="lbl">Pengajar</span></div>
              <div class="hero-stat"><span class="num">1000+</span><span class="lbl">Siswa terdaftar</span></div>
            </div>
          </div>
        </div>

        <div class="item">
          <div class="hero-copy">
            <div class="hero-badge">
              <span class="dot"></span>
              Belajar Fleksibel
            </div>
            <h1 class="hero-title"><em>Akses kelas dan materi kapan saja saat Anda membutuhkannya.</em></h1>
            <p class="hero-desc">Semua kebutuhan belajar siswa dibuat lebih ringkas — dari materi pembelajaran sampai tugas dan quiz dari guru.</p>
            <div class="hero-stat-row">
              <div class="hero-stat"><span class="num">24/7</span><span class="lbl">Akses kapan saja</span></div>
              <div class="hero-stat"><span class="num">Mobile</span><span class="lbl">Friendly</span></div>
            </div>
          </div>
        </div>

        <div class="item">
          <div class="hero-copy">
            <div class="hero-badge">
              <span class="dot"></span>
              Terintegrasi
            </div>
            <h1 class="hero-title"><em>Serasi dengan ESA Mobile di smartphone Anda.</em></h1>
            <p class="hero-desc">Tampilan modern dan konsisten membantu pengalaman belajar tetap nyaman, baik di web maupun di aplikasi Flutter ESA Mobile.</p>
            <div class="hero-stat-row">
              <div class="hero-stat"><span class="num">Web</span><span class="lbl">& Mobile</span></div>
              <div class="hero-stat"><span class="num">Sync</span><span class="lbl">Real-time</span></div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <!-- ══════════════════════════════════════════════
       JURUSAN SECTION
  ══════════════════════════════════════════════ -->
  <section class="esa-section" id="courses">
    <div class="container">
      <div class="text-center reveal" style="margin-bottom: 44px;">
        <span class="section-tag">Program Keahlian</span>
        <h2 class="section-title-main">Pilih Jurusanmu</h2>
        <p class="section-desc">Kenali program keahlian yang tersedia di SMK Assalaam. Setiap jurusan punya fokus belajar dan pengalaman yang berbeda.</p>
      </div>

      <div class="esa-filter-bar reveal reveal-delay-1">
        <a href="{{ route('welcome') }}" class="active">Semua Jurusan</a>
        @foreach($allJurusan as $data)
          <a href="{{ route('welcome', ['search' => $data->id]) }}">{{ $data->jurusan }}</a>
        @endforeach
      </div>

      <div class="jurusan-grid">
        @foreach($jurusan as $index => $data)
          <div class="reveal" style="transition-delay: {{ $index * 0.08 }}s">
            <a href="{{ route('jurusan.show', $data->id) }}" style="text-decoration:none">
              <div class="jurusan-card">
                <div class="jurusan-card-img">
                  @if($data->foto)
                    <img src="{{ asset('/storage/jurusan/' . $data->foto) }}" alt="{{ $data->jurusan }}">
                  @else
                    <div class="jurusan-card-img-placeholder">
                      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M12 14l9-5-9-5-9 5 9 5z"/><path d="M12 14l6.16-3.422A12 12 0 0 1 12 21a12 12 0 0 1-6.16-10.422L12 14z"/>
                      </svg>
                    </div>
                  @endif
                  <span class="jurusan-label">Jurusan</span>
                </div>
                <div class="jurusan-card-body">
                  <div class="jurusan-card-meta">Program Keahlian</div>
                  <h3 class="jurusan-card-title">{{ $data->jurusan }}</h3>
                  <p class="jurusan-card-desc">{{ \Illuminate\Support\Str::limit($data->tentang_jurusan, 90) }}</p>
                  <span class="jurusan-card-link">
                    Lihat detail
                    <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><path d="M3 8h10M9 4l4 4-4 4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>
                  </span>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ══════════════════════════════════════════════
       TEACHER SECTION
  ══════════════════════════════════════════════ -->
  <section class="esa-team-section" id="team">
    <div class="container" style="position:relative;z-index:2">
      <div style="display:flex; align-items:flex-end; justify-content:space-between; flex-wrap:wrap; gap:16px; margin-bottom:36px;">
        <div class="reveal">
          <span class="section-tag">Tim Pengajar</span>
          <h2 class="section-title-main" style="margin-bottom:10px">Pengajar SMK Assalaam</h2>
          <p class="section-desc" style="text-align:left; max-width:440px">Tim pengajar yang mendampingi proses belajar siswa dengan materi, tugas, dan evaluasi terstruktur.</p>
        </div>
        <div class="scroll-nav reveal reveal-delay-1" id="teamScrollNav">
          <button class="scroll-nav-btn" id="teamPrev" onclick="scrollTeam(-1)" aria-label="Sebelumnya">
            <i class="fas fa-chevron-left"></i>
          </button>
          <button class="scroll-nav-btn" id="teamNext" onclick="scrollTeam(1)" aria-label="Berikutnya">
            <i class="fas fa-chevron-right"></i>
          </button>
        </div>
      </div>

      <div class="team-scroll-outer">
        <div class="team-track" id="teamWrapper">
          @foreach($guru as $data)
            <div class="teacher-card">
              <div class="teacher-card-inner">
                <div class="teacher-img-wrap">
                  <img src="{{ asset('storage/guru/' . $data->foto) }}" alt="{{ $data->name }}">
                </div>
                <div class="teacher-card-body">
                  <span class="teacher-role-badge">Guru</span>
                  <h4 class="teacher-name">{{ $data->name }}</h4>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  @include('layouts.component-frontend.footer')

  <!-- Scripts -->
  <script src="{{ asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/isotope.min.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/owl-carousel.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/counter.js')}}"></script>
  <script src="{{ asset('frontend/assets/js/custom.js')}}"></script>

  <script>
    /* ── Team Slider ─────────────────────────────────── */
    (function () {
      var pos = 0;
      var wrapper = document.getElementById('teamWrapper');
      var members = wrapper ? wrapper.querySelectorAll('.teacher-card') : [];
      var total = members.length;
      var ITEM_W = 240; // card width + gap

      function visible() {
        if (window.innerWidth >= 992) return 4;
        if (window.innerWidth >= 768) return 3;
        if (window.innerWidth >= 481) return 2;
        return 1;
      }

      function maxPos() { return Math.max(0, total - visible()); }

      function render() {
        if (!wrapper) return;
        wrapper.style.transform = 'translateX(' + (-pos * ITEM_W) + 'px)';
        document.getElementById('teamPrev').disabled = pos <= 0;
        document.getElementById('teamNext').disabled = pos >= maxPos();
        if (total <= visible()) {
          document.getElementById('teamScrollNav').style.display = 'none';
        }
      }

      window.scrollTeam = function (dir) {
        var np = pos + dir;
        if (np >= 0 && np <= maxPos()) { pos = np; render(); }
      };

      window.addEventListener('resize', function () { pos = Math.min(pos, maxPos()); render(); });
      render();

      /* Touch swipe */
      var startX = 0;
      if (wrapper) {
        wrapper.addEventListener('touchstart', function (e) { startX = e.touches[0].clientX; }, { passive: true });
        wrapper.addEventListener('touchend', function (e) {
          var diff = startX - e.changedTouches[0].clientX;
          if (Math.abs(diff) > 48) scrollTeam(diff > 0 ? 1 : -1);
        });
      }
    })();

    /* ── Scroll reveal ──────────────────────────────── */
    (function () {
      var els = document.querySelectorAll('.reveal');
      if (!('IntersectionObserver' in window)) {
        els.forEach(function (el) { el.classList.add('in-view'); });
        return;
      }
      var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('in-view');
            io.unobserve(entry.target);
          }
        });
      }, { threshold: 0.12 });
      els.forEach(function (el) { io.observe(el); });
    })();
  </script>
</body>
</html>
