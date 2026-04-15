      <header class="header">
        @php($currentUser = Auth::user())
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-5 col-md-5 col-6">
              <div class="header-left d-flex align-items-center">
                <div class="menu-toggle-btn mr-15">
                </div>
                <div class="header-search d-none d-md-flex">
                </div>
              </div>
            </div>
            <div class="col-lg-7 col-md-7 col-6">
              <div class="header-right">
                <!-- notification start -->
                <!-- notification end -->
                <!-- message start -->
                
                <!-- message end -->
                <!-- profile start -->
                @auth
                <div class="profile-box ml-15">
                  <button class="dropdown-toggle bg-transparent border-0" type="button" id="profile"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="profile-info">
                      <div class="info">
                        <div class="image">
                          <img src="{{ $currentUser?->foto ?: asset('backend/assets/images/profile/profile-image.png') }}" alt="" />
                        </div>
                        <div>
                          <h6 class="fw-500">{{ $currentUser?->name }}</h6>
                          <p>{{ $currentUser?->role }}</p>
                        </div>
                      </div>
                    </div>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profile">
                    <li>
                      <div class="author-info flex items-center !p-1">
                        <div class="image">
                          <img src="{{ $currentUser?->foto ?: asset('backend/assets/images/profile/profile-image.png') }}" alt="image">
                        </div>
                        <div class="content">
                          <h4 class="text-sm">{{ $currentUser?->name }}</h4>
                          <a class="text-black/40 dark:text-white/40 hover:text-black dark:hover:text-white text-xs" href="#">{{ $currentUser?->email }}</a>
                        </div>
                      </div>
                    </li>
                    <li class="divider"></li>
                    <li>
                      <a href="{{ route('profile', $currentUser->id) }}">
                        <i class="lni lni-user"></i> View Profile
                      </a>
                    </li>

                    <li class="divider"></li>
                    <li>
                      <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <i class="lni lni-exit"></i> Sign Out </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form> 
                    </li>
                  </ul>
                </div>
                @endauth
                <!-- profile end -->
              </div>
            </div>
          </div>
        </div>
      </header>
