<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class classSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            ['name' => 'Clase 1', 'user_id' => 1],
            ['name' => 'Clase 2', 'user_id' => 2],
            ['name' => 'Clase 3', 'user_id' => 3],
            ['name' => 'Clase 4', 'user_id' => 4],
            ['name' => 'Visitas', 'user_id' => 5],
            ['name' => 'Jóvenes', 'user_id' => 6],
        ];

        foreach ($classes as $class) {
            DB::table('school_classes')->insert([
                'name' => $class['name'],
                'user_id' => $class['user_id'],
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
