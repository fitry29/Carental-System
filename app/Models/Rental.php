<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'user_id',
        'rental_date',
        'return_date',
        'total_price',
        'status',
    ];

    // Relation: rental belongs to a car
    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    // Relation: rental belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Accessor untuk status label
    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            0 => 'Pending',
            1 => 'Approved',
            2 => 'Active',
            3 => 'Completed',
            4 => 'Cancelled',
            default => 'Unknown',
        };
    }
}
