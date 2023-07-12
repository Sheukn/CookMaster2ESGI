<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeIngredientSeeder extends Seeder
{
    public function run()
    {
        $recipeIngredients = [];

        $recipeCount = 25;
        $ingredientCount = 5;

        for ($i = 1; $i <= $recipeCount; $i++) {
            $ingredientIds = range(1, 47);
            shuffle($ingredientIds);
            $ingredientIds = array_slice($ingredientIds, 0, rand(1, 5));

            foreach ($ingredientIds as $ingredientId) {
                $recipeIngredients[] = [
                    'recipe_id' => $i,
                    'ingredient_id' => $ingredientId,
                    'quantity' => rand(1, 5),
                ];
            }
        }

        foreach ($recipeIngredients as $recipeIngredient) {
            DB::table('recipe_ingredient')->insert($recipeIngredient);
        }
    }
}

