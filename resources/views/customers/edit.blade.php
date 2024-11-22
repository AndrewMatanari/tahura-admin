@extends('layouts.app')

@section('content')
    <h1 class="mb-4">{{ isset($customer) ? 'Edit' : 'Add' }} Customer</h1>

    <form action="{{ isset($customer) ? route('customers.update', $customer->id) : route('customers.store') }}" method="POST">
        @csrf
        @if (isset($customer))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $customer->name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $customer->email ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $customer->phone ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea name="address" id="address" class="form-control" required>{{ old('address', $customer->address ?? '') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">{{ isset($customer) ? 'Update' : 'Add' }} Customer</button>
        <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to List</a>
    </form>
@endsection
