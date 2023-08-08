@extends('layouts.frontend')

@section('content')
<header class="bg-black py-5">
      <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
          <h1 class="display-4 fw-bolder">About Us</h1>
        </div>
      </div>
</header>

<section>
  <div class="section-content">
    <div class="card">
      <div style="display: flex;">
        <img src="https://dummyimage.com/300x200/dee2e6/6c757d.jpg" alt="About Us Image" style="flex: 1;">
        <div style="flex: 2; padding-left: 20px;">
          <p>lorem ipsum</p>
        </div>
      </div>
    </div>
  </div>
</section>

  <section>
  <div class="section-content">
    <div class="card">
      <h3>Visi</h3>
      <p>Menginspirasi dan membawa perubahan positif dalam industri kami.</p>
    </div>
    <div class="card">
      <h3>Misi</h3>
      <ul>
        <li>Menghadirkan produk berkualitas tinggi kepada pelanggan kami.</li>
        <li>Memberikan pelayanan terbaik dan pengalaman yang unggul.</li>
        <li>Mendorong inovasi dan pengembangan berkelanjutan.</li>
        <li>Menjadi mitra yang dapat diandalkan bagi komunitas kami.</li>
      </ul>
    </div>
  </div>
</section>
@endsection