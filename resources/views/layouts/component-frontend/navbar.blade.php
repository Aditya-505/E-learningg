  <header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ route('welcome') }}" class="logo esa-site-logo">
                        <span class="esa-site-logo__mark">eSA</span>
                        <span class="esa-site-logo__text">E-Learning SMK Assalaam</span>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Serach Start ***** -->
                   
                    <!-- ***** Serach Start ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                      @if(Auth::check() && (Auth::user()->role === 'siswa'))
                      <li class="scroll-to-section"><a href="{{ route('user.quizz') }}">Quiz</a></li>
                      <li class="scroll-to-section"><a href="{{ route('user.tugas.index') }}">Tugas</a></li>
                      @endif
                      @if(Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'guru'))
                      <li class="scroll-to-section"><a href="{{ route('home') }}" class="esa-nav-button">Dashboard</a></li>
                      @endif

                      @if (Auth::check())
                      <li>
                          <a href="{{ route('profile', Auth::user()->id) }}" class="esa-nav-button"><img
                                  src="{{ asset('backend/assets/images/profile/profile-image.png') }}"
                                  alt="image" style="width: 40px; border-radius: 50%; border: 2px solid rgba(255,255,255,.25)"></a>
                      </li>
                      @endif
                  </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
