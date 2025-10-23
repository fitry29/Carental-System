<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

     protected $fillable = [
        'user_id',
        'car_id',
        'reserve_date',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
        public function getStatusLabelAttribute()
    {
        return match($this->status) {
            0 => 'Pending',
            1 => 'Approved',
            2 => 'Cancel',
            default => 'Unknown',
        };
    }
}
