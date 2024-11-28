<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{

    public function index()
    {
        $produks     = produk::paginate(10);
        return view('produks.index', compact('produks'));
    }

    public function create()
    {
        return view('produks.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'nama_produk' => 'required|string|max:255|unique:produk',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'alamat' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Prepare data for storing
        $data = [
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'alamat' => $request->alamat,
        ];

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = $file->hashName(); // Use a hashed file name for security
            $filePath = $file->storeAs('public/produk', $fileName); // Store the photo in 'public/produk'
            $data['photo'] = $filePath;
        }

        // Create the produk record in the database
        produk::create($data);

        // Redirect back to the produk list with success message
        return redirect()->route('produks.index')->with('success', 'Produk created successfully.');
    }

    public function show(produk $produk)
    {
        return view('produks.show', compact('produks'));
    }

    public function edit(produk $produk)
    {
        return view('produks.edit', compact('produks'));
    }

    public function update(Request $request, produk $produk)
    {
        // Validate the incoming request
        $request->validate([
            'nama_produk' => 'required|string|max:255|unique:produk,nama_produk,' . $produk->id,
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'alamat' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Prepare data for updating
        $data = [
            'nama_produk' => $request->nama_produk,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'alamat' => $request->alamat,
        ];

        // Handle photo upload
        if ($request->hasFile('photo')) {
            // Delete the old photo if exists
            if ($produk->photo) {
                Storage::delete('public/' . $produk->photo);
            }

            $file = $request->file('photo');
            $fileName = $file->hashName();
            $filePath = $file->storeAs('public/produk', $fileName); // Save to public/produk
            $data['photo'] = $filePath;
        }

        // Update the produk record in the database
        $produk->update($data);

        // Redirect back with success message
        return redirect()->route('produk.index')->with('success', 'Produk updated successfully.');
    }

    public function destroy(produk $produk)
    {
        // Delete the photo if exists
        if ($produk->photo) {
            Storage::delete('public/' . $produk->photo);
        }

        // Delete the produk record from the database
        $produk->delete();

        // Redirect back with success message
        return redirect()->route('produk.index')->with('success', 'Produk deleted successfully.');
    }
}

