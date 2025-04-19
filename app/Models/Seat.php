<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Seat extends Model
{
    use HasFactory;

    protected $fillable = ['bus_id', 'seat_number', 'status', 'row', 'column'];

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }
}
