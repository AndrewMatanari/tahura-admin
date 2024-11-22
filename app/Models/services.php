<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class services extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'name',
        'employee_id',
        'description',
        'price',
    ];

    public function employee()
    {
        return $this->belongsTo(Employees::class);
    }

    public function pets()
    {
        return $this->belongsTo(Pets::class, 'pet_id');
    }
    
}
