@extends('layouts.frontend')

@section('content')
<header class="bg-black py-5">
      <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
          <h1 class="display-4 fw-bolder">PRODUK KAMI 1.</h1>
        </div>
      </div>
</header>



    <!-- Section-->
<section class="py-5">
  <div class="container px-4 px-lg-5 mt-5">
    <h3 class="text-center mb-5">Daftar rak-rak</h3>
    
    <div class="category-bar">
  <div class="container">
    <ul class="category-tabs">
      <li class="category-tab active"><a href="{{ route('detail') }}">All</a></li>
      <li class="category-tab"><a href="{{ route('detail') }}">Electronics</a></li>
      <li class="category-tab"><a href="{{ route('detail') }}">Fashion</a></li>
      <li class="category-tab"><a href="{{ route('detail') }}">Home & Living</a></li>
      <li class="category-tab"><a href="{{ route('detail') }}">Toys & Games</a></li>
    </ul>
  </div>
</div>



    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
      <div class="col mb-1">
        <div class="card h-100">
          <!-- Product image-->
          <a href="{{ route('detail') }}">
            <img
              class="card-img-top "
              src="assets/motor.jpg.avif"
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
          <!-- Product image-->
          <a href="{{ route('detail') }}">
            <img
              class="card-img-top"
              src="assets/tes.jpg"
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
      <div class="col mb-1">
        <div class="card h-100">
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
            <h5 class="card-title">Judul Produk 4</h5>
          </div>
          <!-- Remove Product actions-->
        </div>
      </div>
    </div>
  </div>
  <div class="container px-4 px-lg-5 mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
      <div class="col mb-1">
        <div class="card h-100">
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
            <h5 class="card-title">Judul Produk 4</h5>
          </div>
          <!-- Remove Product actions-->
        </div>
      </div>
      <div class="col mb-1">
        <div class="card h-100">
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
            <h5 class="card-title">Judul Produk 5</h5>
          </div>
          <!-- Remove Product actions-->
        </div>
      </div>
      <div class="col mb-1">
        <div class="card h-100">
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
            <h5 class="card-title">Judul Produk 6</h5>
          </div>
          <!-- Remove Product actions-->
        </div>
      </div>
      <div class="col mb-1">
        <div class="card h-100">
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
            <h5 class="card-title">Judul Produk </h5>
          </div>
          <!-- Remove Product actions-->
        </div>
      </div>
    </div>
  </div>
</section>
@endsection