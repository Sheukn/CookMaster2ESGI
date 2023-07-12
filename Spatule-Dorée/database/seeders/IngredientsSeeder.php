<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientsSeeder extends Seeder
{
    public function run()
    {
        $ingredients = [
            'Farine',
            'Sucre',
            'Sel',
            'Beurre',
            'Œufs',
            'Lait',
            'Levure',
            'Vanille',
            'Chocolat',
            'Huile',
            'Épices',
            'Ail',
            'Oignon',
            'Tomate',
            'Pomme de terre',
            'Carotte',
            'Poivron',
            'Poulet',
            'Bœuf',
            'Porc',
            'Poisson',
            'Crevettes',
            'Riz',
            'Pâtes',
            'Crème',
            'Fromage',
            'Citron',
            'Miel',
            'Noix',
            'Noisettes',
            'Amandes',
            'Pain',
            'Moutarde',
            'Mayonnaise',
            'Vinaigre',
            'Sauce soja',
            'Sauce tomate',
            'Sauce piquante',
            'Herbes',
            'Épinards',
            'Brocoli',
            'Champignons',
            'Avocat',
            'Mangue',
            'Ananas',
            'Banane',
            'Fraise',
            'Framboise',
            'Myrtille',
        ];

        foreach ($ingredients as $ingredient) {
            DB::table('ingredients')->insert([
                'name' => $ingredient
            ]);
        }
    }
}
