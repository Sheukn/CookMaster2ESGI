<?php

namespace Database\Seeders;

use App\Models\Certification;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CertificationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $certification = Certification::create([
            'title' => 'Certification 1',
            'image' => 'Description 1',
            'level' => 'level 1',
            'validity_time' => '2Y',
        ]);
    }
}
