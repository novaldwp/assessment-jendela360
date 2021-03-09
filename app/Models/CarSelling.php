<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarSelling extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'car_id'
    ];

    public function cars()
    {
        return $this->belongsTo('App\Models\Car', 'car_id');
    }
}
