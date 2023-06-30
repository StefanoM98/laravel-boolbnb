<?php

namespace Database\Seeders;

use App\Models\Apartment;
use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartments = Apartment::all();

        for ($i = 1; $i <= count($apartments); $i++) { 
            $message = new Message();
            
            $message->apartment_id = $i;
            $message->name = 'Cliente Interessato';
            $message->email = 'cliente@gmail.com';
            $message->text = 'Ciao, sarei interessato ad alloggiare nel tuo appartamento vacanza. Potrei avere maggiori informazioni sulla disponibilità e i prezzi?';
            $message->state_message = false;

            $message->save();
        }
    }
}
