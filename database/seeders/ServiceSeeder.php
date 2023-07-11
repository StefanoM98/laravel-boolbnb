<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'name' => 'Wifi',
                'icon' => 'fa-solid fa-wifi',
            ],
            [
                'name' => 'Parking',
                'icon' => 'fa-solid fa-square-parking',
            ],
            [
                'name' => 'Pool',
                'icon' => 'fa-solid fa-person-swimming',
            ],
            [
                'name' => 'Reception',
                'icon' => 'fa-solid fa-bell-concierge',
            ],
            [
                'name' => 'Sauna',
                'icon' => 'fa-solid fa-spa',
            ],
            [
                'name' => 'Sea View',
                'icon' => 'fa-solid fa-water',
            ],
            [
                'name' => 'Tv',
                'icon' => 'fa-solid fa-tv',
            ],
            [
                'name' => 'Heating',
                'icon' => 'fa-solid fa-temperature-low ',
            ],
            [
                'name' => 'Air Conditioning',
                'icon' => 'fa-solid fa-fan',
            ],
            [
                'name' => 'Private Bathroom',
                'icon' => 'fa-solid fa-toilet',
            ],
            [
                'name' => 'Breakfast incluted',
                'icon' => 'fa-solid fa-mug-hot',
            ],
            [
                'name' => 'Panoramic View',
                'icon' => 'fa-solid fa-mountain-sun',
            ],
            [
                'name' => 'Kitchen',
                'icon' => 'fa-solid fa-fire-burner',
            ],
            [
                'name' => 'Washing Machine',
                'icon' => 'fa-solid fa-soap',
            ],
            [
                'name' => 'Hairdryer',
                'icon' => 'fa-solid fa-wind',
            ],
            [
                'name' => 'Hydromassage',
                'icon' => 'fa-solid fa-hot-tub-person',
            ],
            [
                'name' => 'Domotics',
                'icon' => 'fa-solid fa-robot',
            ],
            [
                'name' => 'Barbeque',
                'icon' => 'fa-solid fa-stroopwafel',
            ],
            [
                'name' => 'Garden',
                'icon' => 'fa-solid fa-tree',
            ],
            [
                'name' => 'Crib',
                'icon' => 'fa-solid fa-baby-carriage',
            ],
            [
                'name' => 'Iron',
                'icon' => 'fa-solid fa-shirt',
            ],
            [
                'name' => 'Courtesy Set',
                'icon' => 'fa-solid fa-spray-can-sparkles',
            ],
            [
                'name' => 'Chimney',
                'icon' => 'fa-solid fa-fire'
            ],
            [
                'name' => 'Accessibility',
                'icon' => 'fa-solid fa-wheelchair-move',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
