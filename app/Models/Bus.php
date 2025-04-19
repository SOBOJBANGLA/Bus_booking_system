<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bus extends Model
{
    use HasFactory;

    protected $fillable = [
        'bus_name',
        'bus_number',
        'driver_phone',
        'bus_category_id',
        'destination_id',
    ];

    public function category() {
        return $this->belongsTo(BusCategory::class, 'bus_category_id');
    }

    public function destination() {
        return $this->belongsTo(Destination::class);
    }

    public function schedules() {
        return $this->hasMany(Schedule::class);
    }

    public function ticketPrice() {
        return $this->hasOne(TicketPrice::class);
    }

    public function seats() {
        return $this->hasMany(Seat::class);
    }

    public function generateSeats($total = 40)
{
    for ($i = 1; $i <= $total; $i++) {
        Seat::firstOrCreate([
            'bus_id' => $this->id,
            'seat_number' => $i
        ], [
            'status' => 'empty'
        ]);
    }
}
}
