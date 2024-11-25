@extends('ui.master')
@section('title', 'Tambah Customer')
@section('content')
<h1 class="mb-4">Tambah Customer</h1>

<form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="name">Nama</label>
        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>

    <div class="form-group">
        <label for="phone">Telepon</label>
        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
    </div>

    <div class="form-group">
        <label for="address">Alamat</label>
        <textarea name="address" class="form-control" required>{{ old('address') }}</textarea>
    </div>

    <div class="form-group">
        <label for="image">Foto Profil</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary mt-3 mb-3">Tambah Data</button>
</form>
@endsection

