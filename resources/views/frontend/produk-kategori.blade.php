@extends('layouts.frontend')

@section('content')
    <header class="bg-black py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">{{ $category_name }}</h1>
            </div>
        </div>
    </header>



    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <h3 class="text-center mb-1">Daftar rak-rak</h3>
            <div class="category-bar">
                <div class="container">
                    <ul class="category-tabs">
                        <li class="category-tab active"><a href="{{ route('produk') }}">All</a></li>
                        @foreach ($categories as $category)
                            <li class="category-tab"><a href="{{ route('produk.kategori', ['id' => $category->id]) }}">{{ $category->category }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                @foreach ($pc as $pc)

                    <div class="col mb-3">
                        <div class="card h-100">
                            
                            <!-- Product image-->
                            <a href="{{ route('detail', ['id' => $pc->product->id]) }}">
                                <img class="card-img-top " src="{{ asset($pc->product->productImage[0]->images ?? '') }}"
                                    alt="..." />
                            </a>
                            <!-- Product title -->
                            <div class="card-body">
                                <h5 class="card-title">{{ $pc->product->name }}</h5>
                            </div>
                            <!-- Remove Product actions-->
                        </div>
                    </div>
                @endforeach
                {{-- <div class="col mb-3">
                    <div class="card h-100">
                        <!-- Product image-->
                        <a href="{{ route('detail') }}">
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                alt="..." />
                        </a>
                        <!-- Product title -->
                        <div class="card-body">
                            <h5 class="card-title">Judul Produk 4</h5>
                        </div>
                        <!-- Remove Product actions-->
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card h-100">
                        <!-- Product image-->
                        <a href="{{ route('detail') }}">
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                alt="..." />
                        </a>
                        <!-- Product title -->
                        <div class="card-body">
                            <h5 class="card-title">Judul Produk 5</h5>
                        </div>
                        <!-- Remove Product actions-->
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card h-100">
                        <!-- Product image-->
                        <a href="{{ route('detail') }}">
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                alt="..." />
                        </a>
                        <!-- Product title -->
                        <div class="card-body">
                            <h5 class="card-title">Judul Produk 6</h5>
                        </div>
                        <!-- Remove Product actions-->
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card h-100">
                        <!-- Product image-->
                        <a href="{{ route('detail') }}">
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                alt="..." />
                        </a>
                        <!-- Product title -->
                        <div class="card-body">
                            <h5 class="card-title">Judul Produk </h5>
                        </div>
                        <!-- Remove Product actions-->
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card h-100">
                        <!-- Product image-->
                        <a href="{{ route('detail') }}">
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                alt="..." />
                        </a>
                        <!-- Product title -->
                        <div class="card-body">
                            <h5 class="card-title">Judul Produk 4</h5>
                        </div>
                        <!-- Remove Product actions-->
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card h-100">
                        <!-- Product image-->
                        <a href="{{ route('detail') }}">
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                alt="..." />
                        </a>
                        <!-- Product title -->
                        <div class="card-body">
                            <h5 class="card-title">Judul Produk 5</h5>
                        </div>
                        <!-- Remove Product actions-->
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card h-100">
                        <!-- Product image-->
                        <a href="{{ route('detail') }}">
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                alt="..." />
                        </a>
                        <!-- Product title -->
                        <div class="card-body">
                            <h5 class="card-title">Judul Produk 6</h5>
                        </div>
                        <!-- Remove Product actions-->
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card h-100">
                        <!-- Product image-->
                        <a href="{{ route('detail') }}">
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                alt="..." />
                        </a>
                        <!-- Product title -->
                        <div class="card-body">
                            <h5 class="card-title">Judul Produk </h5>
                        </div>
                        <!-- Remove Product actions-->
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card h-100">
                        <!-- Product image-->
                        <a href="{{ route('detail') }}">
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                alt="..." />
                        </a>
                        <!-- Product title -->
                        <div class="card-body">
                            <h5 class="card-title">Judul Produk 4</h5>
                        </div>
                        <!-- Remove Product actions-->
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card h-100">
                        <!-- Product image-->
                        <a href="{{ route('detail') }}">
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                alt="..." />
                        </a>
                        <!-- Product title -->
                        <div class="card-body">
                            <h5 class="card-title">Judul Produk 5</h5>
                        </div>
                        <!-- Remove Product actions-->
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card h-100">
                        <!-- Product image-->
                        <a href="{{ route('detail') }}">
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                alt="..." />
                        </a>
                        <!-- Product title -->
                        <div class="card-body">
                            <h5 class="card-title">Judul Produk 6</h5>
                        </div>
                        <!-- Remove Product actions-->
                    </div>
                </div>
                <div class="col mb-3">
                    <div class="card h-100">
                        <!-- Product image-->
                        <a href="{{ route('detail') }}">
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg"
                                alt="..." />
                        </a>
                        <!-- Product title -->
                        <div class="card-body">
                            <h5 class="card-title">Judul Produk </h5>
                        </div>
                        <!-- Remove Product actions-->
                    </div>
                </div>
            </div> --}}
            </div>
            <div class="container px-4 px-lg-5 mt-5">
            </div>
    </section>
@endsection
