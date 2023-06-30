<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApartmentServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // prelevo i dati di tutti gli appartamenti e i servizi esistenti
        $apartments = Apartment::all();
        $services = Service::all()->pluck('id');

        foreach ($apartments as $apartment) {
            $numServices = rand(1,10);
            $randServices = $services->random($numServices);
            $apartment->services()->attach($randServices);
        }
    }
}
