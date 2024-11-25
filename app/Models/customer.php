<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'photo',
    ];

    public function pets()
    {
        return $this->hasMany(Pets::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservations::class);
    }
    
    public function getPhotoAttribute($value)
    {
        return url('storage/' . $value);
    }
}

