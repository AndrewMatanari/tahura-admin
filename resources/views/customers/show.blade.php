@extends('ui.master')
@section('title', 'Detail Customer')
@section('content')
<section class="section d-flex justify-content-center align-items-center min-vh-100">
    <div class="row w-100 justify-content-center">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-center">
                    <h4 class="card-title text-white">Customer Details</h4>
                </div>
                <div class="card-body p-4">
                    <!-- Customer Photo -->
                    <div class="text-center mb-4 mt-4">
                        @if ($customer->photo)
                        <img src="{{ $customer->photo }}" alt="Customer Image" class="rounded-circle img-thumbnail" style="width: 200px; height: 200px;">
                        @else
                            <img src="https://via.placeholder.com/150" alt="Customer Photo" class="img-fluid rounded-circle img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                        @endif
                    </div>

                    <div class="row">
                        <!-- Customer Details -->
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <h5 class="font-weight-bold">Name</h5>
                                <p class="text-muted">{{ $customer->name }}</p>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <h5 class="font-weight-bold">Email</h5>
                                <p class="text-muted">{{ $customer->email }}</p>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <h5 class="font-weight-bold">Phone</h5>
                                <p class="text-muted">{{ $customer->phone }}</p>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <h5 class="font-weight-bold">Address</h5>
                                <p class="text-muted">{{ $customer->address }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Customer Update and Delete Buttons -->
                    <div class="text-center mt-4">
                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning text-white">Edit Customer</a>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this customer?')">Delete Customer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

