<nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
      data-aos="fade-down"
    >
      <div class="container">
        <a href="{{ route( Auth::user() == 'penjual' ? 'penjual.home' : 'pembeli.home') }}" class="navbar-brand">
          <img src="{{ asset('images/logo.svg') }}" alt="logo" />
        </a>
        @if(Auth::user())
        <span class="fs-4">Selamat Datang {{ Auth::user()->name ?? "HomePage"}}</span>
        @endif
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
              <a href="{{ route( Auth::user() == 'penjual' ? 'penjual.home' : 'pembeli.home') }}" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Categories</a>
            </li>
        
            @if(Auth::user())
              @if(Auth::user()->role == 'pembeli')
                <li class="nav-item">
                  <a href="{{ route('pembeli.checkout') }}" class="nav-link" aria-current="page">Profil</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('pembeli.keranjang') }}" class="nav-link" aria-current="page">Keranjang</a>
                </li>
              @endif
            @else
              <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">Sign Up</a>
              </li>
            @endif
            <li class="nav-item">
              @php $stat = Auth::user() ? 'logout' : 'login' @endphp
              <a class="btn btn-danger" href="{{ "/$stat" }}" class="nav-link " aria-current="page">
                  {{ ucfirst($stat) }}
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>