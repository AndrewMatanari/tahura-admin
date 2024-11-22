<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    // Menampilkan daftar customer
    public function index()
    {
        $customers = Customer::paginate(10); // Menampilkan 10 data per halaman
        return view('customers.index', compact('customers'));
    }

    // Menampilkan form untuk menambah customer baru
    public function create()
    {
        return view('customers.create');
    }

    // Menyimpan data customer baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $customer = new Customer($request->except('image'));

        if ($request->hasFile('image')) {
            $customer->image = $request->file('image')->store('customers', 'public');
        }

        $customer->save();

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    // Menampilkan form untuk mengedit customer
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    // Memperbarui data customer
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $customer->fill($request->except('image'));

        if ($request->hasFile('image')) {
            if ($customer->image) {
                // Hapus gambar lama jika ada
                Storage::delete('public/' . $customer->image);
            }
            $customer->image = $request->file('image')->store('customers', 'public');
        }

        $customer->save();

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    // Menghapus data customer
    public function destroy(Customer $customer)
    {
        if ($customer->image) {
            Storage::delete('public/' . $customer->image);
        }
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}

