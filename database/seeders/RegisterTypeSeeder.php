<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegisterTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('register_types')->insert([
            ['name' => 'assistance'],
            ['name' => 'mission'],
            ['name' => 'study'],
        ]);
    }
}
