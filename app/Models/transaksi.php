<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'kode_transaksi',
        'tanggal_transaksi',
        'jumlah',
        'total_harga',
        'no_kendaraan',
        'jenis_kendaraan',
        'status',
        'metode_pembayaran',
        'qr_code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
