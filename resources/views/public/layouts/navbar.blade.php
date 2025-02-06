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
                    <div class="p-3 border border-black rounded" id="address-container">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0" id="address-text">{{ auth()->user()->address ?? 'No address set' }}</p>
                            <i id="edit-btn" class="fas fa-edit ms-2" style="cursor: pointer; color: #f39c12;"></i>
                        </div>
                    </div>

                    <!-- Form input yang tersembunyi, hanya muncul ketika tombol "Edit" diklik -->
                    <div id="address-form-container" style="display: none;">
                        <form method="POST" action="{{ route('updateAddress') }}" class="mt-3">
                            @csrf
                            <div class="mb-3">
                                <textarea id="address" name="address" class="border border-black form-control" rows="3" required>{{ auth()->user()->address ?? '' }}</textarea>
                            </div>
                            <div class="gap-2 d-flex">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" id="cancel-btn" class="btn btn-secondary">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="cart-items-container" style="max-height: 60vh; overflow-y: auto;">
                    <label for="orderNote" class="text-black form-label text-muted">Your Items</label>
                    <ul class="list-group list-group-flush">
                        @php
                            $groupedOrders = $dataOrder->groupBy('product_name')->map(function ($group) {
                                return [
                                    'price_per_item' => $group->first()->price_per_product,
                                    'stock_per_item' => $group->first()->stock_per_product,
                                    'quantity' => $group->sum('quantity'),
                                    'total_price' => $group->sum('total_price'),
                                    'product_name' => $group->first()->product_name,
                                    'product_id' => $group->first()->id_product, // Menyertakan ID produk
                                    'id' => $group->first()->id, // Menyertakan ID order
                                ];
                            });
                        @endphp

                        @foreach ($groupedOrders as $order)
                            <input type="text" value="{{ $order['price_per_item'] }}" hidden class="price-per-item"
                                data-order-id="{{ $order['id'] }}">
                            <li class="py-3 list-group-item border-bottom" data-order-id="{{ $order['id'] }}">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex flex-row align-items-between">
                                        <div class="me-3 flex-row">
                                            <div class="d-flex flex-row gap-3">
                                                <h6 class="mb-1 fw-semibold">{{ $order['product_name'] }}</h6>
                                                @php
                                                    $stockStyle = $order['stock_per_item'] <= 5 ? 'color: red;' : '';
                                                @endphp
                                                <p data-order-id="{{ $order['id'] }}"
                                                    style="font-size: 13px; font-weight: bolder; margin-top: -5px; {{ $stockStyle }}"
                                                    class="stock-input">
                                                    {{ 'Stock: ' . $order['stock_per_item'] }}
                                                </p>
                                            </div>
                                            <div class="quantity-controls d-flex align-items-center">
                                                <!-- Tombol minus -->
                                                <button class="px-2 py-0 btn btn-sm btn-outline-secondary decrement-btn"
                                                    data-order-id="{{ $order['id'] }}">-</button>

                                                <!-- Menampilkan kuantitas produk -->
                                                <span class="mx-2 quantity-input"
                                                    data-order-id="{{ $order['id'] }}">{{ $order['quantity'] }}</span>

                                                <!-- Tombol plus -->
                                                <button class="px-2 py-0 btn btn-sm btn-outline-secondary increment-btn"
                                                    data-order-id="{{ $order['id'] }}">+</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column justify-content-end align-items-end row-gap-3">
                                        <form method="POST" action="{{ route('cart.delete', $order['id']) }}"
                                            id="delete-form-{{ $order['id'] }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" style="display: none;"></button>
                                        </form>

                                        <i class="fas fa-trash-alt" style="cursor: pointer; color: red;"
                                            onclick="document.getElementById('delete-form-{{ $order['id'] }}').submit();"></i>

                                        <span class="text-primary fw-semibold item-pricing"
                                            data-order-id="{{ $order['id'] }}">{{ 'Rp. ' . number_format($order['price_per_item'] * $order['quantity'], 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="pt-3 mt-4 border-top">
                    <div class="mb-4 d-flex justify-content-between align-items-center">
                        <span class="fs-5">Total</span>
                        <span class="fs-5 fw-bold text-primary total-price">Rp.
                            {{ number_format($totalPrice, 0, ',', '.') }}</span>
                    </div>

                    <form action="{{ route('cart.update') }}" method="POST" id="update-cart-form">
                        @csrf
                        <input type="hidden" name="dataOrder" id="dataOrder"
                            value="{{ json_encode($groupedOrders) }}">

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


<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasSearch"
    aria-labelledby="Search">
    <div class="ml-5 offcanvas-header">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="order-md-last">
            <h4 class="mb-3 d-flex justify-content-between align-items-center">
                <span class="text-primary">Search</span>
            </h4>
            <form role="search" action="{{ route('homepage.search') }}" method="POST" id="search-form"
                class="gap-0 mt-3 d-flex">
                @csrf
                <input class="form-control rounded-start rounded-0 bg-light" type="text"
                    placeholder="What are you looking for?" aria-label="What are you looking for?"
                    name="search_input" />
                <button class="btn btn-dark rounded-end rounded-0"
                    onclick="document.getElementById('search-form').submit();" type="submit">
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
                    <img src="{{ asset('dist/assets/img/logo/logo.jpg') }}"
                        style="width: 180px; height: 70px; object-fit: contain;" alt="logo" class="img-fluid" />
                </div>
            </div>
            <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-5 d-none d-lg-block">
                <div class="p-2 my-2 search-bar row bg-light rounded-4">
                    <div class="col-12 col-md-11 text-center">
                        <form action="{{ route('homepage.search') }}" method="POST" id="search-form"
                            class="text-center">
                            @csrf
                            <input type="text" class="bg-transparent border-0 form-control"
                                placeholder="Search for more than 200 products" name="search_input" />
                        </form>
                    </div>
                    <div class="col-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="cursor: pointer;" onclick="document.getElementById('search-form').submit();">
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
                                @if (auth()->user()->is_admin == 1)
                                    <li><a class="dropdown-item" href="{{ URL('admin/dashboard') }}">Admin
                                            Dashboard</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                @endif
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
</header>
<!-- / Navbar -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addressContainer = document.getElementById('address-container');
        const addressFormContainer = document.getElementById('address-form-container');
        const editBtn = document.getElementById('edit-btn');
        const cancelBtn = document.getElementById('cancel-btn');

        if (editBtn && cancelBtn && addressContainer && addressFormContainer) {
            editBtn.addEventListener('click', () => {
                addressContainer.style.display = 'none';
                addressFormContainer.style.display = 'block';
            });

            cancelBtn.addEventListener('click', () => {
                addressFormContainer.style.display = 'none';
                addressContainer.style.display = 'block';
            });
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Mengatur event listener untuk tombol plus
        document.querySelectorAll('.increment-btn').forEach(button => {
            button.addEventListener('click', function() {
                const orderId = this.dataset.orderId;
                const quantitySpan = document.querySelector(
                    `.quantity-input[data-order-id="${orderId}"]`);
                const stockPerItemElement = document.querySelector(
                    `.stock-input[data-order-id="${orderId}"]`
                );
                const pricePerItemElement = document.querySelector(
                    `.price-per-item[data-order-id="${orderId}"]`
                );
                let quantity = parseInt(quantitySpan.innerText);
                let stockText = stockPerItemElement.innerText.replace('Stock: ', '').replace(
                    /\./g, '');
                let stock = parseInt(stockText);

                if (quantity < stock) {
                    quantity++;
                    quantitySpan.innerText = quantity;

                    let newQuantity = updateOrder(orderId, quantity);

                    if (pricePerItemElement) {
                        const pricePerOrder = pricePerItemElement.value;
                        updatePricing(orderId, pricePerOrder, newQuantity);
                    } else {
                        console.error('Elemen price-per-item tidak ditemukan!');
                    }
                }
            });
        });

        // Mengatur event listener untuk tombol minus
        document.querySelectorAll('.decrement-btn').forEach(button => {
            button.addEventListener('click', function() {
                const orderId = this.dataset.orderId;
                const quantitySpan = document.querySelector(
                    `.quantity-input[data-order-id="${orderId}"]`);
                const pricePerItemElement = document.querySelector(
                    `.price-per-item[data-order-id="${orderId}"]`
                );
                let quantity = parseInt(quantitySpan.innerText);

                // Mengurangi kuantitas jika lebih dari 0
                if (quantity > 1) {
                    quantity--;
                    quantitySpan.innerText = quantity; // Update tampilan kuantitas
                    let newQuantity = updateOrder(orderId, quantity);
                    if (pricePerItemElement) {
                        const pricePerOrder = pricePerItemElement.value;
                        updatePricing(orderId, pricePerOrder, newQuantity);
                    } else {
                        console.error('Elemen price-per-item tidak ditemukan!');
                    }
                }
            });
        });

        // Fungsi untuk memperbarui kuantitas dan menghapus item jika kuantitas 0
        function updateOrder(orderId, quantity) {
            // Ambil nilai note untuk semua produk
            const note = document.querySelector('#orderNote')
                .value; // Mengambil note yang diterapkan pada semua produk

            // Ambil seluruh dataOrder dari elemen yang ada
            const dataOrder = {};
            document.querySelectorAll('.quantity-input').forEach(function(el) {
                const id = el.dataset.orderId;
                const quantity = parseInt(el.innerText);
                dataOrder[id] = {
                    id: id,
                    quantity: quantity,
                    is_checkout: 0 // Tentukan nilai default untuk is_checkout
                };
            });

            // Menambahkan serialized dataOrder ke dalam form
            document.getElementById('dataOrder').value = JSON.stringify(dataOrder);
            return quantity;
        }

        function gatherPrices() {
            // Mengambil semua elemen dengan class .price-per-item
            const priceElements = document.querySelectorAll('.item-pricing');
            // Array untuk menyimpan hasil harga per item
            const prices = [];

            // Melakukan iterasi untuk setiap elemen
            priceElements.forEach(element => {
                // Mendapatkan value harga per item dan menambahkannya ke array
                // Mengambil teks dari elemen
                let priceText = element.innerText;
                // Menghapus "Rp." dan karakter titik (pemisah ribuan)
                let numericPrice = priceText.replace('Rp. ', '').replace(/\./g, '');
                // Mengonversi hasil string menjadi angka (integer)
                let price = parseInt(numericPrice, 10);

                // Menampilkan hasil harga yang sudah diproses
                prices.push(price);
            });

            return prices; // Mengembalikan array harga per item
        }


        function updatePricing(orderId, pricePerItem, quantity) {
            const totalPrice = pricePerItem * quantity;
            document.querySelector(`span.item-pricing[data-order-id="${orderId}"]`).innerText = 'Rp. ' +
                totalPrice
                .toLocaleString('id-ID');

            // Memanggil fungsi untuk mengumpulkan harga
            let prices = gatherPrices();

            prices = prices.reduce((acc, currentPrice) => acc + currentPrice, 0);

            // Update total price in cart
            document.querySelector('.total-price').innerText = 'Rp. ' + prices.toLocaleString('id-ID');

            // Update total price in navbar
            document.querySelector('.cart-total').innerText = 'Rp. ' + prices.toLocaleString('id-ID');
        }

    });
</script>
