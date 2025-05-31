<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Shop Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="shop-details-body" style="padding-top: 80px;">
    <x-navbar2 />
    <div class="max-w-[1200px] mx-auto flex flex-col lg:flex-row px-4 py-6 gap-6">
        <div class="hidden lg:flex flex-col gap-4 pr-6 border-r border-[#f6f0e3]">
            @foreach ($product->colour as $color)
            @php
            $colorLower = strtolower($color);
            $imageName = str_replace(' ', '-', $product->name) . '_' . $colorLower;

            if (file_exists(public_path("products/{$imageName}.png"))) {
            $imgPath = "/products/{$imageName}.png";
            } elseif (file_exists(public_path("products/{$imageName}.jpg"))) {
            $imgPath = "/products/{$imageName}.jpg";
            } else {
            $imgPath = "/products/default.png";
            }
            @endphp

            <button
                aria-label="Select product image {{ $color }}"
                class="cursor-pointer hover:opacity-80 transition duration-200"
                data-color="{{ $colorLower }}"
                onclick="scrollToColorImage('{{ $product->id }}', '{{ $colorLower }}')">
                <img
                    alt="Thumbnail {{ $color }}"
                    class="w-10 h-10 object-contain"
                    height="40"
                    src="{{ $imgPath }}"
                    width="40" />
            </button>
            @endforeach
        </div>

        <div class="container product-scroll-wrapper">
            <div class="product-content">
                <a class="detail-image" href="{{ route('detailView', ['id' => $product->id]) }}">
                    <div id="product-images-{{ $product->id }}" class="flex flex-col gap-6">
                        @foreach ($product->colour as $color)
                        @php
                        $colorLower = strtolower($color);
                        $imageName = str_replace(' ', '-', $product->name) . '_' . $colorLower;

                        if (file_exists(public_path("products/{$imageName}.png"))) {
                        $imgPath = "/products/{$imageName}.png";
                        } elseif (file_exists(public_path("products/{$imageName}.jpg"))) {
                        $imgPath = "/products/{$imageName}.jpg";
                        } else {
                        $imgPath = "/products/default.png";
                        }
                        @endphp

                        <img
                            id="product-image-{{ $product->id }}-{{ $colorLower }}"
                            src="{{ $imgPath }}"
                            alt="Product Image - {{ $color }}"
                            class="w-full max-h-[500px] object-contain foto-detail" />
                        @endforeach
                    </div>

                </a>

                <!-- Product details -->
                <div class="product-details">
                    <h3 class="product-title-detail">{{ $product->name }}</h3>
                    <p><strong>Harga:</strong> Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                    <p><strong>Deskripsi:</strong></p>
                    <div class="text-sm text-gray-700" style="font-size: 15px;">
                        @if($product->description)
                        @foreach($product->description as $desc)
                        <div>{{ $desc }}</div>
                        @endforeach
                        @else
                        <div>Tidak ada deskripsi tersedia.</div>
                        @endif

                    </div>
                    <p style="padding-top: 10px;"><strong>Kategori:</strong> {{ $product->category }}</p>

                    <div class="product-color-selection">
                        <span class="product-color-label">
                            Color:
                        </span>
                        <div class="product-vars">
                            @foreach ($product->colour as $color)
                            @php
                            $colorLower = strtolower($color);
                            $imageName = str_replace(' ', '-', $product->name) . '_' . $colorLower;

                            if (file_exists(public_path('products/' . $imageName . '.png'))) {
                            $imagePath = '/products/' . $imageName . '.png';
                            } elseif (file_exists(public_path('products/' . $imageName . '.jpg'))) {
                            $imagePath = '/products/' . $imageName . '.jpg';
                            } else {
                            $imagePath = '/products/default.png';
                            }
                            @endphp

                            <button
                                aria-label="Select {{ $color }} color"
                                class="w-6 h-6 rounded-full {{ $colorLower == 'white' ? 'bg-white border border-gray-300' : 'bg-[' . $colorLower . ']' }}"
                                data-color="{{ $colorLower }}"
                                onclick="scrollToColorImage('{{ $product->id }}', '{{ $colorLower }}')">
                            </button>
                            @endforeach

                        </div>
                    </div>
                    <button
                        class="product-add-to-cart-btn transition"
                        data-id="{{ $product->id }}"
                        data-name="{{ $product->name }}"
                        data-price="{{ $product->price }}"
                        data-image="{{ $imgPath }}"
                        onclick="handleAddToCartFromButton(this)">
                        Add to Cart | <strong>Harga: Rp{{ number_format($product->price, 0, ',', '.') }}</strong>
                    </button>
                </div>
                <!-- Product details END -->
            </div>
        </div>
        <!-- Main image and arrows with product info slidder END -->

    </div>

    <div class="flex justify-center relative">
        <div class="w-full max-w-[1200px] relative">
            <h2 class="text-2xl font-semibold text-center">Related Products</h2>
            <a href="{{ route('shopView') }}" class="text-sm text-gray-500 hover:text-gray-700 absolute right-0 top-1/2 -translate-y-1/2">See All</a>
        </div>
    </div>


    <div id="product-section" class="shop-product-section mt-8 px-8" style="padding-bottom: 20px;">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
            @foreach($products as $product)
            @php
            $productNameForFile = str_replace(' ', '-', $product->name);
            $colors = $product->colour;

            $firstColor = count($colors) > 0 ? strtolower($colors[0]) : null;
            $mainImageBase = $firstColor ? $productNameForFile . '_' . $firstColor : $productNameForFile;

            if (file_exists(public_path('products/' . $mainImageBase . '.png'))) {
            $imagePath = '/products/' . $mainImageBase . '.png';
            } elseif (file_exists(public_path('products/' . $mainImageBase . '.jpg'))) {
            $imagePath = '/products/' . $mainImageBase . '.jpg';
            } else {
            $imagePath = '/products/default.png';
            }
            @endphp

            <div class="product-item">
                <a class="product-image" href="{{ route('detailView', ['id' => $product->id]) }}">
                    <img id="product-image-{{ $product->id }}" src="{{ $imagePath }}" alt="Product Image" class="w-full h-48 object-cover rounded-md mb-3">
                </a>
                <h3 class="product-title font-semibold text-base mb-1">{{ $product->name }}</h3>
                <div class="product-price text-sm text-gray-700 mb-2">Rp{{ number_format($product->price, 0, ',', '.') }}</div>
                <div class="color-options flex flex-wrap justify-center gap-1">
                    @foreach($colors as $color)
                    @php
                    $colorLower = strtolower($color);
                    $colorImageBase = $productNameForFile . '_' . $colorLower;

                    if (file_exists(public_path('products/' . $colorImageBase . '.png'))) {
                    $colorImage = '/products/' . $colorImageBase . '.png';
                    } elseif (file_exists(public_path('products/' . $colorImageBase . '.jpg'))) {
                    $colorImage = '/products/' . $colorImageBase . '.jpg';
                    } else {
                    $colorImage = '/products/default.png';
                    }
                    @endphp
                    <span class="color {{ $color }}"
                        data-color="{{ $color }}"
                        data-image="{{ $colorImage }}"
                        onclick="changeImage('{{ $product->id }}', this)">
                    </span>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <x-sidecart />
    <x-footer />
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const wrapper = document.querySelector('.product-scroll-wrapper');
        const details = wrapper.querySelector('.product-details');
        const image = wrapper.querySelector('.img');

        const detailScrollDone = () => {
            return details.scrollTop + details.clientHeight >= details.scrollHeight;
        }

        const imageScrollDone = () => {
            return image.scrollTop + image.clientHeight >= image.scrollHeight;
        }

        let phase = 1; // 1: scroll detail, 2: scroll image, 3: scroll normal

        wrapper.addEventListener('wheel', (e) => {
            if (phase === 1) {
                details.scrollTop += e.deltaY;
                if (detailScrollDone()) {
                    phase = 2;
                }
                e.preventDefault();
            } else if (phase === 2) {
                image.scrollTop += e.deltaY;
                if (imageScrollDone()) {
                    phase = 3;
                }
                e.preventDefault();
            }
        }, {
            passive: false
        });
    });

    function changeImage(productId, element) {
        const newImage = element.getAttribute('data-image');
        const imgElement = document.getElementById('product-image-' + productId);

        if (imgElement && imgElement.src !== location.origin + newImage) {
            imgElement.classList.add('fade-out');
            setTimeout(() => {
                imgElement.src = newImage;
                imgElement.classList.remove('fade-out');
            }, 300);
        }
    }

    function scrollToColorImage(productId, color) {
        const imageElement = document.getElementById(`product-image-${productId}-${color}`);
        if (imageElement) {
            imageElement.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }
    }

    function getSelectedColor() {
        const selected = document.querySelector('.product-vars button.active');
        return selected ? selected.getAttribute('data-color') : null;
    }

    function handleAddToCartFromButton(button) {
        const product = {
            product_id: parseInt(button.getAttribute('data-id')),
            quantity: 1,
            color: getSelectedColor() || 'default',
        };

        addToCart(product);
    }


    function handleAddToCartFromButton(button) {
        const product = {
            product_id: parseInt(button.getAttribute('data-id')),
            quantity: 1,
            color: getSelectedColor() || 'default',
        };

        addToCart(product);
    }



    document.addEventListener("DOMContentLoaded", () => {
        const colorButtons = document.querySelectorAll('.product-vars button');
        if (colorButtons.length > 0) {
            colorButtons[0].classList.add('active');
        }

        colorButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                colorButtons.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
            });
        });
    });
</script>


</html>
