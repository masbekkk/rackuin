@extends('layouts.frontend')

@section('content')
    <style>
        .photo-options {
            display: flex;
            overflow-x: auto;
            margin-top: 20px;
            cursor: pointer;
        }

        .thumbnail {
            width: auto;
            height: 75px;
            object-fit: cover;
            border: 2px solid transparent;
            transition: border-color 0.3s ease-in-out;
        }

        .thumbnail:hover {
            border-color: #007bff;
        }
    </style>

    <header class="bg-black py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">Detail {{ $product->name }}</h1>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 mb-5">
                    <div class="card h-100">
                        <!-- Product image (dummy) -->
                        <img class="card-img-top" id="main-image"
                            src="{{ isset($product->productImage[0]->images) ? asset($product->productImage[0]->images) : '' }}"
                            alt="First Image" />

                        <!-- Product details -->
                        <div class="card-body card-body-custom pt-4">
                            <div>
                                <!-- Product name (dummy) -->
                                <h3 class="fw-bolder text-primary">{{ $product->name }}</h3>
                                <p>
                                    {{ $product->description }}
                                </p>
                                <!-- Photo options (dummy) -->
                                <div class="photo-options">
                                    @foreach ($product->productImage as $pi)
                                        <img class="thumbnail" src="{{ asset($pi->images) }}" alt="Thumbnail 1" />
                                    @endforeach
                                </div>
                                <!-- Size options (dummy) -->
                                <div class="size-options">
                                    <h4 class="fw-bolder">Choose Size:</h4>
                                    <select id="sizeSelect" class="form-control">
                                        @foreach ($product->productSize as $key => $ps)
                                            <option value="{{ $ps->id }}" data-price="{{ $ps->price }}"
                                                data-size="{{ $ps->size->size }}" {{ $key == 0 ? 'selected' : '' }}>
                                                {{ $ps->size->size }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <!-- Price (dummy) -->
                                <div class="price">
                                    <h4 class="fw-bolder">Price:</h4>
                                    <span id="productPrice">Rp. 10</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-5">
                    <div class="card">
                        <!-- Product details -->
                        <div class="card-body card-body-custom pt-4">
                            <div class="text-center">
                                <!-- Product name (dummy) -->
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="fw-bolder">{{ $product->name }}</h5>
                                    <div class="rent-price mb-3">
                                        <span style="font-size: 1rem" class="text-primary product_price"
                                            id="productPriceRight">Rp. 10</span>
                                    </div>
                                </div>
                                <!-- List of details (dummy) -->
                                <ul class="list-unstyled list-style-group">
                                    <li class="border-bottom p-2 d-flex justify-content-between">
                                        <span>Size</span>
                                        <span style="font-weight: 600" id="selectedSize">Medium</span>
                                    </li>
                                    <li class="border-bottom p-2 d-flex">
                                        @foreach ($colors as $color)
                                            <span style="margin-right: 10px; background-color: {{ $color }};"
                                                class="rounded-colorize"></span>
                                        @endforeach

                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Product actions (dummy) -->
                        <div class="card-footer border-top-0 bg-transparent">
                            <div class="text-center">
                                <a id="btn_order"
                                    class="btn d-flex align-items-center justify-content-center btn-primary mt-auto"
                                    href="https://api.whatsapp.com/send?phone=62818522299&text=Hai%20Kak,%20saya%20mau%20tanya-tanya%20mengenai%20produk%20rakuin%20%F0%9F%98%8A" style="column-gap: 0.4rem">Beli Sekarang <i
                                        class="ri-whatsapp-line"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sizeSelect = document.getElementById('sizeSelect');
            const productPrice = document.getElementById('productPrice');
            const productPriceRight = document.getElementById('productPriceRight');
            const selectedSize = document.getElementById('selectedSize');
            console.log(sizeSelect.value)

            const selectedOption = sizeSelect.options[sizeSelect.selectedIndex];
            const newPrice = selectedOption.getAttribute('data-price');
            const sizeName = selectedOption.getAttribute('data-size');
            productPrice.textContent = 'Rp. ' + newPrice;
            productPriceRight.textContent = 'Rp. ' + newPrice;
            selectedSize.textContent = sizeName

            sizeSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const newPrice = selectedOption.getAttribute('data-price');
                const sizeName = selectedOption.getAttribute('data-size');
                productPrice.textContent = 'Rp. ' + newPrice;
                productPriceRight.textContent = 'Rp. ' + newPrice;
                selectedSize.textContent = sizeName
            });
        });
    </script>




    <script>
        const thumbnails = document.querySelectorAll('.thumbnail');
        const mainImage = document.getElementById('main-image');

        thumbnails.forEach((thumbnail) => {
            thumbnail.addEventListener('click', () => {
                mainImage.src = thumbnail.src;
            });
        });

        let linkWa = document.getElementById('link_wa');
        let btnOrder = document.getElementById('btn_order');
        console.log(linkWa.href)
        btnOrder.href = linkWa.href;
        console.log(btnOrder.href)

        // var selection = document.getElementById("sizeSelect");

        // selection.onchange = function(event) {
        //     var price = event.target.options[event.target.selectedIndex].dataset.price;
        //     // var clnc = event.target.options[event.target.selectedIndex].dataset.clnc;
        //     console.log("price: " + price);
        //     // console.log("clnc: " + clnc);
        // };
    </script>
@endsection
