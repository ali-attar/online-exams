<div class="dropdown">
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
    @if (in_array('manager',Auth::user()->permision()) or in_array('admin',Auth::user()->permision() ))
      <li>
        <a class="dropdown-item" href="{{route('class')}}">class</a>
      </li>
      <li>
        <a class="dropdown-item" href="{{route('quiz_sets')}}">exam</a>
      </li>
    @endif  
    @if (in_array('student',Auth::user()->permision()))
      <li>
        <a class="dropdown-item" href="{{route('which_exams')}}">exams</a>
      </li>
    @endif
    <li><a class="dropdown-item" href="#">Action</a></li>
    <li><a class="dropdown-item" href="#">Another action</a></li>
    <li><hr class="dropdown-divider"></li>
  </ul>
</div>

  