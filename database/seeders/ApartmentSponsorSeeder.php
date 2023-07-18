<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\ApartmentSponsor;
use App\Models\Sponsor;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Faker\Generator as Faker;

class ApartmentSponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $sponsors = Sponsor::all();
        $startDate = now();
        $endDate = now()->addHours($sponsors['2']->duration);
        $apartments_sponsored = [
            [
                "apartment_id" => "1",
                "sponsor_id" => "2",
                "start_date" => $startDate,
                "end_date" => $endDate,
            ],
            [
                "apartment_id" => "5",
                "sponsor_id" => "2",
                "start_date" => $startDate,
                "end_date" => $endDate,
            ],
            [
                "apartment_id" => "4",
                "sponsor_id" => "2",
                "start_date" => $startDate,
                "end_date" => $endDate,
            ],
            [
                "apartment_id" => "8",
                "sponsor_id" => "2",
                "start_date" => $startDate,
                "end_date" => $endDate,
            ],
        ];

        foreach($apartments_sponsored as $key => $apartment) {
            ApartmentSponsor::create($apartment);
        }
        // $apartments = Apartment::all();
        // $sponsors = Sponsor::all();
        
        // foreach ($apartments as $key => $apartment) {
        //     $sponsor = $sponsors[2];
        //     $startDate = now();
        //     $endDate = now()->addHours($sponsor->duration);

        //     $apartment->sponsors()->attach($sponsor->id, [
        //         'start_date' => $startDate,
        //         'end_date' => $endDate,
        //     ]);
        // }
    }
}
