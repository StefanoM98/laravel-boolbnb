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
                'description' => 'Sponsorizza il tuo annuncio per 24 ore',
            ],
            [
                'name' => 'Gold',
                'price' => 4.99,
                'duration' => 72,
                'description' => 'Sponsorizza il tuo annuncio per 72 ore',
            ],
            [
                'name' => 'Platinum',
                'price' => 9.99,
                'duration' => 144,
                'description' => 'Sponsorizza il tuo annuncio per 144 ore',
            ],
        ];

        foreach ($sponsors as $sponsor) {
            Sponsor::create($sponsor);
        }
    }
}
