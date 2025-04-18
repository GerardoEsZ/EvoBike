<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    use HasFactory;

    protected $fillable = ['model', 'color', 'voltage', 'chassis_number', 'has_factory_failure'];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function failures()
    {
        return $this->hasMany(Failure::class);
    }

    public function productions()
    {
        return $this->hasMany(Production::class);
    }

    public function repairs()
    {
        return $this->hasMany(Repair::class);
    }
}
