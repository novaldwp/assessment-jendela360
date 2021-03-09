<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'stock'
    ];

    public function carsellings()
    {
        return $this->hasMany('App\Models\CarSelling', 'car_id');
    }
}
