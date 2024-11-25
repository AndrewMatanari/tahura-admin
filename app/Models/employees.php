<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employees extends Model  // Changed 'employees' to 'Employee'
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'name',
        'email',
        'phone',
        'job_title',
        'photo'
    ];
}
