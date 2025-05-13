@extends('admin.layouts.master') {{-- atau layout admin jika kamu punya --}}

@section('content')
<div class="container mt-4">
    <h1 class="h3 mb-4 text-uppercase fw-bold text-gray-800">Dashboard</h1>
    
    <div class="row">

        <!-- Total Orders -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-top-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Orders</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_orders }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-cart-fill fs-3 text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Income -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-top-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Income</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp{{ number_format($total_payments, 0, ',', '.') }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-cash-coin fs-3 text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Paid Orders -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-top-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Paid</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_paid }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-journal-check fs-3 text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Not Paid Orders -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-top-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Not Paid</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_not_paid }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-journal-x fs-3 text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
