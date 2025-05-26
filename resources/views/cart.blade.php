<!DOCTYPE html>
<html lang="en">
<!-- Breadcrumb Section Begin -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exsport Bags</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Shopping Cart</title>
</head>
<!-- euy ir -->

<body class="min-h-screen flex flex-col items-center justify-center bg-gray-50" style="padding-top: 50px;">
    <x-navbar2 />
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option w-full max-w-5xl px-4 mb-6">
        <div class="container text-center">
            <div class="border border-info" style="border-radius: 30px; width: 1130px; text-align: left; padding: 20px; border-width: 5px;">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb__text">
                            <h4>Shopping Cart</h4>
                            <div class="breadcrumb__links">
                                <a href="index.php">Home</a>
                                <a href="">></a>
                                <a href="shop.php">Menu</a>
                                <a href="">></a>
                                <span>Shopping Cart</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad w-full max-w-5xl px-4" style="margin-top: -100px;">
        <div class="container">
            <div class="row">
                <div class="flex flex-col lg:flex-row lg:space-x-8">
                    <!-- Left: Cart Items & Notes -->
                    <div class="shopping__cart__table flex-1 ">
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th style="margin-left: 20px;">Quantity</th>
                                    <th>Sub Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp

                                @if (count($cart) > 0)
                                    @foreach ($products as $product)
                                        @php
                                            $quantity = $cart[$product->id];
                                            $subtotal = $product->price * $quantity;
                                            $total += $subtotal;
                                        @endphp
                                <tr>
                                    <td class="product__cart__item">
                                        <div class="product__cart__item__pic">
                                            <img src="{{ asset('img/product/' . $product->image) }}" alt="" width="70">
                                        </div>
                                        <div class="product__cart__item__text">
                                            <h6>{{ $product->name }}</h6>
                                            <h5>Rp {{ number_format($product->price, 0, ',', '.') }}</h5>
                                        </div>
                                    </td>
                                    <td class="quantity__item">
                                        <form method="POST" action="{{ route('cart.update', $product->id) }}" style="display: flex; align-items: center;">
                                            @csrf
                                            <input type="number" id="product_quantity_{{ $product->id }}" name="quantity" value="{{ $quantity }}" min="1" style="width: 70px;" onchange="calculatePrice('{{ $product->id }}', '{{ $product->price }}')">
                                            <button class="editbtn" type="submit"><i class="fa fa-refresh"></i></button>
                                        </form>
                                    </td>
                                    <td class="cart__price">
                                        <span id="product_price_{{ $product->id }}">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('cart.remove', $product->id) }}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr>
                                    <td colspan="4">Keranjang masih kosong.</td>
                                </tr>
                                @endif
                            </tbody>

                        </table>

                        <!-- Optional Notes -->
                        <form class="grid grid-cols-3 gap-4 items-center">
                            <label for="notes" class="text-xs text-black col-span-1">Catatan (Opsional)</label>
                            <input
                                id="notes"
                                type="text"
                                placeholder="Contoh: sambalnya banyakin dong!"
                                class="col-span-2 border border-gray-300 rounded px-3 py-2 text-xs placeholder-gray-400 focus:outline-none focus:ring-1 focus:ring-[#3DBBC6]" />
                        </form>

                        <!-- Continue Shopping -->
                        <button
                            type="button"
                            class="mt-8 bg-[#3DBBC6] text-white text-xs rounded px-8 py-3 flex items-center justify-center gap-2 hover:bg-[#33a9af] transition">
                            Continue Shopping <i class="fas fa-arrow-circle-right"></i>
                        </button>
                    </div>

                    <!-- Right: Payment Summary -->
                    <aside class="w-full max-w-xs bg-[#F2F2EE] rounded-xl p-6">
                        <h3 class="font-semibold text-sm mb-4">Ringkasan Pembayaran</h3>
                        <div class="text-xs font-normal mb-4">
                            <div class="flex justify-between mb-1">
                                <span>Harga</span>
                                <span></span>
                            </div>
                            <div class="flex justify-between border-b border-black/20 pb-1">
                                <span>Ongkos Kirim</span>
                                <span>20.000</span>
                            </div>
                        </div>
                        <div class="flex justify-between font-semibold text-xs mb-6">
                            <span>Total Pembayaran</span>
                            <span id="total_payment"><?php echo isset($total) ? $total + 20000 : '0'; ?></span>
                        </div>
                        <form method="POST" id="checkout_form" action="checkout.php">
                            <input type="hidden" name="notes_hidden" id="notes_hidden">
                            <button type="submit" class="w-full bg-[#3DBBC6] text-white text-xs rounded px-8 py-3 hover:bg-[#33a9af] transition">
                                Checkout
                            </button>
                        </form>

                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
</body>


<script>
    function calculatePrice(productId, price) {
        var quantity = document.getElementById('product_quantity_' + productId).value;
        var subtotal = quantity * price;
        document.getElementById('product_price_' + productId).innerText = subtotal;
        updateTotalPayment();
    }

    function updateTotalPayment() {
        var total_payment = 0;
        var prices = document.querySelectorAll('[id^="product_price_"]');
        prices.forEach(function(element) {
            total_payment += parseInt(element.innerText);
        });
        total_payment += 20000; // Ongkir
        document.getElementById('total_payment').innerText = total_payment;
    }

    document.getElementById('checkout_form').addEventListener('submit', function(e) {
        const notes = document.getElementById('notes').value;
        document.getElementById('notes_hidden').value = notes;
    });

    /*
    const checkoutForm = document.getElementById('checkout_form');
    const notesInput = document.getElementById('notes');

    // Tambahkan event listener untuk saat tombol checkout ditekan
    checkoutForm.addEventListener('submit', function(event) {
        // Ambil nilai catatan
        const notes = notesInput.value;

        // Tambahkan nilai catatan sebagai parameter pada URL saat redirect ke halaman checkout
        checkoutForm.action = 'checkout.php?notes=' + encodeURIComponent(notes);
    });

    function calculatePrice(productId) {
        // Mendapatkan nilai quantity
        var quantity = document.getElementById('product_quantity_' + productId).value;

        // Mendapatkan harga produk
        // var price = ;  
        // 

        // Menghitung total harga dan menampilkan pada span
        document.getElementById('product_price_' + productId).innerText = quantity * price;

        // Update total pembayaran
        updateTotalPayment();
    }

    function updateTotalPayment() {
        var total_payment = 0;
        var prices = document.querySelectorAll('[id^="product_price_"]');
        prices.forEach(function(element) {
            total_payment += parseInt(element.innerText);
        });
        total_payment += 20000; // Add shipping cost
        document.getElementById('total_payment').innerText = total_payment;
    }*/
</script>

</html>