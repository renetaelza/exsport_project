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
                <img src="{{ asset('pictures/banner2.jpg') }}" class="d-block w-100" alt="...">
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
            </div>
        </section>
    </div>

    <div id="videoPopup" class="popup">
        <div class="popup-content">
            <video id="popupVideo" controls></video>
            <div class="info">
                <h2>Product Title</h2>
                <p><strong>Color:</strong> Black / Blue</p>
                <p><strong>Quantity:</strong> 1</p>
                <p>This bag is perfect for your daily activities. Durable, stylish, and spacious.</p>
                <button onclick="alert('More Info Clicked')">More Info</button>
                <button onclick="alert('Added to Cart')">Add to Cart</button>
            </div>
        </div>
    </div>

    <section class="team spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3 style="font-weight: bold; justify-content: center; align-items: center;">Informasi Outlet</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item">
                        <div class="imageL">
                            <a href="https://maps.app.goo.gl/X4zYhaZW1Ry4cMgm6?g_st=iw" target="_blank"><img style="object-fit: cover;"
                                    src="{{ asset('pictures/lokasi1.jpg') }}" alt=""></a>
                        </div>
                        <h4>Bandung</h4>
                        <span>Jl. L. L. R.E. Martadinata No.4, Bandung</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item">
                        <div class="imageL">
                            <a href="https://goo.gl/maps/tRThTyMRCY1jk1GM6" target="_blank"><img
                                    src="{{ asset('pictures/lokasi2.jpg') }}" alt=""></a>
                        </div>
                        <h4>Bandung</h4>
                        <span>Jl. Bahureksa No.24, Citarum, Bandung</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item">
                        <div class="imageL">
                            <a href="https://goo.gl/maps/KLuiMGxET25L2Qco6" target="_blank"><img
                                    src="{{ asset('pictures/lokasi3.png') }}" alt=""></a>
                        </div>
                        <h4>Yogyakarta</h4>
                        <span>Jl. C. Simanjuntak No.66B, Terban, Kec. Gondokusuman, Yogyakarta</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="team__item">
                        <div class="imageL">
                            <a href="https://g.co/kgs/fmZWGB" target="_blank"><img src="{{ asset('pictures/lokasi4.png') }}"
                                    alt=""></a>
                        </div>
                        <h4>Depok</h4>
                        <span>Jl. Margonda No.290, Kemiri Muka, Beji, Depok</span>
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

    <x-footer />>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function playVideo(videoId, btn) {
        const video = document.getElementById(videoId);
        const popup = document.getElementById('videoPopup');
        const popupVideo = document.getElementById('popupVideo');

        popupVideo.src = video.querySelector('source').src;
        popupVideo.load();
        popupVideo.play();

        popup.style.display = 'flex';

        popup.onclick = function(e) {
            if (e.target === popup) {
                popup.style.display = 'none';
                popupVideo.pause();
                popupVideo.currentTime = 0;
            }
        };
    }
</script>

</html>
