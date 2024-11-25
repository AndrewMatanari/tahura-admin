@extends('ui.master')
@section('title', 'Detail Karyawan')
@section('content')
<section class="section d-flex justify-content-center align-items-center min-vh-100">
    <div class="row w-100 justify-content-center">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-center">
                    <h4 class="card-title text-white">Employee Details</h4>
                </div>
                <div class="card-body p-4">
                    <!-- Employee Photo -->
                    <div class="text-center mb-4 mt-4">
                        @if ($employees->photo)
                        <img src="{{ url('storage/' . $employees->photo) }}" alt="Employee Image" class="rounded-circle img-thumbnail" style="width: 200px; height: 200px;">
                        @else
                            <img src="https://via.placeholder.com/150" alt="Employee Photo" class="img-fluid rounded-circle img-thumbnail" style="width: 150px; height: 150px; object-fit: cover;">
                        @endif
                    </div>

                    <div class="row">
                        <!-- Employee Details -->
                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <h5 class="font-weight-bold">Name</h5>
                                <p class="text-muted">{{ $employees->name }}</p>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <h5 class="font-weight-bold">Email</h5>
                                <p class="text-muted">{{ $employees->email }}</p>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <div class="form-group">
                                <h5 class="font-weight-bold">Job Title</h5>
                                <p class="text-muted">{{ ucfirst($employees->JobTitle) }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Employee Update and Delete Buttons -->
                    <div class="text-center mt-4">
                        <a href="{{ route('employees.edit', $employees->id) }}" class="btn btn-warning text-white">Edit Employee</a>
                        <form action="{{ route('employees.destroy', $employees->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?')">Delete Employee</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

