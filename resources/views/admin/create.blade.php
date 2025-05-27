@extends('mantis')

@section('dataproduct')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tambah Products</h4>
    </div>
    <div class="card-body">

        {{-- Feedback success --}}
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div>
            <section id="contact" class="bg-light py-5">
                <div class="container text-center">
                    <form class="mt-4" method="post" action="{{ route('products.create') }}" enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <!-- Nama Produk -->
                        <div class="mb-3">
                            <input type="text" class="form-control" name="name" placeholder="Nama Produk" required>
                        </div>

                        <!-- Harga -->
                        <div class="mb-3">
                            <input type="number" step="0.01" class="form-control" name="price" placeholder="Harga" required>
                        </div>

                        <!-- Stok -->
                        <div class="mb-3">
                            <input type="number" class="form-control" name="stock" placeholder="Stok" required>
                        </div>

                        <!-- Warna (Array) -->
                        <div class="mb-3">
                            <input type="text" class="form-control" name="colour[]" placeholder="Warna (misal: Merah)" required>
                            <input type="text" class="form-control mt-2" name="colour[]" placeholder="Warna tambahan (opsional)">
                        </div>

                        <!-- Kategori -->
                        <div class="mb-3">
                            <input type="text" class="form-control" name="category" placeholder="Kategori" required>
                        </div>

                        <!-- Deskripsi (Array) -->
                        <div class="mb-3">
                            <textarea class="form-control mb-2" rows="3" name="description[]" placeholder="Deskripsi utama" required></textarea>
                            <textarea class="form-control" rows="2" name="description[]" placeholder="Deskripsi tambahan (opsional)"></textarea>
                        </div>

                        <!-- Foto (Array) -->
                        <div class="mb-3">
                            <input type="file" name="image_url[]" multiple accept="image/*">
                        </div>

                        <!-- Tombol Submit -->
                        <button type="submit" class="btn btn-danger">Unggah</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
