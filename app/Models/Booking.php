<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;
    // protected $casts = [
    //     'seat_numbers' => 'array',
    // ];
    
    protected $fillable = ['schedule_id', 'user_name', 'user_phone', 'seat_number', 'payment_status'];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function bus()
    {
        return $this->hasOneThrough(Bus::class, Schedule::class, 'id', 'id', 'schedule_id', 'bus_id');
    }
}

