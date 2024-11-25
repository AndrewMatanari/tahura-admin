@extends('ui.master')
@section('title', 'Tambah Customer')
@section('content')
<h1 class="mb-4">Tambah Customer</h1>

<form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group has-icon-left">
        <div class="position-relative">
            <input type="text" name="name" class="form-control" placeholder="Nama" value="{{ old('name') }}" required>
            <div class="form-control-icon">
                <i class="bi bi-person"></i>
            </div>
        </div>
    </div>

    <div class="form-group has-icon-left">
        <div class="position-relative">
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
            <div class="form-control-icon">
                <i class="bi bi-envelope"></i>
            </div>
        </div>
    </div>

    <div class="form-group has-icon-left">
        <div class="position-relative">
            <input type="text" name="phone" class="form-control" placeholder="Telepon" value="{{ old('phone') }}" required>
            <div class="form-control-icon">
                <i class="bi bi-phone"></i>
            </div>
        </div>
    </div>

    <div class="form-group has-icon-left">
        <div class="position-relative">
            <textarea name="address" class="form-control" placeholder="Alamat" required>{{ old('address') }}</textarea>
            <div class="form-control-icon">
                <i class="bi bi-geo-alt"></i>
            </div>
        </div>
    </div>

    <div class="form-group has-icon-left">
        <div class="position-relative">
            <input type="file" name="image" class="form-control">
            <div class="form-control-icon">
                <i class="bi bi-image"></i>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3 mb-3">Tambah Data</button>
</form>
@endsection

