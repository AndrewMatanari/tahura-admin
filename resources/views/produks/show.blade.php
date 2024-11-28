@extends('ui.master')
@section('title', 'Detail Produk')
@section('content')
<section class="section d-flex justify-content-center align-items-center min-vh-100">
    <div class="row w-100 justify-content-center">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-center">
                    <h4 class="card-title text-white">Product Details</h4>
                </div>
                <div class="card-body p-4">
                    <!-- Product Photo -->
                    <div class="text-center mb-4 mt-4">
                        @if ($produk->photo)
                        <img src="{{ url('storage/' . $produk->photo) }}" alt="Product Image" class="rounded-circle img-thumbnail" style="width: 200px; height: 200px;">
                        @else
                            <img src="https://via.placeholder.com/150" alt="Product Photo" class="img-fluid rounded-circle img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                        @endif
                    </div>

                    <div class="row">
                        <!-- Product Details -->
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <h5 class="font-weight-bold">Name</h5>
                                <p class="text-muted">{{ $produk->nama_produk }}</p>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <h5 class="font-weight-bold">Description</h5>
                                <p class="text-muted">{{ $produk->deskripsi }}</p>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <h5 class="font-weight-bold">Price</h5>
                                <p class="text-muted">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Product Update and Delete Buttons -->
                    <div class="text-center mt-4">
                        <a href="{{ route('produks.edit', $produk->id) }}" class="btn btn-warning text-white">Edit Product</a>
                        <form action="{{ route('produks.destroy', $produk->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

