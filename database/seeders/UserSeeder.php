<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Luca',
                'surname' => 'Pertosa',
                'email' => 'luca@gmail.com',
                'password' => bcrypt('lucapsw1'),
                'date_of_birth' => '1997-10-10',
            ],
            [
                'name' => 'Stefano',
                'surname' => 'Martino',
                'email' => 'stefano@gmail.com',
                'password' => bcrypt('stefanopsw1'),
                'date_of_birth' => '1998-03-07',
            ],
            [
                'name' => 'Luigi',
                'surname' => 'De Filippo',
                'email' => 'luigi@gmail.com',
                'password' => bcrypt('luigipsw1'),
                'date_of_birth' => '2002-07-22',
            ],
            [
                'name' => 'Diego',
                'surname' => 'Giardina',
                'email' => 'diego@gmail.com',
                'password' => bcrypt('diegopsw1'),
                'date_of_birth' => '1982-05-12',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
