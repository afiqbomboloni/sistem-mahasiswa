<nav class="navbar navbar-expand-lg navbar-light bg-light pt-3 sticky">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('images/unuja_logo.png') }}" alt="" style="width: 50px">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          @if (Auth::check() && Auth::user()->level == 'admin')
            <li class="nav-item">
              <a class="nav-link" href="{{ route('prodi.index') }}">Data Prodi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('kelas.index') }}">Data Kelas</a>
            </li>
          @endif

          @if (Auth::check())
            <li class="nav-item">
              <a class="nav-link" href="{{ route('mahasiswa.index') }}">Data Mahasiswa</a>
            </li>
          @endif
        </ul>
        <ul class="navbar-nav ml-auto">
          @if (Auth::check())
          <li class="nav-item dropdown mr-3">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
              <i class="fa fa-user"></i> Hi, {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
              
              >{{ __('logout') }}</a>
              <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none">
              @csrf
              </form>
            </div>
          </li>
          @endif
          
        </ul>
      </div>
    </div>
  </nav>