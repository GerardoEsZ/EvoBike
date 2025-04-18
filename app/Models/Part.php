<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'stock', 'min_stock'];

    public function repairs()
    {
        return $this->belongsToMany(Repair::class, 'repair_parts');
    }
}
