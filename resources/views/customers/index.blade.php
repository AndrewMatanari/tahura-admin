@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Customer List</h1>

    <a href="{{ route('customers.create') }}" class="btn btn-success mb-3">Add New Customer</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>
                        @if ($customer->image)
                            <img src="{{ asset('storage/' . $customer->image) }}" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover;">
                        @else
                            <img src="{{ asset('images/default-avatar.jpg') }}" class="img-fluid" style="width: 50px; height: 50px; object-fit: cover;">
                        @endif
                    </td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->address }}</td>
                    <td class="text-center">
                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $customers->links() }}
    </div>
@endsection
