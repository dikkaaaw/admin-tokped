<!-- Offcanvas Cart -->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart" aria-labelledby="My Cart">
    <div class="offcanvas-header justify-content-center">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="order-md-last">
            <h4 class="mb-3 d-flex justify-content-between align-items-center">
                <span class="text-primary">Your cart</span>
                <span class="badge bg-primary rounded-pill">{{ $totalQuantity }} </span>
            </h4>
            <ul class="mb-3 list-group">
                @foreach ($dataOrder as $order)
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">{{ $order->product_name }}</h6>
                            <small class="text-body-secondary">X {{ $order->quantity }}</small>
                        </div>
                        <span
                            class="text-body-secondary">{{ 'Rp. ' . number_format($order->total_price, 0, ',', '.') }}</span>
                    </li>
                @endforeach

                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (Rupiah)</span>
                    <strong>{{ number_format($totalPrice, 0, ',', '.') }}</strong>
                </li>
            </ul>
            <form action="{{ route('cart.update') }}" method="POST">
                @csrf
                <input type="hidden" name="dataOrder" value="{{ $dataOrder }}">
                <button class="w-100 btn btn-primary btn-lg" type="submit">
                    Checkout
                </button>
            </form>

        </div>
    </div>
</div>
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasSearch" aria-labelledby="Search">
    <div class="offcanvas-header justify-content-center">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="order-md-last">
            <h4 class="mb-3 d-flex justify-content-between align-items-center">
                <span class="text-primary">Search</span>
            </h4>
            <form role="search" action="index.html" method="get" class="gap-0 mt-3 d-flex">
                <input class="form-control rounded-start rounded-0 bg-light" type="email"
                    placeholder="What are you looking for?" aria-label="What are you looking for?" />
                <button class="btn btn-dark rounded-end rounded-0" type="submit">
                    Search
                </button>
            </form>
        </div>
    </div>
</div>
<!-- / Offcanvas Cart -->

<!-- Navbar -->
<header>
    <div class="container-fluid">
        <div class="py-3 row border-bottom">
            <div class="text-center col-sm-4 col-lg-3 text-sm-start">
                <div class="main-logo">
                    <a href="index.html">
                        <img src="{{ asset('dist/assets/img/logo.png') }}" alt="logo" class="img-fluid" />
                    </a>
                </div>
            </div>
            <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-5 d-none d-lg-block">
                <div class="p-2 my-2 search-bar row bg-light rounded-4">
                    <div class="col-md-4 d-none d-md-block">
                        <select class="bg-transparent border-0 form-select">
                            <option>All Categories</option>
                            <option>Groceries</option>
                            <option>Drinks</option>
                            <option>Chocolates</option>
                        </select>
                    </div>
                    <div class="col-11 col-md-7">
                        <form id="search-form" class="text-center" action="index.html" method="post">
                            <input type="text" class="bg-transparent border-0 form-control"
                                placeholder="Search for more than 20,000 products" />
                        </form>
                    </div>
                    <div class="col-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div
                class="gap-5 mt-4 col-sm-8 col-lg-4 d-flex justify-content-end align-items-center mt-sm-0 justify-content-center justify-content-sm-end">
                <ul class="m-0 d-flex justify-content-end list-unstyled">
                    <li>
                        <a href="#" class="p-2 mx-1 rounded-circle bg-light">
                            <svg width="24" height="24" viewBox="0 0 24 24">
                                <use xlink:href="#user"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="d-lg-none">
                        <a href="#" class="p-2 mx-1 rounded-circle bg-light" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                            <svg width="24" height="24" viewBox="0 0 24 24">
                                <use xlink:href="#cart"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="d-lg-none">
                        <a href="#" class="p-2 mx-1 rounded-circle bg-light" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch">
                            <svg width="24" height="24" viewBox="0 0 24 24">
                                <use xlink:href="#search"></use>
                            </svg>
                        </a>
                    </li>
                </ul>

                <div class="cart text-end d-none d-lg-block dropdown">
                    <button class="gap-2 bg-transparent border-0 d-flex flex-column lh-1" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                        <span class="fs-6 text-muted dropdown-toggle">Your Cart</span>
                        <span
                            class="cart-total fs-5 fw-bold">{{ 'Rp. ' . number_format($totalPrice, 0, ',', '.') }}</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="py-3 row">
            <div class="d-flex justify-content-center justify-content-sm-between align-items-center">
                <div class="main-menu d-flex navbar navbar-expand-lg">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header justify-content-center">
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- / Navbar -->
