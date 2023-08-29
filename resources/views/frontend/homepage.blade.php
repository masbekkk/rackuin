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
    </style>

    <header class="bg-black py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-start text-white">
                <h1 class="display-4 fw-bolder">Pabrik Rak Mini Market dan Rak Gudang</h1>
                <p class="lead fw-normal text-white-50 mb-0">Lorem ipsum, atau ringkasnya lipsum, adalah teks standar yang
                    ditempatkan untuk mendemostrasikan elemen grafis atau presentasi visual seperti font, tipografi, dan
                    tata letak</p>
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
            <h2 class="section-title">Mengapa Harus Beli di Rakindo</h2>
            <div class="row justify-content-center">
                <div class="col-10 col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <!-- Product title -->
                        <div class="card-body text-center">
                            <h5 class="card-title">Judul Produk 1</h5>
                            <p class="card-text">Deskripsi produk 1</p>
                        </div>
                        <!-- Remove Product actions-->
                    </div>
                </div>
                <div class="col-10 col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <!-- Product title -->
                        <div class="card-body text-center">
                            <h5 class="card-title">Judul Produk 2</h5>
                            <p class="card-text">Deskripsi produk 2</p>
                        </div>
                        <!-- Remove Product actions-->
                    </div>
                </div>
                <div class="col-10 col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <!-- Product title -->
                        <div class="card-body text-center">
                            <h5 class="card-title">Judul Produk 3</h5>
                            <p class="card-text">Deskripsi produk 3</p>
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
                            <h5 class="card-title">Judul Produk 4</h5>
                            <p class="card-text">Deskripsi produk 4</p>
                        </div>
                        <!-- Remove Product actions-->
                    </div>
                </div>
                <div class="col-10 col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <!-- Product title -->
                        <div class="card-body text-center">
                            <h5 class="card-title">Judul Produk 5</h5>
                            <p class="card-text">Deskripsi produk 5</p>
                        </div>
                        <!-- Remove Product actions-->
                    </div>
                </div>
                <div class="col-10 col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <!-- Product title -->
                        <div class="card-body text-center">
                            <h5 class="card-title">Judul Produk 6</h5>
                            <p class="card-text">Deskripsi produk 6</p>
                        </div>
                        <!-- Remove Product actions-->
                    </div>
                </div>
            </div>
    </section>




    <section style="background-color: #f8f9fa;">
        <div class="section-content">
            <h2 class="section-title">Our Services</h2>
            <div class="card">
                <p>Service 1 description...</p>
            </div>
            <div class="card">
                <p>Service 2 description...</p>
            </div>
            <div class="card">
                <p>Service 3 description...</p>
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
                                Pertanyaan 1
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body fs-6">
                                Jawaban untuk pertanyaan 1.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Pertanyaan 2
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body fs-6">
                                Jawaban untuk pertanyaan 2.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Pertanyaan 3
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body fs-6">
                                Jawaban untuk pertanyaan 3.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                Pertanyaan 4
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#faqAccordion">
                            <div class="accordion-body fs-6">
                                Jawaban untuk pertanyaan 4.
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
        <div class="section-content">
            <h2 class="section-title">Hubungi Kami</h2>
            <a href="https://wa.me/1234567890" target="_blank" class="btn btn-success">
                <i class="fab fa-whatsapp me-2"></i>Hubungi melalui WhatsApp
            </a>
        </div>
    </section>
@endsection
