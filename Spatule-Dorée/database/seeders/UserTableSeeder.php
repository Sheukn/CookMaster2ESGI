<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //User::truncate();
        DB::table('role_user')->truncate();
        DB::table('event_has_user')->truncate();

        $Admin = User::create([
            'name' => 'Admin',
            'email' => 'cookmaster.projetct@outlook.com',
            'address' => '23 rue Balzac',
            'postal_code' => '75012',
            'city' => 'Paris',
            'country' => 'France',
            'phone' => '0613026330',
            'password' => bcrypt('Azerty11'),
            'is_admin' => 1,
        ]);

        $User = User::create([
            'name' => 'User',
            'email' => 'user@exemple.com',
            'address' => '23 rue Balzac',
            'postal_code' => '75012',
            'city' => 'Paris',
            'country' => 'France',
            'phone' => '0613026330',
            'password' => bcrypt('Azerty11'),
            'email_verified_at' => date('Y-m-d H:i:s')

        ]);

        $Teacher =  User::create([
            'name' => 'teacher',
            'email' => 'teacher@exemple.com',
            'address' => '23 rue Balzac',
            'postal_code' => '75012',
            'city' => 'Paris',
            'country' => 'France',
            'phone' => '0613026330',
            'password' => bcrypt('Azerty11'),
            'is_teacher' => 1,
            'email_verified_at' => date('Y-m-d H:i:s')


        ]);

        $adminRole = Role::where('name', 'Admin')->first();
        $teacherRole = Role::where('name', 'Teacher')->first();
        $userRole = Role::where('name', 'User')->first();

        $Admin->roles()->attach($adminRole);
        $Teacher->roles()->attach($teacherRole);
        $User->roles()->attach($userRole);
    }
}
