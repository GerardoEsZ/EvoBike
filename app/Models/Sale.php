<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'bike_id', 'total_price', 'store', 'driver_name'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function bike()
    {
        return $this->belongsTo(Bike::class);
    }
}
