<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeesController extends Controller
{

    public function index()
    {
        $employees = Employees::paginate(10);
        return view('employees.index', compact('employees'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'nip' => 'required|string|max:255|unique:employees',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees',
            'phone' => 'required|numeric',
            'jobTitle' => 'required|string|max:255|in:employee', // Assuming 'employee' is a fixed value
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Prepare data for storing
        $data = [
            'nip' => $request->nip,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'jobTitle' => 'employee', // Assign the jobTitle value to 'employee'
        ];

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = $file->hashName(); // Use a hashed file name for security
            $filePath = $file->storeAs('public/employees', $fileName); // Store the photo in 'public/employees'
            $data['photo'] = $filePath;
        }

        // Create the employee record in the database
        Employees::create($data);

        // Redirect back to the employee list with success message
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function show(Employees $employees)
    {
        return view('employees.show', compact('employees'));
    }

    public function edit(Employees $employees)
    {
        return view('employees.edit', compact('employees'));
    }

    public function update(Request $request, Employees $employees)
    {
        // Validate the incoming request
        $request->validate([
            'nip' => 'required|string|max:255|unique:employees,nip,',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employees,email,' . $employees->id,
            'phone' => 'required|numeric',
            'jobTitle' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Prepare data for updating
        $data = [
            'nip' => $request->nip,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'jobTitle' => $request->jobTitle,
        ];

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete the old photo if exists
            if ($employees->photo) {
                Storage::delete('public/' . $employees->photo);
            }

            $file = $request->file('photo');
            $fileName = $file->hashName();
            $filePath = $file->storeAs('public/employees', $fileName); // Save to public/employees
            $data['photo'] = $filePath;
        }

        // Update the employee record in the database
        $employees->update($data);

        // Redirect back with success message
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employees $employee)
    {
        // Delete the photo if exists
        if ($employee->photo) {
            Storage::delete('public/' . $employee->photo);
        }

        // Delete the employee record from the database
        $employee->delete();

        // Redirect back with success message
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
