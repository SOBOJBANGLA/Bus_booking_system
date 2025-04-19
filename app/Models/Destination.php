<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = ['from', 'to'];

    public function buses()
    {
        return $this->hasMany(Bus::class);
    }

    public function ticketPrice()
{
    return $this->hasOne(TicketPrice::class);
}
}

