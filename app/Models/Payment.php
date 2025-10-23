<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'rental_id',
        'amount',
        'method',
        'payment_date',
        'status',
    ];

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }

    // Accessor untuk status label
    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            0 => 'Pending',
            1 => 'Paid',
            2 => 'Failed',
            default => 'Unknown',
        };
    }
    public function getMethodLabelAttribute()
    {
        return match((int)$this->method) {
            0 => 'Cash',
            1 => 'Online Banking',
            default => 'Unknown',
        };
    }
}
