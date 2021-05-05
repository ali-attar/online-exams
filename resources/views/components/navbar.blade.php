<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{route('home')}}">سامانه ی آزمون</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('permision_view')}}">permision</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('users')}}">users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <form class="d-flex me-auto mb-2 mb-lg-0">
          @guest
            <a href="{{route('login')}}" class="btn"> ورود</a>
            <a href="{{route('register')}}" class="btn"> ثبت نام</a>
          @endguest
          @auth
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             {{Auth::user()->name}}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">


              @if (in_array('admin',Auth::user()->permision() ))
                <li>
                  <a class="dropdown-item btn m-0" href="{{route('users')}}">users</a>
                </li>
                @if (Auth::user()->name=='admin01')
                  <li>
                    <a class="dropdown-item btn m-0" aria-current="page" href="{{route('permision_view')}}">permision</a>
                  </li>
                @endif
              @endif
              @if (in_array('manager',Auth::user()->permision()))
                  <li>
                    <a class="dropdown-item" href="#">class</a>
                  </li>
              @endif


              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>

            </ul>
            <div >
              <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
            </div>
          @endauth
        </form>
      </div>
    </div>
  </nav>