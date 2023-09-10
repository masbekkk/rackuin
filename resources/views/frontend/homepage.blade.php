@extends('layouts.frontend')

@section('content')
    <style>
        section {
            padding: 40px 0;
            text-align: center;
        }

        .section-title {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .section-content {
            max-width: 1100px;
            margin: 0 auto;
        }

        .card {
            border: 1px solid #ddd;
            padding: 20px;
            margin: 20px;
            box-shadow: 0px 2px 6px rgba(0, 0, 0, 0.1);
        }

        .card img {
            max-width: 100%;
            height: auto;
        }

        .image-container {
            position: relative;
            overflow: hidden;
            padding-bottom: 66.67%;
            /* 3:2 aspect ratio */
        }

        .image-container img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* CSS */
        .header-with-background {
            background-image: url('assets/bg3.png');
            background-size: cover; /* Untuk menyesuaikan gambar dengan elemen */
            background-repeat: no-repeat; /* Untuk menghindari pengulangan gambar */
            color: white; /* Warna teks */
            padding: 50px; /* Spasi dalam elemen */
        }

    </style>

    <!-- HTML -->
    <header class="bg-black py-5 header-with-background">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-start text-white">
                <h1 class="display-4 fw-bolder">PABRIK RAK FASHION DAN RAK SUPER MARKET BERSKALA NASIONAL</h1>
                <p class="lead fw-normal text-white-50 mb-0">RAKUIN adalah brand rak butik dan rak supermarket berskala nasional yang menjamin kualitas pada setiap produk yang di produksi demi kepercayaan dan kepuasan pelanggan. Rakuin memberikan solusi untuk berbagaimacam kebutuhan rak toko dan rak butik seperti gawang baju, rak sepatu, rak rokok dan masih banyak lagi.
                Rakuin berkomitmen dan memiliki visi yaitu untuk selalu menjadi perusahaan yang mampu mendistribusikan rak supermarket dan fashion display berskala nasional dan dikenal sebagai produsen yang terpercaya,inovatif, kreatif dan berkualitas dengan harga terjangkau.
                </p>
            </div>
        </div>
    </header>



    <!-- section -->
    <section style="background-color: #f8f9fa;">
        <div class="section-content">
            <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner">
                    @foreach ($images as $key => $image)
                        <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                            <a href="{{ route('detail', ['id' => $image->product_id]) }}">
                                <img src="{{ $image->images ?? '' }}" class="d-block w-100" alt="Carousel Image 2">
                                <div class="carousel-caption">
                                    <p>{{ $image->product->name ?? '' }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#imageCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#imageCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>








    <section>
        <div class="section-content">
            <h2 class="section-title">Mengapa Harus Beli di Rakuin</h2>
            <div class="row justify-content-center">
                <div class="col-10 col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <!-- Product title -->
                        <div class="card-body text-center">
                            <h5 class="card-title">KUALITAS TERJAMIN</h5>
                            <p class="card-text">rakuin memastikan produk yang dibuat kokoh dan tahan lama, serta melakukan quality control yang ketat untuk kepuasan pelanggan.</p>
                        </div>
                        <!-- Remove Product actions-->
                    </div>
                </div>
                <div class="col-10 col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <!-- Product title -->
                        <div class="card-body text-center">
                            <h5 class="card-title">BERGARANSI</h5>
                            <p class="card-text">rakuin memberikan garansi tukar barang hingga pengembalian dana apabila ada produk yang cacat produksi.</p>
                        </div>
                        <!-- Remove Product actions-->
                    </div>
                </div>
                <div class="col-10 col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <!-- Product title -->
                        <div class="card-body text-center">
                            <h5 class="card-title">PENGIRIMAN SELURUH INDONESIA</h5>
                            <p class="card-text">pengiriman produk rakuin dapat menjangkau seluruh indonesia melalui ekspedisi pilihan.</p>
                        </div>
                        <!-- Remove Product actions-->
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10 col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <!-- Product title -->
                        <div class="card-body text-center">
                            <h5 class="card-title">BISA CUSTOM</h5>
                            <p class="card-text">rakuin menyediakan jasa custom produk sesuai dengan keinginan anda.</p>
                        </div>
                        <!-- Remove Product actions-->
                    </div>
                </div>
                <div class="col-10 col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <!-- Product title -->
                        <div class="card-body text-center">
                            <h5 class="card-title">PROFESIONAL</h5>
                            <p class="card-text">rakuin menyediakan pelayanan yang profesional untuk kepuasan pelanggan kami.</p>
                        </div>
                        <!-- Remove Product actions-->
                    </div>
                </div>
            </div>
    </section>
    <section>
        <div class="section-content">
            <h2 class="section-title">Testimoni Pelanggan</h2>
            <div class="row justify-content-center">
                @foreach ($testimonies as $testimoni)
                    <div class="col-md-3 mb-4">
                        <div class="card testimonial-card">
                            <img src="{{ asset($testimoni->image ?? '') }}" class="card-img-top" alt="Foto Testimoni 1">
                            <div class="card-body">
                                <p class="card-text">{{ $testimoni->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section style="background-color: #f8f9fa;">
        <div class="container">
            <div class="section-content">
                <h2 class="section-title">FAQ</h2>
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                apa saja produk yang dijual di rakuin?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body fs-6">
                            rakuin menyediakan berbagaimacam kebutuhan rak display untuk rumah tangga, toko atau supermarket, dan butik.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                bahan apa yang digunakan oleh rakuin?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body fs-6">
                            kami menggunakan bahan besi hollow tebal dengan finishing powder coating yang tentunya membuat produk kami kokoh dan tahan lama.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                apakah bisa custom rak baju?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body fs-6">
                            rakuin menyediakan jasa custom produk sesuai dengan keinginan anda, silahkan konsultasi dan dapatkan design gratis dengan syarat yang berlaku.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                bisa dikirim kemana saja?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body fs-6">
                            rakuin dapat mengirimkan produk yang anda pesan ke seluruh indonesia dengan ekspedisi yang anda inginkan. khusus daerah surabaya, sidoarjo, dan gresik  dapatkan free ongkir dengan minimum pembelian 3juta
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal Add Data Warna -->
    {{-- <div class="modal fade" id="downloadKatalogModal" tabindex="-1" aria-labelledby="downloadKatalogModalLabel"
        aria-hidden="true">
        <div class="modal-content">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-header">
                    <div class="modal-title">
                        Silakan isi biodata Anda untuk mengunduh katalog.
                    </div>
                </div>
                <div class="modal-body">
                    <form action="process_form.php" method="POST">
                        <!-- Replace with the actual form processing script -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="modal" id="downloadKatalogModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Silakan isi biodata Anda untuk mengunduh katalog.</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('download.catalog')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Nomor Hp</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            {{-- <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
          </div>
        </div>
      </div>
    <section class="py-3">
        <div class="container px-2 px-md-4 mt-3">
            
            <div class="card">
                <div class="card-body pt-3">
                    <div class="text-center">
                        <h5 class="fw-bolder">Download Katalog</h5>
                        {{-- <p>Isi biodata Anda untuk mengunduh katalog.</p> --}}
                        <a data-bs-toggle="modal" data-bs-target="#downloadKatalogModal" class="btn btn-primary mt-2"
                           role="button">Download
                            Katalog</a>
                        <!-- Replace "download_link.php" with the actual download link -->
                    </div>
                </div>
            </div>
      
        </div>
        </div>
    </section>

    <section style="background-color: #f8f9fa;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-4">
                    <h2 class="section-title">Hubungi Kami</h2>
                    <a href="https://api.whatsapp.com/send?phone=62818522299&text=Hai%20Kak,%20saya%20mau%20tanya-tanya%20mengenai%20produk%20rakuin%20%F0%9F%98%8A" target="_blank" class="btn btn-success">
                        <i class="fab fa-whatsapp me-2"></i>Hubungi melalui WhatsApp
                    </a>
                </div>

                <div>
                    <h2 class="section-title">Program Reseller</h2>
                    <a href="https://wa.me/1234567890" target="_blank" class="btn btn-success">
                        <i class="fab fa-whatsapp me-2"></i>Daftar Sekarang
                    </a>
                </div>
            </div>

            <div class="col-md-6">
                <div class="embed-responsive embed-responsive-4by3">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.8857034638845!2d112.62081627478668!3d-7.253847292752759!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fff0eef14051%3A0xb842d5ac022dee24!2sRAKUIN!5e0!3m2!1sid!2sid!4v1694065061691!5m2!1sid!2sid" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>





@endsection
