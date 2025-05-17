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
<!-- euy -->
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
                                <?php if (isset($_SESSION['cart'])) { ?>
                                    <?php foreach ($_SESSION['cart'] as $key => $value) { ?>
                                        <div>
                                            <tr>
                                                <td class="product__cart__item">
                                                    <div class="product__cart__item__pic">
                                                        <img src="img/product/" alt="">
                                                    </div>
                                                    <div class="product__cart__item__text">
                                                        <h6>Nama Produk</h6>
                                                        <h5>Harga Produk</h5>
                                                    </div>
                                                </td>
                                                <td class="quantity__item">
                                                    <div class="quantity" style="margin-left: 20px; display: flex; align-items: center;">
                                                        <form method="POST" action="shopping-cart.php" style="display: flex;">
                                                            <div>
                                                                <input type="hidden" name="product_id" value="">
                                                                <input style="margin-top: 13px; margin-right: 15px;" type="number" name="product_quantity" value="" min="1" style="margin-right: 5px;">
                                                            </div>
                                                            <div>
                                                                <button class="editbtn" type="submit" name="edit_quantity"><i class="fa fa-refresh"></i></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td class="cart__price">
                                                    <span id="product_price_>">harga produk</span>
                                                </td>
                                                <form method="POST" action="shopping-cart.php">
                                                    <td>
                                                        <input type="hidden" name="product_id" value="">
                                                        <button type="submit" class="btn btn-danger" name="remove_product"><i class="fa fa-trash"></i></button>
                                                    </td>
                                                </form>
                                            </tr>
                                            </tr>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
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
                            <span>0</span>
                        </div>
                        <button
                            type="button"
                            class="w-full bg-[#3DBBC6] text-white text-xs rounded px-8 py-3 hover:bg-[#33a9af] transition">
                            Checkout
                        </button>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->
</body>


<script>
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
    }
</script>

</html>