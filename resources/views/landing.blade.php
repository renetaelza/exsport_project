<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Exsport Bags</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <x-navbar />

    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000" style="padding-top: 90px;">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('pictures/banner3.png') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('pictures/banner2.png') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('pictures/banner1.jpg') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="marquee-container">
        <div class="marquee">
            <span>Express your quirks and keep #SparkingGoodness #BringYourSelfOut💥</span>
            <span>Express your quirks and keep #SparkingGoodness #BringYourSelfOut💥</span>
            <span>Express your quirks and keep #SparkingGoodness #BringYourSelfOut💥</span>
            <span>Express your quirks and keep #SparkingGoodness #BringYourSelfOut💥</span>
            <span>Express your quirks and keep #SparkingGoodness #BringYourSelfOut💥</span>
            <span>Express your quirks and keep #SparkingGoodness #BringYourSelfOut💥</span>
            <span>Express your quirks and keep #SparkingGoodness #BringYourSelfOut💥</span>
        </div>
    </div>

    <div class="product-section">
        <div class="tabs">
            @php
            $categories = ['Backpack', 'Tote Bag', 'Sling Bag', 'Pouch', 'Accessories'];
            @endphp

            @foreach($categories as $cat)
            <span class="tab {{ $cat == $category ? 'active' : '' }}" data-category="{{ $cat }}">{{ $cat }}</span>
            @endforeach
        </div>

        <div class="product-grid">
            @foreach($products->take(4) as $product)
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
        <div class="btn-shop-wrapper">
            <a href="{{ route('shopView') }}">
                <button class="shop-all-btn">Shop All</button>
            </a>
        </div>
    </div>

    <div class="why-container">
        <h3 style="text-align: center; justify-content: center; padding-top: 30px; font-weight: bold;">Why Us?</h3>
        <section class="why-us-section" style="margin-top: -20px;">
            <div class="why-card">
                <i class="bi bi-bag-fill icon-why"></i>
                <h4>Stylish & Fungsional</h4>
                <p>Desain modern yang cocok untuk aktivitas harian, kampus, kerja, dan traveling.</p>
            </div>
            <div class="why-card">
                <i class="bi bi-award-fill icon-why"></i>
                <h4>Quality Craftsmanship</h4>
                <p>Produk dibuat dengan standar kualitas tinggi untuk daya tahan maksimal.</p>
            </div>
            <div class="why-card">
                <i class="bi bi-droplet-fill icon-why"></i>
                <h4>Water Resistant</h4>
                <p>Material tahan air untuk perlindungan ekstra saat hujan atau aktivitas outdoor.</p>
            </div>
            <div class="why-card">
                <i class="bi bi-heart-fill icon-why"></i>
                <h4>Brand Lokal Favorit</h4>
                <p>Dukunganmu membantu karya anak bangsa terus berkembang di pasar internasional.</p>
            </div>
        </section>
    </div>

    <div class="overflow-hidden">
        <section class="video-section">
            <h3 style="font-weight: bold;">Discover cool styling ideas and how to rock your Exsport Bags in these videos!</h3>
            <div class="video-slider-wrapper">
                <div class="video-slider" id="videoSlider">
                    <div class="video-item" data-product-id="13">
                        <div class="video-wrapper">
                            <video id="video1" preload="metadata">
                                <source src="{{ asset('videos/video1.mp4') }}" type="video/mp4">
                            </video>
                            <button class="play-button" onclick="playVideo('video1', this)">▶</button>
                        </div>
                    </div>
                    <div class="video-item" data-product-id="14">
                        <div class="video-wrapper">
                            <video id="video2" preload="metadata">
                                <source src="{{ asset('videos/video2.mp4') }}" type="video/mp4">
                            </video>
                            <button class="play-button" onclick="playVideo('video2', this)">▶</button>
                        </div>
                    </div>
                    <div class="video-item" data-product-id="19">
                        <div class="video-wrapper">
                            <video id="video3" preload="metadata">
                                <source src="{{ asset('videos/video3.mp4') }}" type="video/mp4">
                            </video>
                            <button class="play-button" onclick="playVideo('video3', this)">▶</button>
                        </div>
                    </div>
                    <div class="video-item" data-product-id="15">
                        <div class="video-wrapper">
                            <video id="video4" preload="metadata">
                                <source src="{{ asset('videos/video4.mp4') }}" type="video/mp4">
                            </video>
                            <button class="play-button" onclick="playVideo('video4', this)">▶</button>
                        </div>
                    </div>
                    <div class="video-item" data-product-id="18">
                        <div class="video-wrapper">
                            <video id="video5" preload="metadata">
                                <source src="{{ asset('videos/video5.mp4') }}" type="video/mp4">
                            </video>
                            <button class="play-button" onclick="playVideo('video5', this)">▶</button>
                        </div>
                    </div>
                    <div class="video-item" data-product-id="17">
                        <div class="video-wrapper">
                            <video id="video6" preload="metadata">
                                <source src="{{ asset('videos/video6.mp4') }}" type="video/mp4">
                            </video>
                            <button class="play-button" onclick="playVideo('video6', this)">▶</button>
                        </div>
                    </div>
                    <div class="video-item" data-product-id="4">
                        <div class="video-wrapper">
                            <video id="video7" preload="metadata">
                                <source src="{{ asset('videos/video7.mp4') }}" type="video/mp4">
                            </video>
                            <button class="play-button" onclick="playVideo('video7', this)">▶</button>
                        </div>
                    </div>
                    <div class="video-item" data-product-id="16">
                        <div class="video-wrapper">
                            <video id="video8" preload="metadata">
                                <source src="{{ asset('videos/video8.mp4') }}" type="video/mp4">
                            </video>
                            <button class="play-button" onclick="playVideo('video8', this)">▶</button>
                        </div>
                    </div>
                    <div class="video-item" data-product-id="10">
                        <div class="video-wrapper">
                            <video id="video9" preload="metadata">
                                <source src="{{ asset('videos/video9.mp4') }}" type="video/mp4">
                            </video>
                            <button class="play-button" onclick="playVideo('video9', this)">▶</button>
                        </div>
                    </div>
                    <div class="video-item" data-product-id="16">
                        <div class="video-wrapper">
                            <video id="video10" preload="metadata">
                                <source src="{{ asset('videos/video10.mp4') }}" type="video/mp4">
                            </video>
                            <button class="play-button" onclick="playVideo('video10', this)">▶</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div id="videoPopup" class="popup">
        <div class="popup-content">
            <video id="popupVideo" controls></video>
            <div class="info">
                <img id="productImage" src="" alt="Product Image" style="width: 100%; max-width: 200px; border-radius: 12px;">
                <h2 id="productTitle"></h2>
                <div id="productPrice" class="product-price mt-2 text-gray-700 text-sm leading-relaxed"></div>
                <div id="productDescription" class="product-description mt-2 text-gray-700 text-sm leading-relaxed"></div>
                <div class="btn-shop-wrapper">
                    <a href="#"><button id="moreinfobtn" class="shop-all-btn">More Info</button></a>
                </div>
            </div>
        </div>
    </div>


    <section class="team">
        <div class="container">
            <div class="section-title">
                <h3>Find Your Nearest Happy Spot!</h3>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                    <div class="team__item w-100">
                        <a href="https://maps.app.goo.gl/X4zYhaZW1Ry4cMgm6?g_st=iw" target="_blank">
                            <img src="{{ asset('pictures/lokasi1.jpg') }}" alt="Outlet Bandung Martadinata">
                        </a>
                        <h4>Bandung - Martadinata</h4>
                        <span>Jl. L. L. R.E. Martadinata No.4, Bandung</span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                    <div class="team__item w-100">
                        <a href="https://goo.gl/maps/tRThTyMRCY1jk1GM6" target="_blank">
                            <img src="{{ asset('pictures/lokasi2.jpg') }}" alt="Outlet Bandung Bahureksa">
                        </a>
                        <h4>Bandung - Bahureksa</h4>
                        <span>Jl. Bahureksa No.24, Citarum, Bandung</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                    <div class="team__item w-100">
                        <div class="imageL">
                            <a href="https://goo.gl/maps/KLuiMGxET25L2Qco6" target="_blank"><img
                                    src="{{ asset('pictures/lokasi3.png') }}" alt=""></a>
                        </div>
                        <h4>Yogyakarta</h4>
                        <span>Jl. C. Simanjuntak No.66B, Terban, Yogyakarta</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 d-flex">
                    <div class="team__item w-100">
                        <div class="imageL">
                            <a href="https://g.co/kgs/fmZWGB" target="_blank"><img src="{{ asset('pictures/lokasi4.png') }}"
                                    alt=""></a>
                        </div>
                        <h4>Depok</h4>
                        <span>Jl. Margonda No.290, Kemiri Muka, Beji, Depok</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 d-flex" style="padding-top: 20px;">
                    <div class="team__item w-100">
                        <div class="imageL">
                            <a href="https://g.co/kgs/fmZWGB" target="_blank"><img src="{{ asset('pictures/lokasi5.png') }}"
                                    alt=""></a>
                        </div>
                        <h4>Jakarta</h4>
                        <span>Pondok Indah Mall 2, South Skywalk 1st Floor, Jl. Metro Pondok Indah, Jakarta Selatan</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 d-flex" style="padding-top: 20px;">
                    <div class="team__item w-100">
                        <div class="imageL">
                            <a href="https://g.co/kgs/fmZWGB" target="_blank"><img src="{{ asset('pictures/lokasi4.png') }}"
                                    alt=""></a>
                        </div>
                        <h4>Semarang</h4>
                        <span>Jl. Brigjen Katamso, Semarangk</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="hero">
        <div class="texthero">
            <h4>Our Story</h4>
            <p>At Exsport, we believe in turning everyday moments into extraordinary experiences. Our journey began with a simple idea: to create bags that blend style, functionality, and joy. With over 70 vibrant flavors, each bag is a testament to our passion for creativity and adventure.</p>
            <br>
            <button type="button" class="btn btn-info">Discover More</button>
        </div>
        <div>
            <img src="{{ asset('pictures/info.png') }}" alt="Exsport Bags"
                style="width: 900px; height: 450px;">
        </div>
    </div>
    <x-sidecart />
    <x-footer />
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.querySelectorAll('.tabs .tab').forEach(tab => {
        tab.addEventListener('click', function() {
            const category = this.getAttribute('data-category');
            window.location.href = '/?category=' + encodeURIComponent(category);
        });
    });

    function toggleCartPopup() {
        document.getElementById('cartPopup').classList.toggle('hidden');
    }

    function playVideo(videoId, btn) {
        const video = document.getElementById(videoId);
        const popup = document.getElementById('videoPopup');
        const popupVideo = document.getElementById('popupVideo');

        popupVideo.src = video.querySelector('source').src;
        popupVideo.load();
        popupVideo.play();

        const productId = btn.closest('.video-item').getAttribute('data-product-id');

        fetch(`/product-detail/${productId}`)
            .then(response => response.json())
            .then(data => {
                console.log("Full data response:", data);
                document.getElementById("productTitle").textContent = data.title;
                document.getElementById("productPrice").textContent = "Rp" + parseInt(data.price).toLocaleString('id-ID');
                document.getElementById("productPrice").textContent = "Rp" + parseInt(data.price).toLocaleString('id-ID');
                document.getElementById("productDescription").innerHTML =
                    data.description.map(item => `<p>${item}</p>`).join("");

                document.getElementById("productImage").src = data.image;
            })
            .catch(error => console.error("Error fetching product:", error));

        const moreInfoBtn = document.getElementById('moreinfobtn');
        if (moreInfoBtn) {
            moreInfoBtn.dataset.productId = productId;
        }

        popup.style.display = 'flex';

        popup.onclick = function(e) {
            if (e.target === popup) {
                popup.style.display = 'none';
                popupVideo.pause();
                popupVideo.currentTime = 0;
            }
        };
    }

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

    document.getElementById('moreinfobtn').addEventListener('click', function() {
        const productId = this.dataset.productId;
        if (productId) {
            window.location.href = `/detail/${productId}`;
        }
    });
</script>

</html>
