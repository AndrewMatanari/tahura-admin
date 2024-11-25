@extends('ui.master')
@section('title', 'Customer List')
@section('content')
    <div class="row" id="basic-table">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h1 class="mb-4 card-title text-center text-uppercase">Customer List</h1>
                    <div class="card-header-action">
                        <a href="{{ route('customers.create') }}" class="btn btn-success">Add New Customer</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr style="text-align: center;">
                                    <th scope="col" style="width: 5%;">No</th>
                                    <th scope="col"><strong>Name</strong></th>
                                    <th scope="col"><strong>Email</strong></th>
                                    <th scope="col"><strong>Phone</strong></th>
                                    <th scope="col"><strong>Address</strong></th>
                                    <th scope="col"><strong>Photo</strong></th>
                                    <th scope="col" class="text-center" style="width: 15%"><strong>Actions</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                    <tr>
                                        <td style="text-align: center;">{{ $loop->iteration }}</td>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td style="text-align: center;">
                                            @if ($customer->photo)
                                                <img src="{{ $customer->photo }}" alt="Customer Image" class="rounded-circle" style="width: 50px; height: 50px;">
                                            @else
                                                <span>No Image</span>
                                            @endif
                                        </td>
                                        <td style="text-align: center;">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-outline-success mx-1">Edit</a>
                                                <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-sm btn-outline-info mx-1">Detail</a>
                                                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger mx-1" onclick="return confirm('Apakah Anda yakin ingin menghapus customer ini?')">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $customers->links() }}
    </div>
@endsection


