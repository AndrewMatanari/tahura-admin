@extends('ui.master')
@section('title', 'Edit User')
@section('content')
<section class="section">
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit User</h4>
                </div>
                <div class="card-body">
                <form action="{{ route('user.update', $user->id) }}" method="POST" class="form form-horizontal" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-body">
        <!-- Name Field -->
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Field -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Photo Field -->
        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" accept="image/*">
            @error('photo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @if ($user->photo)
                <div class="mt-2">
                <img src="{{ $user->photo }}" alt="User Image" class="rounded-circle mt-3" style="width: 50px; height: 50px;">
                </div>
            @endif
        </div>

        <!-- Role Field -->
        <div class="form-group">
            <label for="role">Role</label>
            <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="employee" {{ old('role', $user->role) == 'employee' ? 'selected' : '' }}>Employee</option>
                <option value="customer" {{ old('role', $user->role) == 'customer' ? 'selected' : '' }}>Customer</option>
            </select>
            @error('role')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection

