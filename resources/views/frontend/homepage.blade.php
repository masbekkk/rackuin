@extends('layouts.frontend')

@section('content')
<header class="bg-black py-5">
      <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
          <h1 class="display-4 fw-bolder">RAK</h1>
          <p class="lead fw-normal text-white-50 mb-0">
            mampu menahan baju mu
          </p>
        </div>
      </div>
    </header>
    <section class="py-5">
  <div class="container px-4 px-lg-5 mt-5">
    <h3 class="text-center mb-5">Profil Perusahaan</h3>
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
      <div class="col mb-1">
        <div class="card h-100">
          <!-- Company Logo -->
          <img
            class="card-img-top"
            src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
            alt="Company Logo"
          />
          <!-- Company Information -->
          <div class="card-body">
            <h5 class="card-title">Nama Perusahaan</h5>
            <p class="card-text">
              Alamat Perusahaan<br />
              Telepon: (123) 456-7890<br />
              Email: info@perusahaan.com
            </p>
            <p class="card-text">
              Deskripsi singkat tentang perusahaan Anda.
            </p>
          </div>
        </div>
      </div>
      <!-- Tambahkan bagian lain tentang profil perusahaan, misalnya portofolio, visi dan misi, atau sejarah perusahaan. -->
    </div>
  </div>
</section>


@endsection