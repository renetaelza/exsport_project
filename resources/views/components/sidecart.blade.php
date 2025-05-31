<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<div id="cartOverlay" class="fixed inset-0 z-40 bg-opacity-30 hidden" onclick="toggleCartPopup()"></div>

<div id="cartPopup" class="cart-popup hidden fixed top-0 right-0 w-full md:w-[400px] h-full bg-white z-50 shadow-lg flex flex-col" style="padding-top: 80px;" onclick="event.stopPropagation()">
    <div class="flex justify-between items-center p-4 border-b">
        <h2 class="text-xl font-semibold">Cart</h2>
    </div>

    <div id="cartItemsContainer" class="p-4 overflow-y-auto flex-1"></div>

    <div id="cartBottomSection" class="p-4 border-t">
        <div class="text-sm text-gray-600 mb-2">Taxes calculated at checkout</div>
        <button class="w-full bg-black text-white py-2 font-semibold">CHECKOUT - <span id="cartTotal">Rp 0</span></button>
    </div>
</div>

<style>
    .cart-popup {
        transform: translateX(100%);
        transition: transform 0.3s;
    }

    .cart-popup:not(.hidden) {
        transform: translateX(0);
    }
</style>

<script>
    function toggleCartPopup() {
        document.getElementById('cartPopup').classList.toggle('hidden');
        document.getElementById('cartOverlay').classList.toggle('hidden');
    }

    function fetchCart() {
        fetch('/cart/session')
            .then(res => res.json())
            .then(data => renderCart(data));
    }

    function addToCart(product) {
        fetch('/cart/add', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify(product)
            })
            .then(res => res.json())
            .then(data => {
                renderCart(data.cart);
                toggleCartPopup();
            });
    }

    function updateCartItem(index, quantity) {
        fetch('/cart/update', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({
                    index,
                    quantity
                })
            })
            .then(res => res.json())
            .then(data => renderCart(data.cart));
    }

    function removeCartItem(index) {
        fetch('/cart/remove', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({
                    index
                })
            })
            .then(res => res.json())
            .then(data => renderCart(data.cart));
    }

    function increaseQuantity(index) {
        // Ambil quantity sekarang
        const quantitySpan = document.querySelectorAll('#cartItemsContainer span')[index];
        let currentQuantity = parseInt(quantitySpan.textContent);

        // Naikkan quantity
        let newQuantity = currentQuantity + 1;

        // Kirim update ke server
        updateCartItem(index, newQuantity);
    }

    function decreaseQuantity(index) {
        // Ambil quantity sekarang
        const quantitySpan = document.querySelectorAll('#cartItemsContainer span')[index];
        let currentQuantity = parseInt(quantitySpan.textContent);

        // Turunkan quantity kalau lebih dari 1
        if (currentQuantity > 1) {
            let newQuantity = currentQuantity - 1;
            updateCartItem(index, newQuantity);
        } else {
            // Kalau quantity 1 dan di-minus, hapus item
            removeCartItem(index);
        }
    }

    function formatRupiah(number) {
        return number.toLocaleString('id-ID', {
            maximumFractionDigits: 0
        });
    }


    function renderCart(cart) {
        const container = document.getElementById('cartItemsContainer');
        const cartTotal = document.getElementById('cartTotal');
        const cartBottom = document.getElementById('cartBottomSection');

        container.innerHTML = '';
        let total = 0;

        if (!cart.length) {
            container.innerHTML = `<div class="text-center text-gray-500 py-20">Your cart is empty</div>`;
            cartBottom.style.display = 'none';
            return;
        }

        cartBottom.style.display = 'block';

        cart.forEach((item, index) => {
            total += item.price * item.quantity;
            let formattedName = item.name.toLowerCase().replace(/\s+/g, '-');
            let formattedColor = item.color.toLowerCase();
            let imagePath = `/products/${formattedName}_${formattedColor}.png`;

            container.innerHTML += `
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-4">
                        <img src="${imagePath}" alt="${item.name}" class="w-16 h-16 object-cover rounded" />
                        <div>
                            <div class="font-semibold">${item.name}</div>
                            <div class="text-sm text-gray-600">IDR ${formatRupiah(item.price)}</div>
                            <div class="text-sm text-gray-500 capitalize">${item.color}</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <button onclick="decreaseQuantity(${index})" class="px-2 text-lg">&minus;</button>
                        <span class="px-2">${item.quantity}</span>
                        <button onclick="increaseQuantity(${index})" class="px-2 text-lg">&plus;</button>
                    </div>
                </div>
            `;
        });

        cartTotal.textContent = `Rp ${formatRupiah(total)}`;
    }

    document.addEventListener('DOMContentLoaded', fetchCart);
</script>
