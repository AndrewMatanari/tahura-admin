@extends('ui.master')
@section('title', 'Detail Transaksi')
@section('content')
<section class="section d-flex justify-content-center align-items-center min-vh-100">
    <div class="row w-100 justify-content-center">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-center">
                    <h4 class="card-title text-white">Transaksi Details</h4>
                </div>
                <div class="card-body p-4">
                    <!-- User Photo -->
                    <div class="text-center mb-4 mt-4">
                        @if ($transaksi->qr_code)
                        <img src="{{ $transaksi->qr_code }}" alt="QR Code" class="rounded-circle img-thumbnail" style="width: 200px; height: 200px;">
                        @else
                            <img src="https://via.placeholder.com/150" alt="QR Code" class="img-fluid rounded-circle img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                        @endif
                    </div>

                    <div class="row">
                        <!-- Transaksi Details -->
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <h5 class="font-weight-bold">User ID</h5>
                                <p class="text-muted">{{ $transaksi->user_id }}</p>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <h5 class="font-weight-bold">Kode Transaksi</h5>
                                <p class="text-muted">{{ $transaksi->kode_transaksi }}</p>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <h5 class="font-weight-bold">Tanggal Transaksi</h5>
                                <p class="text-muted">{{ $transaksi->tanggal_transaksi }}</p>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <h5 class="font-weight-bold">Jumlah</h5>
                                <p class="text-muted">{{ $transaksi->jumlah }}</p>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <h5 class="font-weight-bold">Total Harga</h5>
                                <p class="text-muted">{{ $transaksi->total_harga }}</p>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <h5 class="font-weight-bold">No Kendaraan</h5>
                                <p class="text-muted">{{ $transaksi->no_kendaraan }}</p>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <h5 class="font-weight-bold">Jenis Kendaraan</h5>
                                <p class="text-muted">{{ $transaksi->jenis_kendaraan }}</p>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <h5 class="font-weight-bold">Status</h5>
                                <p class="text-muted">{{ $transaksi->status }}</p>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <h5 class="font-weight-bold">Metode Pembayaran</h5>
                                <p class="text-muted">{{ $transaksi->metode_pembayaran }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

