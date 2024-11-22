<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pets extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'name',
        'breed',
        'age',
        'gender',
        'weight',
        'image',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservations::class);
    }



}
