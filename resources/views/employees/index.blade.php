@extends('ui.master')
@section('title', 'Data Karyawan')
@section('content')
<section class="section">
    <div class="row" id="basic-table">
        <div class="card shadow-sm">
            <div class="card-header">
                <h1 class="mb-4 card-title text-center text-uppercase">Data Karyawan</h1>
                <div class="card-header-action">
                    <a href="{{ route('employees.create') }}" class="btn btn-success">Tambah Karyawan</a>
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
                                <th scope="col"><strong>NIP</strong></th>
                                <th scope="col"><strong>Nama</strong></th>
                                <th scope="col"><strong>Email</strong></th>
                                <th scope="col"><strong>Phone</strong></th>
                                <th scope="col"><strong>Job Title</strong></th> <!-- Corrected column name here -->
                                <th scope="col" style="width: 15%"><strong>Photo</strong></th>
                                <th scope="col" class="text-center" style="width: 15%"><strong>Aksi</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($employees as $employee)
                                <tr style="text-align: center;">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $employee->nip }}</td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>{{ $employee->JobTitle ?? 'N/A' }}</td>
                                    <td>
                                        <img src="{{ $employee->photo ? url('storage/' . $employee->photo) : url('images/default-photo.jpg') }}" 
                                             alt="Photo Karyawan" 
                                             class="rounded-circle" 
                                             style="width: 50px; height: 50px;">
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-outline-success mx-1">Edit</a>
                                            <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-sm btn-outline-info mx-1">Detail</a>
                                            
                                            <!-- Form Hapus User -->
                                            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger mx-1" onclick="return confirm('Apakah Anda yakin ingin menghapus karyawan ini?')">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data karyawan.</td>
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
