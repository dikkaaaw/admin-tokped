@extends('public.layouts.app')

@section('content')
    <section class="py-5 overflow-hidden">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-wrap mb-5 section-header d-flex justify-content-between">
                        <h2 class="section-title">Category</h2>

                        <div class="d-flex align-items-center">
                            <a href="#" class="btn-link text-decoration-none">View All Categories →</a>
                            <div class="swiper-buttons">
                                <button class="swiper-prev category-carousel-prev btn btn-yellow">
                                    ❮
                                </button>
                                <button class="swiper-next category-carousel-next btn btn-yellow">
                                    ❯
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="category-carousel swiper">
                        <div class="swiper-wrapper">
                            @foreach ($products->groupBy('category')->take(6) as $category => $items)
                                <a href="#" class="nav-link category-item swiper-slide">
                                    <img src="{{ asset('dist/assets/img/icon-vegetables-broccoli.png') }}"
                                        alt="{{ $category }}" />
                                    <h3 class="category-title">{{ $category }}</h3>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- New Brand -->
    <section class="py-5 overflow-hidden">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="flex-wrap mb-5 section-header d-flex justify-content-between">
                        <h2 class="section-title">Newly Arrived Brands</h2>
                        <div class="d-flex align-items-center">
                            <a href="#" class="btn-link text-decoration-none">View All Categories →</a>
                            <div class="swiper-buttons">
                                <button class="swiper-prev brand-carousel-prev btn btn-yellow">
                                    ❮
                                </button>
                                <button class="swiper-next brand-carousel-next btn btn-yellow">
                                    ❯
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="brand-carousel swiper">
                        <div class="swiper-wrapper">
                            @foreach ($products->sortByDesc('created_at')->take(6) as $product)
                                <div class="swiper-slide">
                                    <div class="p-3 mb-3 border-0 shadow card rounded-4">
                                        <div class="row g-0">
                                            <div class="col-md-4 d-flex align-items-center">
                                                <img src="{{ asset('dist/assets/img/buah/' . $product->image) }}"
                                                    class="rounded img-fluid"
                                                    style="width: 100%; height: 100px; object-fit: cover;"
                                                    alt="{{ $product->name }}" />
                                            </div>
                                            <div class="col-md-8">
                                                <div class="py-0 card-body">
                                                    <p class="mb-0 text-muted">
                                                        {{ $product->category }}
                                                    </p>
                                                    <h5 class="card-title">
                                                        {{ $product->name }}
                                                    </h5>
                                                    <p class="mb-0 text-primary">
                                                        {{ 'Rp. ' . number_format($product->price, 0, ',', '.') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product -->
    <section class="py-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="bootstrap-tabs product-tabs">
                        <div class="my-5 tabs-header d-flex justify-content-between border-bottom">
                            <h3>Products</h3>
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a href="#" class="nav-link text-uppercase fs-6 active" id="nav-all-tab"
                                        data-bs-toggle="tab" data-bs-target="#nav-all">All</a>
                                    {{-- <a href="#" class="nav-link text-uppercase fs-6" id="nav-fruits-tab"
                                        data-bs-toggle="tab" data-bs-target="#nav-fruits">Fruits & Veges</a>
                                    <a href="#" class="nav-link text-uppercase fs-6" id="nav-juices-tab"
                                        data-bs-toggle="tab" data-bs-target="#nav-juices">Juices</a> --}}
                                </div>
                            </nav>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-all" role="tabpanel"
                                aria-labelledby="nav-all-tab">
                                <div
                                    class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
                                    @foreach ($products as $product)
                                        <div class="col">
                                            <div class="border-0 shadow-sm card h-100 product-card rounded-3">
                                                <div class="position-relative">
                                                    <img src="{{ asset('dist/assets/img/buah/' . $product->image) }}"
                                                        class="p-3 card-img-top rounded-top"
                                                        style="height: 200px; object-fit: contain"
                                                        alt="{{ $product->name }}">

                                                    @if ($product->quantity < 5)
                                                        <span
                                                            class="top-0 m-3 bg-danger badge rounded-pill text-dark position-absolute end-0">
                                                            <i class="fas fa-exclamation-triangle me-1"></i>Low Stock
                                                        </span>
                                                    @endif
                                                </div>

                                                <div class="card-body d-flex flex-column">
                                                    <h5 class="mb-1 card-title">{{ $product->name }}</h5>
                                                    <p class="mb-2 text-muted small">Stock: {{ $product->stock }} pcs
                                                    </p>

                                                    <div class="mb-3">
                                                        <span class="text-muted d-flex align-items-center small">4.5<svg
                                                                width="24" height="24" class="text-primary">
                                                                <use xlink:href="#star-solid"></use>
                                                            </svg></span>
                                                    </div>

                                                    <h4 class="mb-3 text-primary">
                                                        {{ 'Rp. ' . number_format($product->price, 0, ',', '.') }}</h4>

                                                    <div class="mt-auto">
                                                        <div class="mb-3 input-group">
                                                            <button class="btn btn-outline-secondary quantity-left-minus"
                                                                type="button">
                                                                <i class="fas fa-minus"></i>
                                                            </button>
                                                            <input type="number"
                                                                class="text-center form-control input-number"
                                                                id="quantity_{{ $product->id }}" value="1"
                                                                min="1" data-product-id="{{ $product->id }}">
                                                            <button class="btn btn-outline-secondary quantity-right-plus"
                                                                type="button">
                                                                <i class="fas fa-plus"></i>
                                                            </button>
                                                        </div>

                                                        @auth
                                                            <form action="{{ route('cart.store') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" name="id"
                                                                    value="{{ $product->id }}">
                                                                <input type="hidden" name="name"
                                                                    value="{{ $product->name }}">
                                                                <input type="hidden" name="price"
                                                                    value="{{ $product->price }}">
                                                                <input type="hidden" name="category"
                                                                    value="{{ $product->category }}">
                                                                <input type="hidden" name="quantity" value="1"
                                                                    id="hidden-quantity_{{ $product->id }}"
                                                                    class="hidden-quantity">

                                                                <button type="submit" class="btn btn-primary w-100">
                                                                    <i class="fas fa-shopping-cart me-2"></i>
                                                                    Add to Cart
                                                                </button>
                                                            </form>
                                                        @else
                                                            <button type="button" class="btn btn-primary w-100"
                                                                data-bs-toggle="modal" data-bs-target="#loginModal">
                                                                <i class="fas fa-shopping-cart me-2"></i>
                                                                Add to Cart
                                                            </button>
                                                        @endauth
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="loginModalLabel">Login Required</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Please login to add items to your cart.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- / product-grid -->
                            </div>

                            <!-- Fruit & Veges -->
                            {{-- <div class="tab-pane fade" id="nav-fruits" role="tabpanel" aria-labelledby="nav-fruits-tab">
                                <!-- Product Grids -->
                                <div
                                    class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                                </div>
                            </div>

                            <!-- Juices -->
                            <div class="tab-pane fade" id="nav-juices" role="tabpanel" aria-labelledby="nav-juices-tab">
                                <!-- / product-grid -->
                                <div
                                    class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Us -->
    <section class="py-5 why-us-section">
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                <div class="col">
                    <div class="p-3 border-0 shadow-sm h-100 card">
                        <div class="row">
                            <div class="col-md-2 text-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M21.5 15a3 3 0 0 0-1.9-2.78l1.87-7a1 1 0 0 0-.18-.87A1 1 0 0 0 20.5 4H6.8l-.33-1.26A1 1 0 0 0 5.5 2h-2v2h1.23l2.48 9.26a1 1 0 0 0 1 .74H18.5a1 1 0 0 1 0 2h-13a1 1 0 0 0 0 2h1.18a3 3 0 1 0 5.64 0h2.36a3 3 0 1 0 5.82 1a2.94 2.94 0 0 0-.4-1.47A3 3 0 0 0 21.5 15Zm-3.91-3H9L7.34 6H19.2ZM9.5 20a1 1 0 1 1 1-1a1 1 0 0 1-1 1Zm8 0a1 1 0 1 1 1-1a1 1 0 0 1-1 1Z" />
                                </svg>
                            </div>
                            <div class="col-md-10">
                                <div class="p-0 card-body">
                                    <h5>Free Shipping</h5>
                                    <p class="card-text">
                                        Free delivery for all orders over Rp 500.000
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3 border-0 shadow-sm h-100 card">
                        <div class="row">
                            <div class="col-md-2 text-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M19.63 3.65a1 1 0 0 0-.84-.2a8 8 0 0 1-6.22-1.27a1 1 0 0 0-1.14 0a8 8 0 0 1-6.22 1.27a1 1 0 0 0-.84.2a1 1 0 0 0-.37.78v7.45a9 9 0 0 0 3.77 7.33l3.65 2.6a1 1 0 0 0 1.16 0l3.65-2.6A9 9 0 0 0 20 11.88V4.43a1 1 0 0 0-.37-.78ZM18 11.88a7 7 0 0 1-2.93 5.7L12 19.77l-3.07-2.19A7 7 0 0 1 6 11.88v-6.3a10 10 0 0 0 6-1.39a10 10 0 0 0 6 1.39Zm-4.46-2.29l-2.69 2.7l-.89-.9a1 1 0 0 0-1.42 1.42l1.6 1.6a1 1 0 0 0 1.42 0L15 11a1 1 0 0 0-1.42-1.42Z" />
                                </svg>
                            </div>
                            <div class="col-md-10">
                                <div class="p-0 card-body">
                                    <h5>Secure Payment</h5>
                                    <p class="card-text">
                                        We ensure secure payment with multiple payment options
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3 border-0 shadow-sm h-100 card">
                        <div class="row">
                            <div class="col-md-2 text-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M22 5H2a1 1 0 0 0-1 1v4a3 3 0 0 0 2 2.82V22a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-9.18A3 3 0 0 0 23 10V6a1 1 0 0 0-1-1Zm-7 2h2v3a1 1 0 0 1-2 0Zm-4 0h2v3a1 1 0 0 1-2 0ZM7 7h2v3a1 1 0 0 1-2 0Zm-3 4a1 1 0 0 1-1-1V7h2v3a1 1 0 0 1-1 1Zm10 10h-4v-2a2 2 0 0 1 4 0Zm5 0h-3v-2a4 4 0 0 0-8 0v2H5v-8.18a3.17 3.17 0 0 0 1-.6a3 3 0 0 0 4 0a3 3 0 0 0 4 0a3 3 0 0 0 4 0a3.17 3.17 0 0 0 1 .6Zm2-11a1 1 0 0 1-2 0V7h2ZM4.3 3H20a1 1 0 0 0 0-2H4.3a1 1 0 0 0 0 2Z" />
                                </svg>
                            </div>
                            <div class="col-md-10">
                                <div class="p-0 card-body">
                                    <h5>Premium Quality</h5>
                                    <p class="card-text">
                                        We guarantee the quality of all our products
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3 border-0 shadow-sm h-100 card">
                        <div class="row">
                            <div class="col-md-2 text-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M12 8.35a3.07 3.07 0 0 0-3.54.53a3 3 0 0 0 0 4.24L11.29 16a1 1 0 0 0 1.42 0l2.83-2.83a3 3 0 0 0 0-4.24A3.07 3.07 0 0 0 12 8.35Zm2.12 3.36L12 13.83l-2.12-2.12a1 1 0 0 1 0-1.42a1 1 0 0 1 1.41 0a1 1 0 0 0 1.42 0a1 1 0 0 1 1.41 0a1 1 0 0 1 0 1.42ZM12 2A10 10 0 0 0 2 12a9.89 9.89 0 0 0 2.26 6.33l-2 2a1 1 0 0 0-.21 1.09A1 1 0 0 0 3 22h9a10 10 0 0 0 0-20Zm0 18H5.41l.93-.93a1 1 0 0 0 0-1.41A8 8 0 1 1 12 20Z" />
                                </svg>
                            </div>
                            <div class="col-md-10">
                                <div class="p-0 card-body">
                                    <h5>Best Price</h5>
                                    <p class="card-text">
                                        Get the best prices and regular special offers
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Tombol tambah
            document.querySelectorAll('.quantity-right-plus').forEach(function(button) {
                button.addEventListener('click', function() {
                    var input = this.closest('.input-group').querySelector('.input-number');
                    var value = parseInt(input.value);
                    input.value = value + 1;

                    // Update hidden input sesuai dengan produk
                    var hiddenInput = document.getElementById('hidden-quantity_' + input.dataset
                        .productId);
                    if (hiddenInput) {
                        hiddenInput.value = input.value;
                    }
                });
            });

            // Tombol kurang
            document.querySelectorAll('.quantity-left-minus').forEach(function(button) {
                button.addEventListener('click', function() {
                    var input = this.closest('.input-group').querySelector('.input-number');
                    var value = parseInt(input.value);

                    // Pastikan tidak bisa kurang dari 1
                    if (value > 1) {
                        input.value = value - 1;
                    }

                    // Update hidden input sesuai dengan produk
                    var hiddenInput = document.getElementById('hidden-quantity_' + input.dataset
                        .productId);
                    if (hiddenInput) {
                        hiddenInput.value = input.value;
                    }
                });
            });

            // Handle perubahan input langsung
            document.querySelectorAll('.input-number').forEach(function(input) {
                input.addEventListener('change', function() {
                    var hiddenInput = document.getElementById('hidden-quantity_' + this.dataset
                        .productId);
                    if (hiddenInput) {
                        hiddenInput.value = this.value;
                    }
                });
            });
        });
    </script>
@endsection
