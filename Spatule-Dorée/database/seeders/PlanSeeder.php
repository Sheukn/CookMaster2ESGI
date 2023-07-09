<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    public function run()
    {
        $plans = [
            [
                'name' => 'Formule starter',
                'slug' => 'Formule starter',
                'stripe_plan' => 'price_1NQW3XAnQHoTINbS1Z5bQTjL',
                'price' => 9.90,
                'description' => 'Formule starter'
            ],
            [
                'name' => 'Formule master',
                'slug' => 'Formule master',
                'stripe_plan' => 'price_1NQW7dAnQHoTINbS9BEXh92L',
                'price' => 19,
                'description' => 'Formule master'
            ]
        ];

        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
