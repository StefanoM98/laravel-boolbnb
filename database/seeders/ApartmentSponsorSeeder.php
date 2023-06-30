<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Sponsor;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class ApartmentSponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartments = Apartment::all();
        $sponsors = Sponsor::all();
        
        foreach ($apartments as $key => $apartment) {
            $sponsor = $sponsors[$key % count($sponsors)];
            $startDate = now();
            $endDate = now()->addHours($sponsor->duration);

            $apartment->sponsors()->attach($sponsor->id, [
                'start_date' => $startDate,
                'end_date' => $endDate,
            ]);
        }
    }
}
