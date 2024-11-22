@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">{{ $customer->name }}'s Details</h1>
    <ul>
        <li><strong>Email:</strong> {{ $customer->email }}</li>
        <li><strong>Phone:</strong> {{ $customer->phone }}</li>
        <li><strong>Address:</strong> {{ $customer->address }}</li>
        @if ($customer->image)
        <li><img src="{{ Storage::url($customer->image) }}" alt="Customer Image" width="100"></li>
        @endif
    </ul>
    <a href="{{ route('customers.index') }}" class="btn btn-primary">Back to List</a>
</div>
@endsection
