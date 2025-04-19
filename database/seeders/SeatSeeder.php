<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seat;
use App\Models\Bus;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // You can loop through all buses or a specific one
        $buses = Bus::all(); // Seed seats for all existing buses

        foreach ($buses as $bus) {
            for ($i = 1; $i <= 45; $i++) {
                Seat::create([
                    'bus_id' => $bus->id,
                    'seat_number' => $i,
                    'status' => 'empty',
                    'row' => ceil($i / 4),       // Optional: row number (e.g. 1 to 12)
                    'column' => (($i - 1) % 4) + 1 // Optional: column (1 to 4)
                ]);
            }
        }
    }
}
