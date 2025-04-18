<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    use HasFactory;

    protected $fillable = ['bike_id', 'production_date'];

    public function bike()
    {
        return $this->belongsTo(Bike::class);
    }
}
