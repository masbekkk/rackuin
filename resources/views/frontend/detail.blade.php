@extends('layouts.frontend')

@section('content')
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Detail</h1>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="{{ asset($product->productImage[0]->images) }}" alt="..." />
                        <!-- Product details-->
                        <div class="card-body card-body-custom pt-4">
                            <div>
                                <!-- Product name-->
                                <h3 class="fw-bolder text-primary">Deskripsi</h3>
                                <p>
                                    {{ $product->description }}
                                    @foreach ($product->productImage as $pi)
                                        <img src="{{ asset($pi->images) }}" alt="Description of the image" />
                                    @endforeach

                                </p>
                                <div class="mobil-info-list border-top pt-4">
                                    <ul class="list-unstyled">
                                        @foreach ($product->productCategory as $pc)
                                            <li>
                                                <i class="ri-checkbox-circle-line"></i>
                                                <span>{{ $pc->category->category }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card">
                        <!-- Product details-->
                        <div class="card-body card-body-custom pt-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="fw-bolder">{{ $product->name }}</h5>
                                    <div class="rent-price mb-3">
                                        <span style="font-size: 1rem" class="text-primary">Rp. {{ $product->price }}</span>
                                    </div>
                                </div>
                                <ul class="list-unstyled list-style-group">
                                    <li class="border-bottom p-2 d-flex justify-content-between">
                                        <span>Ukuran</span>
                                        <span style="font-weight: 600">{{ $product->sizes }}</span>
                                    </li>
                                    <li class="border-bottom p-2 d-flex">
                                        {{-- <span style="margin-right: 50px;">Warna </span> --}}
                                        @foreach ($colors as $color)
                                            <span style="margin-right: 10px; background-color: {{ $color }};"
                                                class="rounded-colorize"></span>
                                        @endforeach
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <!-- Product actions-->
                        <div class="card-footer border-top-0 bg-transparent">
                            <div class="text-center">
                                <a class="btn d-flex align-items-center justify-content-center btn-primary mt-auto"
                                    href="https://wa.me/6281999950241" style="column-gap: 0.4rem">chat admin<i
                                        class="ri-whatsapp-line"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
