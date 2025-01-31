<!-- Offcanvas Cart -->
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart" aria-labelledby="My Cart">
    <div class="ml-5 offcanvas-header">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="order-md-last">
            <h4 class="mb-4 d-flex justify-content-between align-items-center">
                <span class="text-primary fw-bold">Shopping Cart</span>
                <span class="badge bg-primary rounded-pill fs-6">{{ $totalQuantity }}</span>
            </h4>

            @if ($totalQuantity > 0)
                <!-- Add user address section -->
                <div class="mb-4">
                    <label class="text-black form-label text-muted">Delivery Address</label>
                    <div class="p-3 border border-black rounded">
                        <p class="mb-0">{{ auth()->user()->address ?? 'No address set' }}</p>
                    </div>
                </div>

                <div class="cart-items-container" style="max-height: 60vh; overflow-y: auto;">
                    <label for="orderNote" class="text-black form-label text-muted">Your Items</label>
                    <ul class="list-group list-group-flush">
                        @php
                            $groupedOrders = $dataOrder->groupBy('product_name')->map(function ($group) {
                                return [
                                    'quantity' => $group->sum('quantity'),
                                    'total_price' => $group->sum('total_price'),
                                    'product_name' => $group->first()->product_name,
                                ];
                            });
                        @endphp

                        @foreach ($groupedOrders as $order)
                            <li class="py-3 list-group-item border-bottom">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <h6 class="mb-1 fw-semibold">{{ $order['product_name'] }}</h6>
                                            <div class="quantity-controls d-flex align-items-center">
                                                <button class="px-2 py-0 btn btn-sm btn-outline-secondary">-</button>
                                                <span class="mx-2">{{ $order['quantity'] }}</span>
                                                <button class="px-2 py-0 btn btn-sm btn-outline-secondary">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <span
                                        class="text-primary fw-semibold">{{ 'Rp. ' . number_format($order['total_price'], 0, ',', '.') }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="pt-3 mt-4 border-top">
                    <div class="mb-4 d-flex justify-content-between align-items-center">
                        <span class="fs-5">Total</span>
                        <span class="fs-5 fw-bold text-primary">Rp. {{ number_format($totalPrice, 0, ',', '.') }}</span>
                    </div>

                    <form action="{{ route('cart.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="dataOrder" value="{{ $dataOrder }}">
                        <div class="mb-3">
                            <label for="orderNote" class="text-black form-label text-muted">Additional
                                Instructions</label>
                            <textarea class="border border-black form-control" name="note" id="orderNote" rows="4"
                                placeholder="Add any special requests here..."></textarea>
                        </div>
                        <button class="mb-2 w-100 btn btn-primary btn-lg rounded-3" type="submit">
                            Proceed to Checkout
                        </button>
                    </form>
                </div>
            @else
                <div class="py-5 text-center">
                    <i class="bi bi-cart3 fs-1 text-muted"></i>
                    <p class="mt-3 text-muted">Your cart is empty</p>
                    <button class="btn btn-primary" data-bs-dismiss="offcanvas">Start Shopping</button>
                </div>
            @endif
        </div>
    </div>
</div>
<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasSearch" aria-labelledby="Search">
    <div class="ml-5 offcanvas-header">
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
                            <option value="">All Categories</option>
                            @foreach ($products->unique('category') as $product)
                                <option value="{{ $product->category }}">{{ $product->category }}</option>
                            @endforeach
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
                    <li class="dropdown">
                        <a href="#" class="p-2 mx-1 dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <svg width="24" height="24" viewBox="0 0 24 24">
                                <use xlink:href="#user"></use>
                            </svg>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            @auth
                                <li><span class="dropdown-item-text">Hello, {{ auth()->user()->name }}</span></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                </li>
                            @else
                                <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                            @endauth
                        </ul>
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

    {{-- <div class="container-fluid">
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
    </div> --}}
</header>
<!-- / Navbar -->
