<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairPart extends Model
{
    use HasFactory;

    protected $fillable = ['repair_id', 'part_id', 'quantity'];

    public function repair()
    {
        return $this->belongsTo(Repair::class);
    }

    public function part()
    {
        return $this->belongsTo(Part::class);
    }
}
