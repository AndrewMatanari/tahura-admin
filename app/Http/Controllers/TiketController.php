<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TiketController extends Controller
{
    public function index()
    {
        $tikets = Tiket::latest()->paginate(10);

        return view('tiket.index', compact('tikets'));
    }

    public function create()
    {
        return view('tiket.create');
    }

 public function store(Request $request)
{
    // Validate incoming request
    $request->validate([
        'kode_tiket' => 'required|string|max:255|unique:tiket',
        'masa_berlaku' => 'required|string',
        'nama_pemesan' => 'required|string',
        'jumlah_pengunjung' => 'required|numeric',
        'jenis_kendaraan' => 'required|string',
        'QR_code' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Collect ticket data
    $data = $request->only('kode_tiket', 'masa_berlaku', 'nama_pemesan', 'jumlah_pengunjung', 'jenis_kendaraan');

    // Handle file upload for QR code
    if ($request->hasFile('QR_code')) {
        $file = $request->file('QR_code');
        $fileName = $file->hashName();
        $data['QR_code'] = $file->storeAs('public/tiket', $fileName);
    }

    // Create the ticket
    $tiket = Tiket::create($data);

    // Now calculate jumlah_bayar based on jumlah_pengunjung and jenis_kendaraan
    $hargaPerPengunjung = 0;
    $biayaKendaraan = 0;

    // Example pricing rules based on jenis_kendaraan
    if ($request->jenis_kendaraan === 'sepeda_motor') {
        $biayaKendaraan = 5000;
        $hargaPerPengunjung = 10000;
    } elseif ($request->jenis_kendaraan === 'mobil') {
        $biayaKendaraan = 10000;
        $hargaPerPengunjung = 20000;
    } elseif ($request->jenis_kendaraan === 'bus') {
        $biayaKendaraan = 50000;
        $hargaPerPengunjung = 30000;
    }

    // Calculate total payment (jumlah_bayar)
    $jumlahBayar = ($request->jumlah_pengunjung * $hargaPerPengunjung) + $biayaKendaraan;

    // Prepare transaction data
    $transaksiData = $request->only('kode_tiket', 'nama_pemesan', 'jumlah_pengunjung', 'jenis_kendaraan', 'metode_pembayaran');
    $transaksiData['tiket_id'] = $tiket->id;
    $transaksiData['jumlah_bayar'] = $jumlahBayar; // Add calculated amount

    // Create the transaction record
    \App\Models\Transaksi::create($transaksiData);

    // Redirect back with success message
    return redirect()->route('tiket.index')->with('success', 'Tiket and Transaksi created successfully.');
}

    public function show(Tiket $tiket)
    {
        return view('tiket.show', compact('tiket'));
    }

    public function edit(Tiket $tiket)
    {
        return view('tiket.edit', compact('tiket'));
    }

    public function update(Request $request, Tiket $tiket)
    {
        $request->validate([
            'kode_tiket' => 'required|string|max:255|unique:tiket,kode_tiket,' . $tiket->id,
            'masa_berlaku' => 'required|string',
            'nama_pemesan' => 'required|string',
            'jumlah_pengunjung' => 'required|numeric',
            'jenis_kendaraan' => 'required|string',
            'QR_code' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only('kode_tiket', 'masa_berlaku', 'nama_pemesan', 'jumlah_pengunjung', 'jenis_kendaraan');

        if ($request->hasFile('QR_code')) {
            if ($tiket->QR_code) {
                Storage::delete('public/' . $tiket->QR_code);
            }
            
            $file = $request->file('QR_code');
            $fileName = $file->hashName();
            $data['QR_code'] = $file->storeAs('public/tiket', $fileName);
        }

        $tiket->update($data);

        return redirect()->route('tiket.index')->with('success', 'Tiket updated successfully.');
    }

    public function destroy(Tiket $tiket)
    {
        if ($tiket->QR_code) {
            Storage::delete('public/' . $tiket->QR_code);
        }

        $tiket->delete();

        return redirect()->route('tiket.index')->with('success', 'Tiket deleted successfully.');
    }
}

