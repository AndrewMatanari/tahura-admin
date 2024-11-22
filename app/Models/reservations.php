<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservations extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'pet_id',
        'service_id',
        'employee_id',
        'reservation_date',
        'pickup_date',
        'amount',
        'notes',
    ];


    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function pet()
    {
        return $this->belongsTo(Pets::class);
    }

    public function service()
    {
        return $this->belongsTo(Services::class, 'service_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employees::class, 'employee_id');
    }

}
