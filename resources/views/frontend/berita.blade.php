@extends('layouts.frontend')

@section('content')
<header class="bg-black py-5">
      <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
          <h1 class="display-4 fw-bolder">PRODUK KAMI</h1>
        </div>
      </div>
</header>



    <!-- Section-->
<section class="py-5">
  <div class="container px-4 px-lg-5 mt-5">
    <h3 class="text-center mb-5">Daftar rak-rak</h3>
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
      <div class="col mb-1">
        <div class="card h-100">
          <!-- Sale badge-->
          <div class="badge badge-custom bg-warning text-white position-absolute" style="top: 0; right: 0">
            Tidak Tersedia
          </div>
          <!-- Product image-->
          <a href="{{ route('detail') }}">
            <img
                class="card-img-top"
                src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                alt="..."
              />
             </a>
          <!-- Product title -->
          <div class="card-body">
            <h5 class="card-title">Judul Produk 1</h5>
          </div>
          <!-- Remove Product actions-->
        </div>
      </div>
      <div class="col mb-1">
        <div class="card h-100">
          <!-- Sale badge-->
          <div class="badge badge-custom bg-success text-white position-absolute" style="top: 0; right: 0">
            Tersedia
          </div>
          <!-- Product image-->
          <a href="{{ route('detail') }}">
            <img
                class="card-img-top"
                src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                alt="..."
              />
             </a>
          <!-- Product title -->
          <div class="card-body">
            <h5 class="card-title">Judul Produk 2</h5>
          </div>
          <!-- Remove Product actions-->
        </div>
      </div>
      <div class="col mb-1">
        <div class="card h-100">
          <!-- Sale badge-->
          <div class="badge badge-custom bg-success text-white position-absolute" style="top: 0; right: 0">
            Tersedia
          </div>
          <!-- Product image-->
          <a href="{{ route('detail') }}">
            <img
                class="card-img-top"
                src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                alt="..."
              />
             </a>
          <!-- Product title -->
          <div class="card-body">
            <h5 class="card-title">Judul Produk 3</h5>
          </div>
          <!-- Remove Product actions-->
        </div>
      </div>
    </div>
  </div>
</section>

@endsection