@extends('ui.master')
@section('title', 'Data User')
@section('content')
<section class="section">
    <div class="row" id="basic-table">
        <div class="card shadow-sm">
            <div class="card-header">
                <h1 class="mb-4 card-title text-center text-uppercase">Data User</h1>
                <div class="card-header-action">
                    <a href="{{ route('user.create') }}" class="btn btn-success">Tambah User</a>
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
                                <th scope="col" style="width: 5%;">No</th>
                                <th scope="col" ><strong>Nama</strong></th>
                                <th scope="col"><strong>Email</strong></th>
                                <th scope="col"><strong> Photo </strong></th>
                                <th scope="col"><strong>Role</strong></th>
                                <th scope="col" class="text-center" style="width: 15%"><strong>Aksi</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td style="text-align: center;">{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td style="text-align: center;">
                                        @if ($user->photo)
                                            <img src="{{ $user->photo }}" alt="User Image" class="rounded-circle" style="width: 50px; height: 50px;">
                                        @else
                                            <span>No Image</span>
                                        @endif
                                    </td>
                                    <td style="text-align: center;">{{ $user->role }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-outline-success mx-1">Edit</a>
                                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-sm btn-outline-info mx-1">Detail</a>
                                            
                                            <!-- Form Hapus User -->
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger mx-1" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Tidak ada data user.</td>
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

