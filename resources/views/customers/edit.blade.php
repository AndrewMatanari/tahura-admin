@extends('ui.master')
@section('title', isset($customer) ? 'Edit' : 'Add' . ' Customer')
@section('content')
    <section class="section">
        <div class="row" id="basic-table">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ isset($customer) ? 'Edit' : 'Add' }} Customer</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ isset($customer) ? route('customers.update', $customer->id) : route('customers.store') }}" method="POST" enctype="multipart/form-data" class="form form-horizontal">
                            @csrf
                            @if (isset($customer))
                                @method('PUT')
                            @endif

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Name" name="name" value="{{ old('name', $customer->name ?? '') }}" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Email" name="email" value="{{ old('email', $customer->email ?? '') }}" required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="Phone" name="phone" value="{{ old('phone', $customer->phone ?? '') }}" required>
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address" required>{{ old('address', $customer->address ?? '') }}</textarea>
                                    @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="photo" class="col-sm-2 col-form-label">Photo</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" id="photo">
                                    @if (isset($customer) && $customer->photo)
                                    <img src="{{ $customer->photo }}" alt="Customer Image" class="rounded-circle mt-3" style="width: 50px; height: 50px;">
                                    @endif
                                    @error('photo')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">{{ isset($customer) ? 'Update' : 'Add' }} Customer</button>
                            <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to List</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection