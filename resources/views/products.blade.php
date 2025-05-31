{{-- resources/views/admin/create.blade.php --}}
@extends('mantis')

@section('dataproduct')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Products List</h4>
    </div>
    <div class="container my-4">
        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('admin.create') }}" class="btn btn-primary">Tambah Product</a>
        </div>

        <!-- ProdukAdmin Table Section -->
        <section id="productsAdmin" class="bg-light py-5">
            <div class="container">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead style="background-color: #87CEEB;">
                            <tr>
                                <th>ID</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Warna</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    @if (!empty($product->image_url) && is_array($product->image_url))
                                    <img src="{{ asset('storage/' . $product->image_url[0]) }}" alt="Foto Produk" width="80">
                                    @else
                                    <img src="{{ asset('images/default-product.jpg') }}" alt="Default Foto" width="80">
                                    @endif
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>
                                    {{ Str::limit(is_array($product->description) ? implode(', ', $product->description) : $product->description, 100) }}
                                </td>
                                <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ is_array($product->colour) ? implode(', ', $product->colour) : $product->colour }}</td>
                                <td>{{ $product->category }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="#" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="#" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9">Belum ada produk tersedia.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </div>
    @endsection