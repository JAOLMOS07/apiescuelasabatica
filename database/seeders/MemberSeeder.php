<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            [
                'name' => 'Nombre Miembro 1',
                'lastname' => 'Apellido Miembro 1',
                'phone' => '123456789',
                'email' => 'miembro1@example.com',
                'birthdate' => '1990-01-01',

            ],
            [
                'name' => 'Nombre Miembro 2',
                'lastname' => 'Apellido Miembro 2',
                'phone' => '123456789',
                'email' => 'miembro2@example.com',
                'birthdate' => '1990-01-01',

            ],
            [
                'name' => 'Nombre Miembro 3',
                'lastname' => 'Apellido Miembro 3',
                'phone' => '123456789',
                'email' => 'miembro3@example.com',
                'birthdate' => '1990-01-01',

            ]
        ];

        foreach ($members as $memberData) {
            DB::table('members')->insert([
                'name' => $memberData['name'],
                'lastname' => $memberData['lastname'],
                'phone' => $memberData['phone'],
                'email' => $memberData['email'],
                'birthdate' => $memberData['birthdate'],
                'class_id' => 1,
            ]);
        }
    }
}
