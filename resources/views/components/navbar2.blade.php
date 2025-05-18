<header class="header bg-white">
    <div class="container-fluid px-4">
        <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-between align-items-center">
            <!-- Navigasi Kiri -->
            <ul class="navbar-nav fw-semibold fs-5 d-flex flex-row">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('shopView') }}">Shop</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../shop.php">Find Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../contact.php">About Us</a>
                </li>
            </ul>

            <!-- Logo Tengah -->
            <div class="logo-popout">
                <a class="navbar-brand mx-auto start-50 translate-middle-x" href="../index.php">
                    <img src="{{ asset('pictures/logo.png') }}" style="background-color: white; border-radius: 65px; width: 80px;">
                </a>
            </div>


            <!-- Navigasi Kanan -->
            <div class="d-flex align-items-center">
                <a href="{{ route('loginUser') }}" class="me-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="16" fill="black" class="bi bi-person"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg>
                </a>
                <a href="{{ route('cartView') }}" class="position-relative">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-bag"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z" />
                    </svg>
                    <span id="cart-quantity"
                        class="badge bg-danger position-absolute top-0 start-100 translate-middle">0</span>
                </a>
            </div>
        </nav>
    </div>
</header>
