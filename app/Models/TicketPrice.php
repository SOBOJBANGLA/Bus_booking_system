<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketPrice extends Model
{
    use HasFactory;

    protected $fillable = ['bus_id', 'destination_id', 'price', 'vat_percentage', 'total_price'];


    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
}

