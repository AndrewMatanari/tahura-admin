<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{

    public function index()
    {
        $customers = transaksi::paginate(10); // Menampilkan 10 data per halaman
        return view('transaksi.index', compact('customers'));
    }

    public function create()
    {
        return view('transaksi.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'address' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // Validasi file gambar
        ]);

        // Menyiapkan data customer yang akan disimpan
        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ];

        // Jika ada file foto, simpan gambar dan path-nya
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = $file->hashName();
            $filePath = $file->storeAs('public', $fileName);
            $data['photo'] = $filePath;
        }

        // Membuat customer baru
        transaksi::create($data);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi created successfully.');
    }


    public function show(transaksi $customer)
    {
        return view('transaksi.show', compact('customer'));
    }


    public function edit(transaksi $customer)
    {
        return view('transaksi.edit', compact('customer'));
    }


    public function update(Request $request, transaksi $customer)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric',
            'address' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // Validasi file gambar
        ]);

        // Menyiapkan data customer yang akan disimpan
        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
        ];

        // Jika ada file foto, simpan gambar dan path-nya
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($customer->photo) {
                Storage::delete('public/' . $customer->photo);
            }

            $file = $request->file('photo');
            $fileName = $file->hashName();
            $filePath = $file->storeAs('public', $fileName);
            $data['photo'] = $filePath;
        }

        // Update customer yang sudah ada
        $customer->update($data);

        return redirect()->route('transaksi.index')->with('success', 'Customer updated successfully.');
    }

  
    public function destroy(transaksi $customer)
    {
        if ($customer->photo) {
            Storage::delete('public/' . $customer->photo);
        }

        $customer->delete();

        return redirect()->route('transaksi.index')->with('success', 'Customer deleted successfully.');
    }
}

