<?php

namespace Database\Seeders;

use App\Models\StepHasUser;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StepHasUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stepHasUser = StepHasUser::create([
            'current_step' => 1,
            'user_id' => 1,
            'step_id' => 1,
        ]);
    }
}
