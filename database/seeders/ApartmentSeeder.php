<?php

namespace Database\Seeders;

use App\Models\Apartment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $apartments = [
            [
                'user_id' => 1,
                'name'=>'Casale Castel Bolognese',
                'description' => 'Situata in cima a pittoreschi e tranquilli vigneti sulle dolci colline romagnole, La Collina è la destinazione perfetta per una vacanza in Italia. Vivi il fascino rustico della campagna con i comfort di una vita moderna grazie a un recente restauro completo. Godrete di una vista panoramica sul Mare Adriatico e sull Appennino Toscano con albe e tramonti mozzafiato e ininterrotti sulle valli circostanti.',
                'square_meters' => 220,
                'bed_number' => 8,
                'bathroom_number' => 3,
                'room_number' => 4,
                'address' => 'Via Serra, 4380, 48014 Castel bolognese',
                'city' => 'Ravenna',
                'state' => 'Italia',
                'latitude' => '44.30068009787133', 
                'longitude' => '11.742477907652844',
                'price' => 600.00,
                'image' => '',
                'visibility' => true,  
            ],
            [
                'user_id' => 1,
                'name'=>'La Chiocciola',
                'description' => 'Appartamento spazioso e luminoso, decorato con un elegante stile moderno. Goditi la tua colazione sulla terrazza privata con vista sulla città.',
                'square_meters' => 90,
                'bed_number' => 3,
                'bathroom_number' => 1,
                'room_number' => 2,
                'address' => 'via dei Fori Imperiali, 1, 00186',
                'city' => 'Roma',
                'state' => 'Italia',
                'latitude' => '41.894939', 
                'longitude' => '12.484137',
                'price' => 150.00,
                'image' => '',
                'visibility' => true,
            ],
            [
                'user_id' => 2,
                'name' => 'La magica Napoli',
                'description' => 'Situata in una posizione incantevole nel quartiere Plebiscito di Napoli.',
                'square_meters' => 50,
                'bed_number' => 1,
                'bathroom_number' => 1,
                'room_number' => 1,
                'address' => '55 Vico Cariati',
                'city' => 'Napoli',
                'state' => 'Italia',
                'latitude' => '40.8517746',
                'longitude' => '14.2681244',
                'price' => 100.00,
                'image' => '',
                'visibility' => true,
            ],
            [
                'user_id' => 2,
                'name' => 'Villa Elisio',
                'description' => 'Situata in una posizione incantevole nel quartiere Vomero di Napoli.',
                'square_meters' => 60,
                'bed_number' => 2,
                'bathroom_number' => 1,
                'room_number' => 6,
                'address' => 'Via Luca Samuele Cagnazzi 29',
                'city' => 'Napoli',
                'state' => 'Italia',
                'latitude' => '40.8517746',
                'longitude' => '14.2681244',
                'price' => 500.00,
                'image' => '',
                'visibility' => true,
            ],
            [
                'user_id' => 3,
                'name' => 'Casa Giostrello Magical Sea View in green area',
                'description' => 'Casa Giostrello è un grazioso mini-appartamento indipendente in un parco residenziale, nella zona alta di Positano e gode di una splendida vista',
                'square_meters' => 320,
                'bed_number' => 2,
                'bathroom_number' => 2,
                'room_number' => 4,
                'address' => 'Viale Pasitea',
                'city' => 'Positano',
                'state' => 'Italia',
                'latitude' => '40.3741',
                'longitude' => '14.2903',
                'price' => 200.00,
                'image' => '',
                'visibility' => true,
            ],
            [
                'user_id' => 3,
                'name' => 'Maison Matilde Luxury Apartment de charme',
                'description' => 'Maison Matilde  è una nuova struttura moderna situata nel cuore del centro storico, a soli 3 minuti dalla piazza principale.',  
                'square_meters' => 190,
                'bed_number' => 3,
                'bathroom_number' => 2,
                'room_number' => 5,
                'address' => 'Corso Italia',
                'city' => 'Sorrento',
                'state' => 'Italia',
                'latitude' => '40.616667 Nord',
                'longitude' => '14.366667 Est',
                'price' => 138.00,
                'image' => '',
                'visibility' => true,
            ],
            [
                'user_id' => 4,
                'name' => 'Design Club Collection',
                'description' => 'Progettato da architetti di fama internazionale, l edificio completamente ristrutturato vanta appartamenti con una selezione di iconici elementi di design moderno che uniscono qualità estetica con qualità funzionale e funzionale. Gli appartamenti sono caratterizzati dai più classici design di design, tra cui Munari, Le Corbusier, Sapper, Jacobsen, Mollino, Fratelli Castiglioni, Sottsass e Magistretti, fino ai contemporanei De Lucchi, Iosa Ghini, Starck, Grcic, Rashid, Fratelli Bourolec.',
                'square_meters' => 100,
                'bed_number' => 3,
                'bathroom_number' => 2,
                'room_number' => 3,
                'address' => 'Via Nazario Sauro, 25',
                'city' => 'Bologna',
                'state' => 'Italia',
                'latitude' => '44.29540',
                'longitude' => '11.20236',
                'price' => 500.00,
                'image' => '',
                'visibility' => true,
                ],
                [
                'user_id'=> 4,
                'name' => 'mini appartamento Airport_Bologna',
                'description' => 'Si tratta di un mini appartamento adatto come punto di appoggio o breve soggiorno. Vicinissimo all aeroporto MARCONI , all  OSPEDALE MAGGIORE, CENTRO COMMERCIALE "GRAN RENO", UNIPOL ARENA, CENTRO BORGO  e al MUSEO DUCATI. La zona è  ben servita da tutti i servizi, a pochi metri si trova la fermata dell autobus per raggiungere il centro.',
                'square_meters' => 30,
                'bed_number' => 1,
                'bathroom_number' => 1,
                'room_number' => 3,
                'address' => 'Via Guglielmo Pepe, 20',
                'city' => 'Bologna',
                'state' => 'Italia',
                'latitude' => '44.31230',
                'longitude' => '11.17318',
                'price' => 100.00,
                'image' => '',
                'visibility' => true,
            ]
        ];
        foreach ($apartments as $apartment) {
            Apartment::create([
                'user_id' => $apartment['user_id'],
                'name' => $apartment['name'],
                'slug' => Str::slug($apartment['name'], '_'),
                'description' => $apartment['description'],
                'square_meters' => $apartment['square_meters'],
                'bed_number' => $apartment['bed_number'],
                'bathroom_number' => $apartment['bathroom_number'],
                'room_number' => $apartment['room_number'],
                'address' => $apartment['address'],
                'city' => $apartment['city'],
                'state' => $apartment['state'],
                'latitude' => $apartment['latitude'],
                'longitude' => $apartment['longitude'],
                'price' => $apartment['price'],
                'image' => $apartment['image'],
                'visibility' => $apartment['visibility'],
            ]);
        }
    }
}
