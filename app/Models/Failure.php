<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Failure extends Model
{
    use HasFactory;

    protected $fillable = ['bike_id', 'observation'];

    public function bike()
    {
        return $this->belongsTo(Bike::class);
    }
}
