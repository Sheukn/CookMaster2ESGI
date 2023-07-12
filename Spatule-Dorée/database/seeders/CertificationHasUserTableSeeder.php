<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CertificationHasUser;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CertificationHasUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $certificationHasUser = CertificationHasUser::create([
            'date_obteined' => '2021-01-01',
            'is_available' => true,
            'certification_id' => 1,
            'user_id' => 1,
        ]);
    }
}
