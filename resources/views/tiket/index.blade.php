@extends('ui.master')
@section('title', 'Data Tiket')
@section('content')
<section class="section">
    <div class="row" id="basic-table">
        <div class="card shadow-sm">
            <div class="card-header">
                <h1 class="mb-4 card-title text-center text-uppercase">Data Tiket</h1>
                <div class="card-header-action">
                    <a href="{{ route('tiket.create') }}" class="btn btn-success">Tambah Tiket</a>
                </div>
            </div>

            <div class="card-body">
                <!-- Pesan Sukses -->
                @if(session('success'))
                    <div id="success-message" class="alert alert-success alert-dismissible fade show" role="alert" style="display: block;">
                        <i class="bi bi-check-circle me-2"></i>
                        <strong>Berhasil!</strong> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <script>
                        setTimeout(() => {
                            document.getElementById('success-message').style.display = 'none';
                        }, 3000);
                    </script>
                @endif

                <!-- Table with outer spacing -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr style="text-align: center;">
                                <th scope="col">No</th>
                                <th scope="col"><strong>Kode Tiket</strong></th>
                                <th scope="col"><strong>Masa Berlaku</strong></th>
                                <th scope="col"><strong>QR Code</strong></th>
                                <th scope="col"><strong>Nama Pemesan</strong></th>
                                <th scope="col"><strong>Jumlah Pengunjung</strong></th>
                                <th scope="col"><strong>Jenis Kendaraan</strong></th>
                                <th scope="col" style="width: 15%"><strong>Photo</strong></th>
                                <th scope="col" class="text-center" style="width: 15%"><strong>Aksi</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tikets as $tiket)
                                <tr style="text-align: center;">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $tiket->kode_tiket }}</td>
                                    <td>{{ $tiket->masa_berlaku }}</td>
                                    <td>{{ $tiket->QR_code }}</td>
                                    <td>{{ $tiket->nama_pemesan }}</td>
                                    <td>{{ $tiket->jumlah_pengunjung }}</td>
                                    <td>{{ $tiket->jenis_kendaraan }}</td>
                                    <td>
                                        <img src="{{ $tiket->QR_code ? url('storage/' . $tiket->QR_code) : url('images/default-photo.jpg') }}"
                                             alt="QR Code"
                                             class="rounded-circle"
                                             style="width: 50px; height: 50px;">
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('tiket.edit', $tiket->id) }}" class="btn btn-sm btn-outline-success mx-1">Edit</a>
                                            <a href="{{ route('tiket.show', $tiket->id) }}" class="btn btn-sm btn-outline-info mx-1">Detail</a>
                                            
                                            <!-- Form Hapus Tiket -->
                                            <form action="{{ route('tiket.destroy', $tiket->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger mx-1" onclick="return confirm('Apakah Anda yakin ingin menghapus tiket ini?')">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data tiket.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

