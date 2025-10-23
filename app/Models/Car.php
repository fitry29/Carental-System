<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand',
        'model',
        'plate_number',
        'year',
        'rental_price',
        'status',
        'image_path',
        'category_id',
    ];

    // Relation: Car belongs to a category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relation: Car has many rentals
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    // Helper: interpret status
    public function getStatusLabelAttribute()
    {
        return match($this->status) {
            0 => 'Available',
            1 => 'Rented',
            2 => 'Maintenance',
            default => 'Unknown',
        };
    }
}
