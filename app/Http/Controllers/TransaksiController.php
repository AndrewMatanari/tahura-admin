<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaksi;
use App\Models\User;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class TransaksiController extends Controller
{
    // API FUNCTION
    public function GetTransaksi()
    {
        $transaksi = Transaksi::orderBy("id", "desc")->paginate(10);
        return response()->json($transaksi);
    }

    public function AddTransaksi(Request $request)
    {
        $transaksi = Transaksi::create($request->all());
        return response()->json($transaksi);
    }

    public function EditTransaksi(Request $request)
    {
        $transaksi = Transaksi::findOrFail($request->id);
        $transaksi->update($request->all());
        return response()->json($transaksi);
    }

    // Display a listing of the resource
    public function index()
    {
        // Mendapatkan daftar transaksi yang terurut berdasarkan tanggal terbaru
        $transaksis = Transaksi::latest()->paginate(10);
        return view('transaksi.index', compact('transaksis'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        // Mengambil semua data user untuk dropdown pada form
        $users = User::all('id', 'name');
        return view('transaksi.create', compact('users'));
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'kode_transaksi' => 'required|string|max:255',
            'tanggal_transaksi' => 'required|date',
            'jumlah' => 'required|numeric',
            'total_harga' => 'required|numeric',
            'no_kendaraan' => 'required|string|max:255',
            'jenis_kendaraan' => 'required|string',
            'status' => 'required|string',
            'metode_pembayaran' => 'required|string',
        ]);

        // Store the transaction data
        $transaksi = Transaksi::create([
            'user_id' => $request->user_id,
            'kode_transaksi' => $request->kode_transaksi,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'jumlah' => $request->jumlah,
            'no_kendaraan' => $request->no_kendaraan,
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'status' => $request->status,
            'metode_pembayaran' => $request->metode_pembayaran,
            'total_harga' => $request->total_harga,
        ]);

        // Generate the QR code for the transaction (using kode_transaksi)
        $qrCode = new QrCode($transaksi->kode_transaksi);
        $writer = new PngWriter();

        // Store the generated QR code in the correct path
        $fileName = 'qr_codes/' . $transaksi->kode_transaksi . '.png'; // No need for 'storage/' in the path
        $filePath = public_path('storage/' . $fileName); // Correct path to storage/qr_codes folder

        // Check if directory exists, if not create it
        if (!is_dir(public_path('storage/qr_codes'))) {
            mkdir(public_path('storage/qr_codes'), 0775, true); // Create directory with proper permissions
        }

        // Write the QR code to file
        $writer->writeFile($qrCode, $filePath);

        // Store the QR code file path in the database
        $transaksi->qr_code = $fileName;
        $transaksi->save();

        // Redirect or return a response
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dan QR code telah dibuat!');
    }

    // Display the specified resource
    public function show()
    {
        $transaksi = Transaksi::all();
        return view('transaksi.show', compact('transaksi'));
    }

    // Show the form for editing the specified resource
    public function edit(Transaksi $transaksi)
    {
        // Ambil data user untuk dropdown dan kirimkan bersama data transaksi
        $users = User::all('id', 'name');
        return view('transaksi.edit', compact('transaksi', 'users'));
    }

    // Update the specified resource in storage
    public function update(Request $request, Transaksi $transaksi)
    {
        // Validasi input
        $request->validate([
            'user_id' => 'required|exists:users,id',  // Pastikan user_id valid
            'kode_transaksi' => 'required|string|max:255',
            'tanggal_transaksi' => 'required|date',
            'jumlah' => 'required|numeric',
            'total_harga' => 'required|numeric',
            'no_kendaraan' => 'required|string|max:255',
            'jenis_kendaraan' => 'required|string',
            'status' => 'required|string',
            'metode_pembayaran' => 'required|string',
        ]);

        // Update transaksi
        $transaksi->update([
            'user_id' => $request->user_id,
            'kode_transaksi' => $request->kode_transaksi,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'jumlah' => $request->jumlah,
            'total_harga' => $request->total_harga,
            'no_kendaraan' => $request->no_kendaraan,
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'status' => $request->status,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy(Transaksi $transaksi)
    {
        // Hapus transaksi
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi deleted successfully.');
    }
}

