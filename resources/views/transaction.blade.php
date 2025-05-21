<!DOCTYPE html>
<html lang="en">
<head>
    <title>EXSPORT BAGS ADMIN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="EXSPORT BAGS ADMIN DASHBOARD">
    <meta name="author" content="Your Name">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('template/dist/assets/images/favicon.svg') }}" type="image/x-icon">

    <!-- Fonts & Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/fonts/material.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('template/dist/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/dist/assets/css/style-preset.css') }}">
</head>

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
    <!-- Loader -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    <!-- Sidebar -->
    <nav class="pc-sidebar">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="{{ url('/dashboard') }}" class="b-brand text-primary">
                    <img src="{{ asset('pictures/logo.png') }}" class="img-fluid" style="background-color: white; border-radius: 10px; width: 30px;">
                    <span>EXSPORT BAGS ADMIN</span>
                </a>
            </div>
            <x-sidebaradmin />
        </div>
    </nav>

    <!-- Main Content -->
    <div class="pc-container">
        <div class="pc-content">
            <!-- Breadcrumb -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">Transaction</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('adminView') }}">Admin Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="{{ url('transactionsView') }}">Transaction</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Transaction Table -->
            <section id="transaction" class="bg-light py-5">
                <div class="container text-center">
                    <h2 class="mb-4">Tabel Transaksi</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Order ID</th>
                                    <th>Order Cost</th>
                                    <th>Order Status</th>
                                    <th>User ID</th>
                                    <th>User Phone</th>
                                    <th>User City</th>
                                    <th>User Address</th>
                                    <th>Order Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->order_id }}</td>
                                        <td>Rp {{ number_format($transaction->order_cost, 0, ',', '.') }}</td>
                                        <td>{{ ucfirst($transaction->order_status) }}</td>
                                        <td>{{ $transaction->user_id }}</td>
                                        <td>{{ $transaction->user_phone }}</td>
                                        <td>{{ $transaction->user_city }}</td>
                                        <td>{{ $transaction->user_address }}</td>
                                        <td>{{ \Carbon\Carbon::parse($transaction->order_date)->format('d M Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('template/dist/assets/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('template/dist/assets/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('template/dist/assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/dist/assets/js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('template/dist/assets/js/pcoded.js') }}"></script>
    <script src="{{ asset('template/dist/assets/js/plugins/feather.min.js') }}"></script>
    <script src="{{ asset('template/dist/assets/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ asset('template/dist/assets/js/pages/dashboard-default.js') }}"></script>

    <script>
        layout_change('light');
        change_box_container('false');
        layout_rtl_change('false');
        preset_change("preset-1");
        font_change("Public-Sans");
    </script>
</body>
</html>
