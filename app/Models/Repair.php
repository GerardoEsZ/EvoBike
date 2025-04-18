<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    use HasFactory;

    protected $fillable = ['bike_id', 'description'];

    public function bike()
    {
        return $this->belongsTo(Bike::class);
    }

    public function parts()
    {
        return $this->belongsToMany(Part::class, 'repair_parts');
    }
}
