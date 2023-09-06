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

    <header class="bg-dark py-5">
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
                    <img class="card-img-top" id="main-image" src="https://via.placeholder.com/300" alt="Dummy Image" />

                    <!-- Product details -->
                    <div class="card-body card-body-custom pt-4">
                        <div>
                            <!-- Product name (dummy) -->
                            <h3 class="fw-bolder text-primary">Product Title (Dummy)</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eget augue sit amet erat
                                tristique suscipit.
                            </p>
                            <!-- Photo options (dummy) -->
                            <div class="photo-options">
                                <img class="thumbnail" src="https://via.placeholder.com/100" alt="Thumbnail 1" />
                                <img class="thumbnail" src="https://via.placeholder.com/200" alt="Thumbnail 2" />
                                <img class="thumbnail" src="https://via.placeholder.com/400" alt="Thumbnail 3" />
                            </div>
                            <!-- Size options (dummy) -->
                            <div class="size-options">
                                <h4 class="fw-bolder">Choose Size:</h4>
                                <select id="sizeSelect">
                                    <option value="Small" data-price="10">Small</option>
                                    <option value="Medium" data-price="15">Medium</option>
                                    <option value="Large" data-price="20">Large</option>
                                    <option value="Large" data-price="20">big</option>
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
                                <h5 class="fw-bolder">Product Title (Dummy)</h5>
                                <div class="rent-price mb-3">
                                    <span style="font-size: 1rem" class="text-primary" id="productPriceRight">Rp. 10</span>
                                </div>
                            </div>
                            <!-- List of details (dummy) -->
                            <ul class="list-unstyled list-style-group">
                                <li class="border-bottom p-2 d-flex justify-content-between">
                                    <span>Size</span>
                                    <span style="font-weight: 600" id="selectedSize">Medium</span>
                                </li>
                                <li class="border-bottom p-2 d-flex">
                                    <span style="margin-right: 10px; background-color: #FF5733;"
                                        class="rounded-colorize"></span>
                                    <span style="margin-right: 10px; background-color: #3498db;"
                                        class="rounded-colorize"></span>
                                    <span style="margin-right: 10px; background-color: #27ae60;"
                                        class="rounded-colorize"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Product actions (dummy) -->
                    <div class="card-footer border-top-0 bg-transparent">
                        <div class="text-center">
                            <a id="btn_order" class="btn d-flex align-items-center justify-content-center btn-primary mt-auto"
                                href="https://wa.me/6281999950991" style="column-gap: 0.4rem">Order Now <i
                                    class="ri-whatsapp-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sizeSelect = document.getElementById('sizeSelect');
        const productPrice = document.getElementById('productPrice');
        const productPriceRight = document.getElementById('productPriceRight');
        const selectedSize = document.getElementById('selectedSize');

        sizeSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const newPrice = selectedOption.getAttribute('data-price');
            productPrice.textContent = 'Rp. ' + newPrice;
            productPriceRight.textContent = 'Rp. ' + newPrice;
            selectedSize.textContent = this.value;
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

    </script>
@endsection
