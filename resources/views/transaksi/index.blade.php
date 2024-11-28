@extends('ui.master')
@section('title', 'Transaksi List')

@section('content')
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="mb-4 card-title text-center text-uppercase">Transaksi List</h1>
                    <div class="card-header-action">
                        <a href="{{ route('transaksi.create') }}" class="btn btn-success">Add New Transaksi</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr class="text-center">
                                    <th scope="col" style="width: 5%;">No</th>
                                    <th scope="col"><strong>Name</strong></th>
                                    <th scope="col"><strong>Kode Transaksi</strong></th>
                                    <th scope="col"><strong>Tanggal Transaksi</strong></th>
                                    <th scope="col"><strong>Jumlah</strong></th>
                                    <th scope="col"><strong>Total Harga</strong></th>
                                    <th scope="col"><strong>No Kendaraan</strong></th>
                                    <th scope="col"><strong>Jenis Kendaraaan</strong></th>
                                    <th scope="col"><strong>Status</strong></th>
                                    <th scope="col"><strong>Metode Pembayaran</strong></th>
                                    <th scope="col" style="width: 15%"><strong>Actions</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksis as $transaksi)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ optional($transaksi->user)->name }}</td>
                                        <td>{{ $transaksi->kode_transaksi }}</td>
                                        <td>{{ $transaksi->tanggal_transaksi }}</td>
                                        <td>{{ $transaksi->jumlah }}</td>
                                        <td>{{ $transaksi->total_harga }}</td>
                                        <td>{{ $transaksi->no_kendaraan }}</td>
                                        <td>{{ $transaksi->jenis_kendaraan }}</td>
                                        <td>{{ $transaksi->status }}</td>
                                        <td>{{ $transaksi->metode_pembayaran }}</td>
                                        <td>
                                            <div class="btn-group d-flex justify-content-center" role="group">
                                                <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-sm btn-outline-success mx-1">Edit</a>
                                                <a href="{{ route('transaksi.show', $transaksi->id) }}" class="btn btn-sm btn-outline-info mx-1">Detail</a>
                                                <form action="{{ route('transaksi.destroy', $transaksi->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger mx-1">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-3">
        {{ $transaksis->links() }}
    </div>
@endsection

