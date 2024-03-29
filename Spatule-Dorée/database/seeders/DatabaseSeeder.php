<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()

    {
        $this->call(RolesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PlanSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(RecipesSeeder::class);
        $this->call(IngredientsSeeder::class);
        $this->call(RecipeIngredientSeeder::class);
        // $this->call(CertificationTableSeeder::class);
        // $this->call(CertificationHasUserTableSeeder::class);
        // $this->call(StepHasUserTableSeeder::class);
    }
}
