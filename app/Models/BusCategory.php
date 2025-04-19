<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function buses()
    {
        return $this->hasMany(Bus::class);
    }
}

