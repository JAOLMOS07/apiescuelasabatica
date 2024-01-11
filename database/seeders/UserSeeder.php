<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Maestro Clase 1',
                'email' => 'maestro_clase1@gmail.com',
            ],
            [
                'name' => 'Maestro Clase 2',
                'email' => 'mmaestro_clase2@gmail.co',
            ],
            [
                'name' => 'Maestro Clase 3',
                'email' => 'maestro_clase3@gmail.com',
            ],
            [
                'name' => 'Maestro Clase 4',
                'email' => 'maestro_clase4@gmail.com',
            ],
            [
                'name' => 'Maestro Clase Visitas',
                'email' => 'maestro_visitas@gmail.com',
            ],
            [
                'name' => 'Maestro Clase Jóvenes',
                'email' => 'maestro_jovenes@gmail.com',
            ],
        ];

        foreach ($users as $userData) {
            DB::table('users')->insert([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make('clase123456'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
