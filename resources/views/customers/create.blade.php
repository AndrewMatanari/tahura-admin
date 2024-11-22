@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Edit Customer</h1>

    <form action="{{ route('customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $customer->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $customer->email) }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $customer->phone) }}" required>
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <textarea name="address" class="form-control" required>{{ old('address', $customer->address) }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Profile Image</label>
            <input type="file" name="image" class="form-control">
            @if ($customer->image)
                <img src="{{ asset('storage/' . $customer->image) }}" class="img-fluid mt-2" style="width: 100px; height: 100px; object-fit: cover;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
    </form>
@endsection
