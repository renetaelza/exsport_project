<!DOCTYPE html>
<html lang="en">

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
            <span class="tab active">Most Popular</span>
            <span class="tab">New Arrival</span>
            <span class="tab">Backpack</span>
            <span class="tab">Pouch</span>
        </div>

        <div class="product-grid">
            <div class="product-item">
                <div class="product-image">
                    <img src="https://via.placeholder.com/400x500" alt="">
                </div>
                <h3 class="product-title">The Dutchess</h3>
                <div class="product-subtitle">6.75-Quart Cast-Iron Dutch Oven</div>
                <div class="product-price">$205</div>
                <div class="color-options">
                    <span class="color green"></span>
                    <span class="color pink"></span>
                    <span class="color blue"></span>
                    <span class="color yellow"></span>
                    <span class="color black"></span>
                    <span class="color white"></span>
                </div>
            </div>
            <div class="product-item">
                <div class="product-image">
                    <img src="https://via.placeholder.com/400x500" alt="">
                </div>
                <h3 class="product-title">The Dutchess</h3>
                <div class="product-subtitle">6.75-Quart Cast-Iron Dutch Oven</div>
                <div class="product-price">$205</div>
                <div class="color-options">
                    <span class="color green"></span>
                    <span class="color pink"></span>
                    <span class="color blue"></span>
                    <span class="color yellow"></span>
                    <span class="color black"></span>
                    <span class="color white"></span>
                </div>
            </div>
            <div class="product-item">
                <div class="product-image">
                    <img src="https://via.placeholder.com/400x500" alt="">
                </div>
                <h3 class="product-title">The Dutchess</h3>
                <div class="product-subtitle">6.75-Quart Cast-Iron Dutch Oven</div>
                <div class="product-price">$205</div>
                <div class="color-options">
                    <span class="color green"></span>
                    <span class="color pink"></span>
                    <span class="color blue"></span>
                    <span class="color yellow"></span>
                    <span class="color black"></span>
                    <span class="color white"></span>
                </div>
            </div>
            <div class="product-item">
                <div class="product-image">
                    <img src="https://via.placeholder.com/400x500" alt="">
                </div>
                <h3 class="product-title">The Dutchess</h3>
                <div class="product-subtitle">6.75-Quart Cast-Iron Dutch Oven</div>
                <div class="product-price">$205</div>
                <div class="color-options">
                    <span class="color green"></span>
                    <span class="color pink"></span>
                    <span class="color blue"></span>
                    <span class="color yellow"></span>
                    <span class="color black"></span>
                    <span class="color white"></span>
                </div>
            </div>
        </div>
        <button class="shop-all-btn">Shop All</button>
    </div>

    <div class="why-container">
        <h3 style="text-align: center; justify-content: center; padding-top: 30px;">Why Us?</h3>
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

    <section class="video-section">
        <h3>Discover cool styling ideas and how to rock your Exsport Bags in these videos!</h3>
        <div class="video-slider">
            <div class="video-item">
                <div class="video-wrapper">
                    <video id="video1" preload="metadata">
                        <source src="{{ asset('videos/video1.mp4') }}" type="video/mp4">
                    </video>
                    <button class="play-button" onclick="playVideo('video1', this)">▶</button>
                </div>
            </div>
            <div class="video-item">
                <div class="video-wrapper">
                    <video id="video2" preload="metadata">
                        <source src="{{ asset('videos/video2.mp4') }}" type="video/mp4">
                    </video>
                    <button class="play-button" onclick="playVideo('video2', this)">▶</button>
                </div>
            </div>
            <div class="video-item">
                <div class="video-wrapper">
                    <video id="video3" preload="metadata">
                        <source src="{{ asset('videos/video3.mp4') }}" type="video/mp4">
                    </video>
                    <button class="play-button" onclick="playVideo('video3', this)">▶</button>
                </div>
            </div>
            <div class="video-item">
                <div class="video-wrapper">
                    <video id="video4" preload="metadata">
                        <source src="{{ asset('videos/video4.mp4') }}" type="video/mp4">
                    </video>
                    <button class="play-button" onclick="playVideo('video4', this)">▶</button>
                </div>
            </div>
            <div class="video-item">
                <div class="video-wrapper">
                    <video id="video5" preload="metadata">
                        <source src="{{ asset('videos/video5.mp4') }}" type="video/mp4">
                    </video>
                    <button class="play-button" onclick="playVideo('video5', this)">▶</button>
                </div>
            </div>
            <div class="video-item">
                <div class="video-wrapper">
                    <video id="video6" preload="metadata">
                        <source src="{{ asset('videos/video6.mp4') }}" type="video/mp4">
                    </video>
                    <button class="play-button" onclick="playVideo('video6', this)">▶</button>
                </div>
            </div>
        </div>
    </section>


    <x-footer />>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function playVideo(videoId, button) {
        const video = document.getElementById(videoId);
        video.play();
        button.style.display = 'none';
        video.setAttribute('controls', 'controls');
    }
</script>

</html>
