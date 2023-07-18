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
                'description' => 'Get full access to the advanced features of our sponsorship service for just €2.99 for 24 hours!',
            ],
            [
                'name' => 'Gold',
                'price' => 4.99,
                'duration' => 72,
                'description' => 'Get full access to the advanced features of our sponsorship service for just €5.99 for 72 hours!',
            ],
            [
                'name' => 'Platinum',
                'price' => 9.99,
                'duration' => 144,
                'description' => 'Get full access to the advanced features of our sponsorship service for just €9.99 for 144 hours!',
            ],
        ];

        foreach ($sponsors as $sponsor) {
            Sponsor::create($sponsor);
        }
    }
}
