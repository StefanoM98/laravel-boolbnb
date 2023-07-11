<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sponsors = [
            [
                'name' => 'Bronze',
                'price' => 2.99,
                'duration' => 24,
                'description' => 'Sponsor your advertisement for 24 hours',
            ],
            [
                'name' => 'Gold',
                'price' => 4.99,
                'duration' => 72,
                'description' => 'Sponsor your advertisement for 72 hours',
            ],
            [
                'name' => 'Platinum',
                'price' => 9.99,
                'duration' => 144,
                'description' => 'Sponsor your advertisement for 144 hours',
            ],
        ];

        foreach ($sponsors as $sponsor) {
            Sponsor::create($sponsor);
        }
    }
}
