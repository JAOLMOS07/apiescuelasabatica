<?php

namespace Database\Seeders;

use App\Models\Register;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegisterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classId = 1;
        $registerTypes = [1, 2, 3];

        $members = \App\Models\Member::where('class_id', $classId)->get();

        foreach ($members as $member) {
            foreach ($registerTypes as $typeId) {
                Register::create([
                    'date' => Carbon::now()->toDateString(),
                    'member_id' => $member->id,
                    'register_type_id' => $typeId,
                    'class_id' => $classId,
                    'value' => rand(0, 1),
                ]);
            }
        }
    }
}
