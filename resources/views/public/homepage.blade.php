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
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="{{ asset('dist/assets/img/icon-vegetables-broccoli.png') }}"
                                    alt="Category Thumbnail" />
                                <h3 class="category-title">Fruits & Veges</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="{{ asset('dist/assets/img/icon-bread-baguette.png') }}"
                                    alt="Category Thumbnail" />
                                <h3 class="category-title">Breads & Sweets</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="{{ asset('dist/assets/img/icon-soft-drinks-bottle.png') }}"
                                    alt="Category Thumbnail" />
                                <h3 class="category-title">Fruits & Veges</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="{{ asset('dist/assets/img/icon-wine-glass-bottle.png') }}"
                                    alt="Category Thumbnail" />
                                <h3 class="category-title">Fruits & Veges</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="{{ asset('dist/assets/img/icon-animal-products-drumsticks.png') }}"
                                    alt="Category Thumbnail" />
                                <h3 class="category-title">Fruits & Veges</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="{{ asset('dist/assets/img/icon-bread-herb-flour.png') }}"
                                    alt="Category Thumbnail" />
                                <h3 class="category-title">Fruits & Veges</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="{{ asset('dist/assets/img/icon-vegetables-broccoli.png') }}"
                                    alt="Category Thumbnail" />
                                <h3 class="category-title">Fruits & Veges</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="{{ asset('dist/assets/img/icon-vegetables-broccoli.png') }}"
                                    alt="Category Thumbnail" />
                                <h3 class="category-title">Fruits & Veges</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="{{ asset('dist/assets/img/icon-vegetables-broccoli.png') }}"
                                    alt="Category Thumbnail" />
                                <h3 class="category-title">Fruits & Veges</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="{{ asset('dist/assets/img/icon-vegetables-broccoli.png') }}"
                                    alt="Category Thumbnail" />
                                <h3 class="category-title">Fruits & Veges</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="{{ asset('dist/assets/img/icon-vegetables-broccoli.png') }}"
                                    alt="Category Thumbnail" />
                                <h3 class="category-title">Fruits & Veges</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="{{ asset('dist/assets/img/icon-vegetables-broccoli.png') }}"
                                    alt="Category Thumbnail" />
                                <h3 class="category-title">Fruits & Veges</h3>
                            </a>
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
                            <div class="swiper-slide">
                                <div class="p-3 mb-3 border-0 shadow card rounded-4">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="{{ asset('dist/assets/img/product-thumb-11.jpg') }}"
                                                class="rounded img-fluid" alt="Card title" />
                                        </div>
                                        <div class="col-md-8">
                                            <div class="py-0 card-body">
                                                <p class="mb-0 text-muted">
                                                    Amber Jar
                                                </p>
                                                <h5 class="card-title">
                                                    Honey best nectar you wish to get
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="p-3 mb-3 border-0 shadow card rounded-4">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="{{ asset('dist/assets/img/product-thumb-12.jpg') }}"
                                                class="rounded img-fluid" alt="Card title" />
                                        </div>
                                        <div class="col-md-8">
                                            <div class="py-0 card-body">
                                                <p class="mb-0 text-muted">
                                                    Amber Jar
                                                </p>
                                                <h5 class="card-title">
                                                    Honey best nectar you wish to get
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="p-3 mb-3 border-0 shadow card rounded-4">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="{{ asset('dist/assets/img/product-thumb-13.jpg') }}"
                                                class="rounded img-fluid" alt="Card title" />
                                        </div>
                                        <div class="col-md-8">
                                            <div class="py-0 card-body">
                                                <p class="mb-0 text-muted">
                                                    Amber Jar
                                                </p>
                                                <h5 class="card-title">
                                                    Honey best nectar you wish to get
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="p-3 mb-3 border-0 shadow card rounded-4">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="{{ asset('dist/assets/img/product-thumb-14.jpg') }}"
                                                class="rounded img-fluid" alt="Card title" />
                                        </div>
                                        <div class="col-md-8">
                                            <div class="py-0 card-body">
                                                <p class="mb-0 text-muted">
                                                    Amber Jar
                                                </p>
                                                <h5 class="card-title">
                                                    Honey best nectar you wish to get
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="p-3 mb-3 border-0 shadow card rounded-4">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="{{ asset('dist/assets/img/product-thumb-11.jpg') }}"
                                                class="rounded img-fluid" alt="Card title" />
                                        </div>
                                        <div class="col-md-8">
                                            <div class="py-0 card-body">
                                                <p class="mb-0 text-muted">
                                                    Amber Jar
                                                </p>
                                                <h5 class="card-title">
                                                    Honey best nectar you wish to get
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="p-3 mb-3 border-0 shadow card rounded-4">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="{{ asset('dist/assets/img/product-thumb-12.jpg') }}"
                                                class="rounded img-fluid" alt="Card title" />
                                        </div>
                                        <div class="col-md-8">
                                            <div class="py-0 card-body">
                                                <p class="mb-0 text-muted">
                                                    Amber Jar
                                                </p>
                                                <h5 class="card-title">
                                                    Honey best nectar you wish to get
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                    class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
                                    @foreach ($products as $product)
                                        <div class="col">
                                            <div class="product-item">
                                                {{-- <span class="m-3 badge bg-success position-absolute">-30%</span> --}}
                                                {{-- <a href="#" class="btn-wishlist"><svg width="24"
                                                        height="24">
                                                        <use xlink:href="#heart"></use>
                                                    </svg></a> --}}
                                                <figure>
                                                    <a href="index.html" title="Product Title">
                                                        <img src="{{ asset('dist/assets/img/buah/' . $product->image) }}"
                                                            class="tab-image" />
                                                    </a>
                                                </figure>
                                                <h3>{{ $product['name'] }}</h3>
                                                <span class="qty">{{ $product['quantity'] }} Unit</span><span
                                                    class="rating"><svg width="24" height="24"
                                                        class="text-primary">
                                                        <use xlink:href="#star-solid"></use>
                                                    </svg>
                                                    4.5</span>
                                                <span class="price">
                                                    {{ 'Rp. ' . number_format($product['price'], 0, ',', '.') }}</span>
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <div class="input-group product-qty">
                                                        <span class="input-group-btn">
                                                            <button type="button"
                                                                class="quantity-left-minus btn btn-danger btn-number"
                                                                data-type="minus">
                                                                <svg width="16" height="16">
                                                                    <use xlink:href="#minus"></use>
                                                                </svg>
                                                            </button>
                                                        </span>
                                                        <input type="text" id="quantity_{{ $product['id'] }}"
                                                            name="quantity" class="form-control input-number"
                                                            value="1" data-product-id="{{ $product['id'] }}" />
                                                        <span class="input-group-btn">
                                                            <button type="button"
                                                                class="quantity-right-plus btn btn-success btn-number"
                                                                data-type="plus">
                                                                <svg width="16" height="16">
                                                                    <use xlink:href="#plus"></use>
                                                                </svg>
                                                            </button>
                                                        </span>
                                                    </div>

                                                    <form action="{{ route('cart.store') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="id"
                                                            value="{{ $product['id'] }}">
                                                        <input type="hidden" name="name"
                                                            value="{{ $product['name'] }}">
                                                        <input type="hidden" name="price"
                                                            value="{{ $product['price'] }}">
                                                        <input type="hidden" name="category"
                                                            value="{{ $product['category'] }}">
                                                        <input type="hidden" name="quantity" value="1"
                                                            id="hidden-quantity_{{ $product['id'] }}"
                                                            class="hidden-quantity">
                                                        <button type="submit" class="nav-link">
                                                            Add to Cart
                                                            <iconify-icon icon="uil:shopping-cart"></iconify-icon>
                                                        </button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="col">
                                        <div class="product-item">
                                            <a href="#" class="btn-wishlist"><svg width="24" height="24">
                                                    <use xlink:href="#heart"></use>
                                                </svg></a>
                                            <figure>
                                                <a href="index.html" title="Product Title">
                                                    <img src="{{ asset('dist/assets/img/thumb-milk.png') }}"
                                                        class="tab-image" />
                                                </a>
                                            </figure>
                                            <h3>Sunstar Fresh Melon Juice</h3>
                                            <span class="qty">1 Unit</span><span class="rating"><svg width="24"
                                                    height="24" class="text-primary">
                                                    <use xlink:href="#star-solid"></use>
                                                </svg>
                                                4.5</span>
                                            <span class="price">$18.00</span>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="input-group product-qty">
                                                    <span class="input-group-btn">
                                                        <button type="button"
                                                            class="quantity-left-minus btn btn-danger btn-number"
                                                            data-type="minus">
                                                            <svg width="16" height="16">
                                                                <use xlink:href="#minus"></use>
                                                            </svg>
                                                        </button>
                                                    </span>
                                                    <input type="text" id="quantity" name="quantity"
                                                        class="form-control input-number" value="1" />
                                                    <span class="input-group-btn">
                                                        <button type="button"
                                                            class="quantity-right-plus btn btn-success btn-number"
                                                            data-type="plus">
                                                            <svg width="16" height="16">
                                                                <use xlink:href="#plus"></use>
                                                            </svg>
                                                        </button>
                                                    </span>
                                                </div>
                                                <a href="#" class="nav-link">Add to Cart
                                                    <iconify-icon icon="uil:shopping-cart"></iconify-icon></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- / product-grid -->
                            </div>

                            <!-- Fruit & Veges -->
                            <div class="tab-pane fade" id="nav-fruits" role="tabpanel" aria-labelledby="nav-fruits-tab">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Us -->
    <section class="py-5">
        <div class="container-fluid">
            <div class="row row-cols-1 row-cols-sm-3 row-cols-lg-5">
                <div class="col">
                    <div class="mb-3 border-0 card">
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
                                    <h5>Free delivery</h5>
                                    <p class="card-text">
                                        Lorem ipsum dolor sit amet, consectetur
                                        adipi elit.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 border-0 card">
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
                                    <h5>100% secure payment</h5>
                                    <p class="card-text">
                                        Lorem ipsum dolor sit amet, consectetur
                                        adipi elit.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 border-0 card">
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
                                    <h5>Quality guarantee</h5>
                                    <p class="card-text">
                                        Lorem ipsum dolor sit amet, consectetur
                                        adipi elit.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 border-0 card">
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
                                    <h5>guaranteed savings</h5>
                                    <p class="card-text">
                                        Lorem ipsum dolor sit amet, consectetur
                                        adipi elit.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 border-0 card">
                        <div class="row">
                            <div class="col-md-2 text-dark">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M18 7h-.35A3.45 3.45 0 0 0 18 5.5a3.49 3.49 0 0 0-6-2.44A3.49 3.49 0 0 0 6 5.5A3.45 3.45 0 0 0 6.35 7H6a3 3 0 0 0-3 3v2a1 1 0 0 0 1 1h1v6a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3v-6h1a1 1 0 0 0 1-1v-2a3 3 0 0 0-3-3Zm-7 13H8a1 1 0 0 1-1-1v-6h4Zm0-9H5v-1a1 1 0 0 1 1-1h5Zm0-4H9.5A1.5 1.5 0 1 1 11 5.5Zm2-1.5A1.5 1.5 0 1 1 14.5 7H13ZM17 19a1 1 0 0 1-1 1h-3v-7h4Zm2-8h-6V9h5a1 1 0 0 1 1 1Z" />
                                </svg>
                            </div>
                            <div class="col-md-10">
                                <div class="p-0 card-body">
                                    <h5>Daily offers</h5>
                                    <p class="card-text">
                                        Lorem ipsum dolor sit amet, consectetur
                                        adipi elit.
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
