@extends('ui.master')
@section('title', isset($transaksi) ? 'Edit' : 'Add' . ' Transaksis')
@section('content')
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ isset($transaksi) ? 'Edit' : 'Add' }} Transaksis</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($transaksi) ? route('transaksi.update', $transaksi->id) : route('transaksi.store') }}" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                            @csrf
                            @if (isset($transaksi))
                                @method('PUT')
                            @endif

                            <div class="form-group row">
                                <label for="user_id" class="col-sm-2 col-form-label">User</label>
                                <div class="col-sm-10">
                                <select name="user_id" class="form-control @error('user_id') is-invalid @enderror" id="user_id" required>
                                    <option value="">-- Pilih User --</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user_id', $transaksi->user_id ?? '') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                    @error('user_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kode_transaksi" class="col-sm-2 col-form-label">Kode Transaksi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('kode_transaksi') is-invalid @enderror" id="kode_transaksi" placeholder="Kode Transaksi" name="kode_transaksi" value="{{ old('kode_transaksi', $transaksi->kode_transaksi ?? '') }}" required readonly>
                                    @error('kode_transaksi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tanggal_transaksi" class="col-sm-2 col-form-label">Tanggal Transaksi</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control @error('tanggal_transaksi') is-invalid @enderror" id="tanggal_transaksi" placeholder="Tanggal Transaksi" name="tanggal_transaksi" value="{{ old('tanggal_transaksi', $transaksi->tanggal_transaksi ?? '') }}" required readonly>
                                    @error('tanggal_transaksi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah" placeholder="Jumlah" name="jumlah" value="{{ old('jumlah', $transaksi->jumlah ?? '') }}" required readonly>
                                    @error('jumlah')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="total_harga" class="col-sm-2 col-form-label">Total Harga</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('total_harga') is-invalid @enderror" id="total_harga" placeholder="Total Harga" name="total_harga" value="{{ old('total_harga', $transaksi->total_harga ?? '') }}" required readonly>
                                    @error('total_harga')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="no_kendaraan" class="col-sm-2 col-form-label">No Kendaraan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('no_kendaraan') is-invalid @enderror" id="no_kendaraan" placeholder="No Kendaraan" name="no_kendaraan" value="{{ old('no_kendaraan', $transaksi->no_kendaraan ?? '') }}" required readonly>
                                    @error('no_kendaraan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-control @error('status') is-invalid @enderror" id="status" required>
                                        <option value="">-- Pilih Status --</option>
                                        <option value="pending" {{ old('status', $transaksi->status ?? '') == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="success" {{ old('status', $transaksi->status ?? '') == 'success' ? 'selected' : '' }}>Success</option>
                                        <option value="failed" {{ old('status', $transaksi->status ?? '') == 'failed' ? 'selected' : '' }}>Failed</option>
                                    </select>
                                    @error('status')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="metode_pembayaran" class="col-sm-2 col-form-label">Metode Pembayaran</label>
                                <div class="col-sm-10">
                                    <select name="metode_pembayaran" class="form-control @error('metode_pembayaran') is-invalid @enderror" id="metode_pembayaran" required>
                                        <option value="">-- Pilih Metode Pembayaran --</option>
                                        <option value="dana" {{ old('metode_pembayaran', $transaksi->metode_pembayaran ?? '') == 'dana' ? 'selected' : '' }}>Dana</option>
                                        <option value="gopay" {{ old('metode_pembayaran', $transaksi->metode_pembayaran ?? '') == 'gopay' ? 'selected' : '' }}>GoPay</option>
                                        <option value="ovo" {{ old('metode_pembayaran', $transaksi->metode_pembayaran ?? '') == 'ovo' ? 'selected' : '' }}>OVO</option>
                                        <option value="shopeepay" {{ old('metode_pembayaran', $transaksi->metode_pembayaran ?? '') == 'shopeepay' ? 'selected' : '' }}>ShopeePay</option>
                                    </select>
                                    @error('metode_pembayaran')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">{{ isset($transaksi) ? 'Update' : 'Add' }} Transaksis</button>
                            <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Back to List</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

