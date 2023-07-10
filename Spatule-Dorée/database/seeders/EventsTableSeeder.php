<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Events;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // creer les events de base
        for ($i = 0; $i < 10; $i++) {
            $event = Events::create([
                'name' => 'Name ' . ($i + 1),
                'description' => 'Description ' . ($i + 1),
                'start_event' => now(),
                'end_event' => now()->addDays(7),
                'is_physics' => rand(0, 1) ? true : false,
            ]);

            $teacher = User::where('is_teacher', 1)->first();
            //var_dump($teacher);
            if ($teacher) {
                $event->users()->attach($teacher->id);
            }
        }
    }
}
