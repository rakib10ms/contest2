
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="{{url('/')}}">Contest</a></h1>
      <a href="{{url('/')}}" class="logo me-auto">
        <img src="{{asset('frontend/assets/img/logo.png')}}" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="{{ request()->is('/') ? 'active' : '' }}"href="{{url('/')}}">Home</a></li>
          <li><a class="{{ request()->is('/contest') ? 'active' : '' }}" href="{{route('contest')}}">Running Contest</a></li>
          <li><a class="{{ request()->is('/past-contest') ? 'active' : '' }}" href="{{route('past-contest')}}">Past Contest</a></li>
          <li><a class="{{ request()->is('/about') ? 'active' : '' }}" href="{{url('/about')}}">About</a></li>

          <li><a class="{{ request()->is('/contact') ? 'active' : '' }}" href="{{url('/contact')}}">Contact</a></li>


          @guest
          @if (Route::has('login'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
          @endif

          @if (Route::has('register'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              </li>
          @endif
      @else
          <li class="nav-item dropdown ">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  <i class="bx bx-bell mt-4 " style="color:red;font-size:30px;">
                    <span class="badge badge-danger" style="font-size: 12px;margin-left:-18px;margin-top:-20px;">
                        @if(Illuminate\Support\Facades\Auth::check())
                        @if(Auth::user()->role_id==0)
                       {{ auth()->user()->unreadnotifications->count()}}
                       @endif
                        @endif
                    </span>
                </i>
              </a>
          <div class="dropdown-menu dropdown-menu-right drop" aria-labelledby="navbarDropdown" style="width:400px;padding: 6px;">

         <a class="dropdown-item" href="{{route('markAsRead')}}" style="color:green;background-color:#f1f1f1;"> Mark all as read</a>
          @if(Illuminate\Support\Facades\Auth::check())
               
             @if(Auth::user()->role_id==0)
                  @forelse(auth()->user()->notifications as $notification)
                      <a class="dropdown-item">{{$notification->data['description']}} </a>
                  @empty
                  <a class="">No Notification </a>
                  @endforelse
                
          @endif
        @endif
                       
         </div>
         </li>


          <li class="nav-item dropdown">

              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
                  <i class="fas fa-angle-down"></i>
              </a>

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                   <a class="dropdown-item" href="{{route('my-profile')}}">My Profile</a>
                   <a class="dropdown-item" href="{{route('my-contest')}}">My Contest</a>
               <a class="dropdown-item" href="#">Settings</a>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
              </div>
          </li>
      @endguest
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      {{-- <a href="courses.html" class="get-started-btn">Get Started</a> --}}

    </div>
  </header><!-- End Header -->










