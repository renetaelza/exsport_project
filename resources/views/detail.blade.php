<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<!-- euy jir -->

<body style="padding-top: 80px;">
    <x-navbar2 />
    <div class="max-w-[1200px] mx-auto flex flex-col lg:flex-row px-4 py-6 gap-6">
        <!-- Left side thumbnails -->
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

            <button aria-label="Select product image {{ $color }}" class="opacity-50 hover:opacity-100">
                <img
                    alt="Thumbnail {{ $color }}"
                    class="w-10 h-10 object-contain"
                    height="40"
                    src="{{ $imgPath }}"
                    width="40" />
            </button>
            @endforeach
        </div>

        <!-- Left side thumbnails END -->

        <!-- Main image and arrows with product info slidder -->
        <div class="container product-scroll-wrapper">
            <div class="product-content">
                <!-- Main image -->
                <a class="img" href="{{ route('detailView', ['id' => $product->id]) }}">
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
                            class="w-full max-h-[500px] object-contain" />
                        @endforeach
                    </div>

                </a>

                <!-- Product details -->
                <div class="product-details">
                    <h3 class="product-title">{{ $product->name }}</h3>
                    <p><strong>Harga:</strong> Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                    <p><strong>Deskripsi:</strong> {{ $product->description }}</p>
                    <p><strong>Kategori:</strong> {{ $product->category }}</p>

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
                    <a href="{{ route('cart.add', ['id' => $product->id]) }}" class="product-add-to-cart-btn transition">
                        Add to Cart | <strong>Harga: Rp{{ number_format($product->price, 0, ',', '.') }}</strong>
                    </a>
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


    <div id="product-section" class="product-section" style="margin-top: -30px;">
        <div class="product-grid">
            @foreach($products as $product)
            <div class="product-item">

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

                <a class="product-image" href="{{ route('detailView', ['id' => $product->id]) }}">
                    <img id="product-image-{{ $product->id }}" src="{{ $imagePath }}" alt="Product Image">
                </a>
                <h3 class="product-title">{{ $product->name }}</h3>
                <div class="product-price">Rp{{ number_format($product->price, 0, ',', '.') }}</div>
                <div class="color-options">
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

    <x-footer />
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Scrolling effect for product details and image
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
            // phase 3: biarkan browser scroll normal ke konten selanjutnya
        }, {
            passive: false
        });
    });

    // Change image on color selection
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
</script>


</html>