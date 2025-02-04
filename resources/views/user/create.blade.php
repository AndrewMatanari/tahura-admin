@extends('ui.master')
@section('title', 'Tambah Pengguna')
@section('content')
<section id="basic-horizontal-layouts">
    <div class="row match-height">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah Pengguna</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('user.store') }}" method="POST" class="form form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="text" class="form-control" placeholder="Name"
                                                    name="name" value="{{ old('name') }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                            </div>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="email" class="form-control" placeholder="Email"
                                                    name="email" value="{{ old('email') }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-envelope"></i>
                                                </div>
                                            </div>
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="number" class="form-control" placeholder="Mobile"
                                                    name="mobile" value="{{ old('mobile') }}">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-phone"></i>
                                                </div>
                                            </div>
                                            @error('mobile')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="password" class="form-control" placeholder="Password"
                                                    name="password">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-lock"></i>
                                                </div>
                                            </div>
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group has-icon-left">
                                            <div class="position-relative">
                                                <input type="password" class="form-control" placeholder="Confirm Password"
                                                    name="password_confirmation">
                                                <div class="form-control-icon">
                                                    <i class="bi bi-lock"></i>
                                                </div>
                                            </div>
                                            @error('password_confirmation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group has-icon-left">
                                            <select name="role" id="role" class="form-control">
                                                <option value="">Select Role</option>
                                                <option value="admin">Admin</option>
                                                <option value="customer">Customer</option>
                                                <option value="employee">Employee</option>
                                            </select>
                                            @error('role')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" id="photo">
                                            @error('photo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

