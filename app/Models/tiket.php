<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tiket extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_tiket', 
        'masa_berlaku', 
        'nama_pemesan', 
        'jumlah_pengunjung', 
        'jenis_kendaraan', 
        'QR_code'
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
