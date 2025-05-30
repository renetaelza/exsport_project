<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body style="padding-top: 50px;">
    <x-navbar2 />
    <div class="hero">
        <div class="texthero-shop">
            <h1>All Products</h1>
        </div>
        <div>
            <img src="{{ asset('products/banner2.png') }}" alt="" style="width: 4500px; height: 500px; object-fit: fill;">
        </div>
    </div>

    <form id="filterForm" method="GET" action="{{route('shopView')}}" class="flex justify-center items-center gap-4 py-6">
        {{-- Dropdown Category --}}
        <select name="category" id="categorySelect" class="focus:outline-none focus:ring-0 focus:border-none">
            <option value="">All</option>
            @foreach($categories as $cat)
            @php
            $displayCat = ucwords(str_replace('_', ' ', $cat));
            @endphp
            <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>
                {{ $displayCat }}
            </option>
            @endforeach
        </select>


        {{-- Input Search --}}
        <div class="flex items-center border border-gray-300 rounded-full px-4 py-2 w-full max-w-md">
            <i class="bi bi-search text-gray-500 mr-2"></i>
            <input type="text" name="search" id="searchInput" placeholder="Search products..."
                value="{{ request('search') }}"
                class="w-full border-none outline-none focus:outline-none focus:ring-0 focus:border-none text-sm bg-transparent text-gray-700">
        </div>
    </form>

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

    <x-footer />
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const categorySelect = document.getElementById('categorySelect');
        const searchInput = document.getElementById('searchInput');
        const filterForm = document.getElementById('filterForm');

        categorySelect.addEventListener('change', function() {
            filterForm.submit();
        });

        let typingTimer;
        const doneTypingInterval = 400;

        searchInput.addEventListener('input', function() {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(() => {
                filterForm.submit();
            }, doneTypingInterval);
        });

        searchInput.addEventListener('keydown', function() {
            clearTimeout(typingTimer);
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
</script>

</html>