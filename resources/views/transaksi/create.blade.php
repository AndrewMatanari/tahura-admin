@extends('ui.master')

@section('title', 'Tambah Transaksi Baru')

@section('content')
<h1 class="mb-4">Tambah Transaksi Baru</h1>

<form action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Nama User -->
    <div class="form-group has-icon-left">
        <div class="position-relative">
            <input type="text" name="user_id" class="form-control" placeholder="Nama" value="{{ old('user_id', auth()->user()->id) }}" required readonly>
            <div class="form-control-icon">
                <i class="bi bi-person"></i>
            </div>
        </div>
        @error('user_id')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Kode Transaksi -->
    <div class="form-group has-icon-left">
        <div class="position-relative">
            <input type="text" name="kode_transaksi" class="form-control" placeholder="Kode Transaksi" value="{{ old('kode_transaksi', 'THB-' . time()) }}" required readonly>
            <div class="form-control-icon">
                <i class="bi bi-barcode"></i>
            </div>
        </div>
        @error('kode_transaksi')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Tanggal Transaksi -->
    <div class="form-group has-icon-left">
        <div class="position-relative">
            <input type="date" name="tanggal_transaksi" class="form-control" placeholder="Tanggal Transaksi" value="{{ old('tanggal_transaksi', \Carbon\Carbon::today()->format('Y-m-d')) }}" required>
            <div class="form-control-icon">
                <i class="bi bi-calendar"></i>
            </div>
        </div>
        @error('tanggal_transaksi')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Jumlah -->
    <div class="form-group has-icon-left">
        <div class="position-relative">
            <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" value="{{ old('jumlah') }}" required id="jumlah">
            <div class="form-control-icon">
                <i class="bi bi-number"></i>
            </div>
        </div>
        @error('jumlah')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- No Kendaraan -->
    <div class="form-group has-icon-left">
        <div class="position-relative">
            <input type="text" name="no_kendaraan" class="form-control" placeholder="No Kendaraan" value="{{ old('no_kendaraan') }}" required>
            <div class="form-control-icon">
                <i class="bi bi-car-front-fill"></i>
            </div>
        </div>
        @error('no_kendaraan')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <!-- Jenis Kendaraan -->
    <div class="form-group has-icon-left">
        <div class="position-relative">
            <select name="jenis_kendaraan" class="form-control @error('jenis_kendaraan') is-invalid @enderror" id="jenis_kendaraan" required>
                <option value="">-- Pilih Jenis Kendaraan --</option>
                <option value="sepeda_motor" {{ old('jenis_kendaraan') == 'sepeda_motor' ? 'selected' : '' }}>Sepeda Motor</option>
                <option value="mobil" {{ old('jenis_kendaraan') == 'mobil' ? 'selected' : '' }}>Mobil</option>
                <option value="bus" {{ old('jenis_kendaraan') == 'bus' ? 'selected' : '' }}>Bus</option>
            </select>
            <div class="form-control-icon">
                <i class="bi bi-car-front-fill"></i>
            </div>
        </div>
        @error('jenis_kendaraan')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Status -->
    <div class="form-group has-icon-left">
        <div class="position-relative">
            <select name="status" class="form-control @error('status') is-invalid @enderror" id="status" required>
                <option value="">Pilih Status</option>
                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="success" {{ old('status') == 'success' ? 'selected' : '' }}>Success</option>
                <option value="failed" {{ old('status') == 'failed' ? 'selected' : '' }}>Failed</option>
            </select>
            <div class="form-control-icon">
                <i class="bi bi-check-circle"></i>
            </div>
        </div>
        @error('status')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Metode Pembayaran -->
    <div class="form-group has-icon-left">
        <div class="position-relative">
            <select name="metode_pembayaran" class="form-control @error('metode_pembayaran') is-invalid @enderror" id="metode_pembayaran" required>
                <option value="">-- Pilih Metode Pembayaran --</option>
                <option value="dana" {{ old('metode_pembayaran') == 'dana' ? 'selected' : '' }}>Dana</option>
                <option value="gopay" {{ old('metode_pembayaran') == 'gopay' ? 'selected' : '' }}>GoPay</option>
                <option value="ovo" {{ old('metode_pembayaran') == 'ovo' ? 'selected' : '' }}>OVO</option>
                <option value="shopeepay" {{ old('metode_pembayaran') == 'shopeepay' ? 'selected' : '' }}>ShopeePay</option>
            </select>
            <div class="form-control-icon">
                <i class="bi bi-credit-card"></i>
            </div>
        </div>
        @error('metode_pembayaran')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <!-- Total Harga -->
    <div class="form-group has-icon-left">
        <div class="position-relative">
            <input type="number" name="total_harga" class="form-control" placeholder="Total Harga" value="{{ old('total_harga') }}" required readonly id="total_harga">
            <div class="form-control-icon">
                <i class="bi bi-cash-coin"></i>
            </div>
        </div>
        @error('total_harga')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary mt-3 mb-3">Tambah Data</button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const jumlahInput = document.getElementById('jumlah');
        const jenisKendaraanSelect = document.getElementById('jenis_kendaraan');
        const totalHargaInput = document.getElementById('total_harga');

        function updateTotalHarga() {
            const jumlah = parseInt(jumlahInput.value) || 0;
            const jenisKendaraan = jenisKendaraanSelect.value;
            let hargaKendaraan = 0;

            if (jenisKendaraan === 'sepeda_motor') {
                hargaKendaraan = 5000;
            } else if (jenisKendaraan === 'mobil') {
                hargaKendaraan = 10000;
            } else if (jenisKendaraan === 'bus') {
                hargaKendaraan = 50000;
            }

            const totalHarga = (jumlah * 15000) + hargaKendaraan;
            totalHargaInput.value = totalHarga;
        }

        jumlahInput.addEventListener('input', updateTotalHarga);
        jenisKendaraanSelect.addEventListener('change', updateTotalHarga);
    });
</script>
@endsection

