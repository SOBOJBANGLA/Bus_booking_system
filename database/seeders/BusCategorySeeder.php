<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BusCategory;

class BusCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Sleeper Bus',
            'Semi-Sleeper Bus',
            'Seater Bus',
            'Luxury Bus',
            'Volvo Bus / Scania / Mercedes',
            'Mini Bus',
            'Local / Ordinary Bus',
            'Express Bus',
            'Deluxe Bus',
            'AC Sleeper Bus',
        ];

        foreach ($categories as $category) {
            BusCategory::create(['name' => $category]);
        }
    }
}
