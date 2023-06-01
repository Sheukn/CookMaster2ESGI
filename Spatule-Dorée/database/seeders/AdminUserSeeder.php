<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'firstname' => 'Admin',
            'name' => 'Admin',
            'email' => 'cookmaster.projetct@gmail.com',
            'address' => '23 rue Balzac',
            'postal_code' => '75012',
            'city' => 'Paris',
            'country' => 'France',
            'phone' => '0613026330',
            'password' => bcrypt('Azerty1234.'),
            'is_admin' => 1,
        ]);

        User::factory(10)->create();
    }
}
