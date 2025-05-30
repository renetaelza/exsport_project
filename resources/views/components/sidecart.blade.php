<!-- Popup Cart Sidebar -->
<div id="cartPopup" class="cart-popup hidden fixed top-0 right-0 w-full md:w-[400px] h-full bg-white z-50 shadow-lg transition-transform duration-300">
    <div class="flex justify-between items-center p-4 border-b">
        <h2 class="text-xl font-semibold">Cart</h2>
        <button onclick="toggleCartPopup()" class="text-2xl">&times;</button>
    </div>
    <div id="cartItemsContainer" class="p-4">
        <!-- Cart items will be injected here -->
    </div>
    <div id="cartBottomSection" class="p-4 border-t">
        <div class="text-sm text-gray-600 mb-2">Taxes and shipping calculated at checkout</div>
        <div class="text-xs text-red-600 font-bold">
            We process all orders in IDR and you will be checkout using the most current exchange rates
        </div>
        <button class="w-full bg-black text-white py-2 mt-4 font-semibold" onclick="checkoutCart()">
            CHECKOUT - <span id="cartTotal">IDR 0</span>
        </button>
    </div>
</div>

<script>
    let cart = [];

    function toggleCartPopup() {
        document.getElementById('cartPopup').classList.toggle('hidden');
    }

    function addToCart(product) {
        const existing = cart.find(item => item.id === product.id && item.color === product.color);
        if (!existing) {
            cart.push({
                ...product,
                quantity: 1
            });
        }
        renderCart();
        toggleCartPopup();
    }

    function removeCartItem(index) {
        cart.splice(index, 1);
        renderCart();
    }

    function increaseQuantity(index) {
        cart[index].quantity++;
        renderCart();
    }

    function decreaseQuantity(index) {
        if (cart[index].quantity > 1) {
            cart[index].quantity--;
        } else {
            cart.splice(index, 1);
        }
        renderCart();
    }

    function renderCart() {
        const container = document.getElementById('cartItemsContainer');
        const cartTotal = document.getElementById('cartTotal');
        const cartBottomSection = document.getElementById('cartBottomSection');

        container.innerHTML = '';
        let total = 0;

        if (cart.length === 0) {
            container.innerHTML = `<div class="text-center text-gray-500 py-20 font-semibold">Your cart is empty</div>`;
            cartBottomSection.style.display = 'none';
            return;
        } else {
            cartBottomSection.style.display = 'block';
        }

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
                            <div class="text-sm text-gray-600">IDR ${item.price.toLocaleString('id-ID')}</div>
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

        cartTotal.textContent = `IDR ${total.toLocaleString('id-ID')}`;
    }

    function checkoutCart() {
        alert('Proceed to checkout');
    }
    renderCart();
</script>

<style>
    .cart-popup {
        transform: translateX(100%);
    }

    .cart-popup:not(.hidden) {
        transform: translateX(0);
    }
</style>
