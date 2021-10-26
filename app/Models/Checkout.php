<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;
    protected $fillable = [
        'belanja_id', 'va_number', 'bank', 'total_harga', 'status', 'deadline', 'kurir', 'resi'
    ];
}
