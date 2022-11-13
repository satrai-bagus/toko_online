<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Weesia - Your Best Marketplace</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="{{ asset('style/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('stylesheet/style.css') }}" rel="stylesheet" />
  </head>

  <body>
<nav
      class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top"
      data-aos="fade-down"
    >
      <div class="container">
        <a href="{{ route( Auth::user() == 'penjual' ? 'penjual.home' : 'pembeli.home') }}" class="navbar-brand">
          <img src="{{ asset('images/logo.svg') }}" alt="logo" />
        </a>
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
    <!-- Page Content -->
    <div class="page-content page-details">
      <section
        class="store-breadcrumbs"
        data-aos="fade-down"
        data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav>
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="/index.html">Home</a>
                  </li>
                  <li class="breadcrumb-item active">Detail Produk</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>

      <section class="store-gallery" id="gallery" style="margin-top: 20px">
        <div class="container">
          <div class="row">
            <div class="col-lg-8" data-aos="zoom-in">
                <img
                  style="border-radius: 10px"
                  src="/img/products/{{ $products->gambar }}"
                  class="w-100 main-image mb-3"
                  alt=""
                />
            </div>
            
          </div>
        </div>
      </section>

      <div class="store-details-container" data-aos="fade-up">
        <section class="store-heading">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <h1>{{ $products->nama }}</h1>
                <div class="owner">By Rai</div>
                <div class="price">Rp.{{ $products->harga }}</div>
              </div>
              
            </div>
          </div>
        </section>
        <section class="store-description">
          <div class="container">
            <div class="row">
              <div class="col-12 col-lg-8">
                <p>
                  {{ $products->deskripsi }}
                </p>

                <div class="" data-aos="zoom-in">
                <form action="{{ route('keranjang', $products) }}" method="post">
                @csrf
                <button type="submit"
                  class="btn btn-secondary px-4 text-white btn-block mb-3"
                  >Tambah di keranjang</button
                >
              </div>

              <div class="" data-aos="zoom-in">
                <a 
                  href="/update/{{ $products->id }}"
                  class="btn btn-success px-4 text-white btn-block mb-3"
                  >Checkout</a
                >
              </div>

              </div>
            </div>
          </div>
        </section>
      </div>
    </div>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <p class="pt-4 pb-2">2022 Copyright Weesia. All Rights Reserved</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script
      src="https://code.jquery.com/jquery-3.6.0.js"
      integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
      crossorigin="anonymous"
    ></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="/vendor/vue/vue.js"></script>
    <script src="/script/navbar-scroll.js"></script>
  </body>
</html>
