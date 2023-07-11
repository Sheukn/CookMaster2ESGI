<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recipe;
use Faker\Factory as Faker;

class RecipesSeeder extends seeder{

    public function run()
    {
        $recipes = [
            [
                'category' => 'Entrée',
                'name' => 'Salade Caprese',
                'description' => 'Salade fraîche et légère avec des tomates, de la mozzarella et du basilic.',
                'prep_time' => 10,
                'cooking_time' => 0,
                'number_of_persons' => 2,
                'type' => 'Entrée',
                'gastronomy' => 'Italienne',
                'difficulty' => 'Facile',
                'is_bookmarked' => false,
            ],
            [
                'category' => 'Plat principal',
                'name' => 'Boeuf Bourguignon',
                'description' => 'Plat traditionnel français avec du bœuf mijoté dans du vin rouge et des légumes.',
                'prep_time' => 20,
                'cooking_time' => 180,
                'number_of_persons' => 4,
                'type' => 'Plat principal',
                'gastronomy' => 'Française',
                'difficulty' => 'Moyenne',
                'is_bookmarked' => false,
            ],
            [
                'category' => 'Dessert',
                'name' => 'Tarte aux fraises',
                'description' => 'Délicieuse tarte sucrée aux fraises fraîches et à la crème.',
                'prep_time' => 30,
                'cooking_time' => 30,
                'number_of_persons' => 6,
                'type' => 'Dessert',
                'gastronomy' => 'Française',
                'difficulty' => 'Facile',
                'is_bookmarked' => false,
            ],
            [
                'category' => 'Plat principal',
                'name' => 'Ratatouille',
                'description' => 'Plat provençal avec des légumes mijotés comme les courgettes, les aubergines et les poivrons.',
                'prep_time' => 20,
                'cooking_time' => 40,
                'number_of_persons' => 4,
                'type' => 'Plat principal',
                'gastronomy' => 'Française',
                'difficulty' => 'Facile',
                'is_bookmarked' => false,
            ],
            [
                'category' => 'Entrée',
                'name' => 'Soupe à l\'oignon',
                'description' => 'Soupe chaude à base d\'oignons caramélisés et de bouillon de bœuf, gratinée avec du fromage.',
                'prep_time' => 15,
                'cooking_time' => 60,
                'number_of_persons' => 4,
                'type' => 'Entrée',
                'gastronomy' => 'Française',
                'difficulty' => 'Moyenne',
                'is_bookmarked' => false,
            ],
            [
                'category' => 'Dessert',
                'name' => 'Crème brûlée',
                'description' => 'Dessert crémeux à la vanille avec une fine couche de sucre caramélisé sur le dessus.',
                'prep_time' => 20,
                'cooking_time' => 30,
                'number_of_persons' => 4,
                'type' => 'Dessert',
                'gastronomy' => 'Française',
                'difficulty' => 'Moyenne',
                'is_bookmarked' => false,
            ],
            [
                'category' => 'Plat principal',
                'name' => 'Poulet rôti',
                'description' => 'Poulet entier rôti au four avec des herbes et des légumes d\'accompagnement.',
                'prep_time' => 15,
                'cooking_time' => 90,
                'number_of_persons' => 4,
                'type' => 'Plat principal',
                'gastronomy' => 'Internationale',
                'difficulty' => 'Facile',
                'is_bookmarked' => false,
            ],
            [
                'category' => 'Dessert',
                'name' => 'Mousse au chocolat',
                'description' => 'Dessert aérien au chocolat avec une texture crémeuse.',
                'prep_time' => 30,
                'cooking_time' => 0,
                'number_of_persons' => 4,
                'type' => 'Dessert',
                'gastronomy' => 'Internationale',
                'difficulty' => 'Facile',
                'is_bookmarked' => false,
            ],
            [
                'category' => 'Entrée',
                'name' => 'Carpaccio de boeuf',
                'description' => 'Tranches fines de boeuf cru marinées avec de l\'huile d\'olive, du jus de citron et du parmesan.',
                'prep_time' => 15,
                'cooking_time' => 0,
                'number_of_persons' => 2,
                'type' => 'Entrée',
                'gastronomy' => 'Italienne',
                'difficulty' => 'Facile',
                'is_bookmarked' => false,
            ],
            [
                'category' => 'Plat principal',
                'name' => 'Sushi',
                'description' => 'Rouleaux de riz et de poisson cru enveloppés dans des feuilles de nori.',
                'prep_time' => 45,
                'cooking_time' => 0,
                'number_of_persons' => 2,
                'type' => 'Plat principal',
                'gastronomy' => 'Japonaise',
                'difficulty' => 'Moyenne',
                'is_bookmarked' => false,
            ],
            [
                'category' => 'Plat principal',
                'name' => 'Pizza Margherita',
                'description' => 'Délicieuse pizza avec de la sauce tomate, de la mozzarella et du basilic.',
                'prep_time' => 20,
                'cooking_time' => 15,
                'number_of_persons' => 2,
                'type' => 'Plat principal',
                'gastronomy' => 'Italienne',
                'difficulty' => 'Facile'
            ],
            [
                'category' => 'Entrée',
                'name' => 'Bruschetta',
                'description' => 'Pain grillé garni de tomates fraîches, d\'ail, de basilic et d\'huile d\'olive.',
                'prep_time' => 10,
                'cooking_time' => 5,
                'number_of_persons' => 4,
                'type' => 'Entrée',
                'gastronomy' => 'Italienne',
                'difficulty' => 'Facile'
            ],
            [
                'category' => 'Dessert',
                'name' => 'Tiramisu',
                'description' => 'Dessert italien classique avec des couches de biscuits imbibés de café et de crème au mascarpone.',
                'prep_time' => 30,
                'cooking_time' => 0,
                'number_of_persons' => 6,
                'type' => 'Dessert',
                'gastronomy' => 'Italienne',
                'difficulty' => 'Moyenne'
            ],
        
            // Gastronomie mexicaine
            [
                'category' => 'Plat principal',
                'name' => 'Tacos au poulet',
                'description' => 'Tortillas de maïs garnies de poulet grillé, de légumes et de salsa.',
                'prep_time' => 25,
                'cooking_time' => 20,
                'number_of_persons' => 4,
                'type' => 'Plat principal',
                'gastronomy' => 'Mexicaine',
                'difficulty' => 'Facile'
            ],
            [
                'category' => 'Entrée',
                'name' => 'Guacamole',
                'description' => 'Dip à base d\'avocat, de tomates, d\'oignons, de coriandre et de jus de citron vert.',
                'prep_time' => 15,
                'cooking_time' => 0,
                'number_of_persons' => 4,
                'type' => 'Entrée',
                'gastronomy' => 'Mexicaine',
                'difficulty' => 'Facile'
            ],
            [
                'category' => 'Dessert',
                'name' => 'Churros',
                'description' => 'Beignets croustillants à base de pâte à choux, saupoudrés de sucre et servis avec du chocolat chaud.',
                'prep_time' => 30,
                'cooking_time' => 20,
                'number_of_persons' => 4,
                'type' => 'Dessert',
                'gastronomy' => 'Mexicaine',
                'difficulty' => 'Facile'
            ],
        
            // Gastronomie indienne
            [
                'category' => 'Plat principal',
                'name' => 'Butter Chicken',
                'description' => 'Poulet cuit dans une sauce crémeuse au beurre, à la tomate et aux épices indiennes.',
                'prep_time' => 30,
                'cooking_time' => 40,
                'number_of_persons' => 4,
                'type' => 'Plat principal',
                'gastronomy' => 'Indienne',
                'difficulty' => 'Moyenne'
            ],
            [
                'category' => 'Entrée',
                'name' => 'Samosas',
                'description' => 'Beignets frits en forme de triangle, remplis de légumes épicés.',
                'prep_time' => 25,
                'cooking_time' => 20,
                'number_of_persons' => 6,
                'type' => 'Entrée',
                'gastronomy' => 'Indienne',
                'difficulty' => 'Moyenne'
            ],
            [
                'category' => 'Dessert',
                'name' => 'Gulab Jamun',
                'description' => 'Boules de pâte frites imbibées de sirop sucré à base de cardamome et de safran.',
                'prep_time' => 20,
                'cooking_time' => 30,
                'number_of_persons' => 8,
                'type' => 'Dessert',
                'gastronomy' => 'Indienne',
                'difficulty' => 'Facile'
            ],
        
            // Gastronomie coréenne
            [
                'category' => 'Plat principal',
                'name' => 'Bibimbap',
                'description' => 'Riz mélangé avec des légumes sautés, de la viande et un œuf cru.',
                'prep_time' => 25,
                'cooking_time' => 30,
                'number_of_persons' => 2,
                'type' => 'Plat principal',
                'gastronomy' => 'Coréenne',
                'difficulty' => 'Facile'
            ],
            [
                'category' => 'Entrée',
                'name' => 'Kimchi',
                'description' => 'Condiment fermenté à base de chou chinois, d\'ail, de gingembre et de piment.',
                'prep_time' => 20,
                'cooking_time' => 0,
                'number_of_persons' => 4,
                'type' => 'Entrée',
                'gastronomy' => 'Coréenne',
                'difficulty' => 'Facile'
            ],
            [
                'category' => 'Dessert',
                'name' => 'Bingsu',
                'description' => 'Dessert glacé à base de glace pilée, de fruits et de sirop.',
                'prep_time' => 15,
                'cooking_time' => 0,
                'number_of_persons' => 2,
                'type' => 'Dessert',
                'gastronomy' => 'Coréenne',
                'difficulty' => 'Facile'
            ],
            [
                'category' => 'Plat principal',
                'name' => 'Poulet aux légumes sautés',
                'description' => 'Poulet et légumes sautés dans une sauce savoureuse à base de soja.',
                'prep_time' => 30,
                'cooking_time' => 20,
                'number_of_persons' => 4,
                'type' => 'Plat principal',
                'gastronomy' => 'Chinoise',
                'difficulty' => 'Facile'
            ],
            [
                'category' => 'Entrée',
                'name' => 'Raviolis chinois',
                'description' => 'Raviolis à la viande ou aux légumes, cuits à la vapeur ou frits.',
                'prep_time' => 45,
                'cooking_time' => 15,
                'number_of_persons' => 6,
                'type' => 'Entrée',
                'gastronomy' => 'Chinoise',
                'difficulty' => 'Moyenne'
            ],
            [
                'category' => 'Dessert',
                'name' => 'Tarte aux œufs',
                'description' => 'Tartelette aux œufs sucrée et moelleuse.',
                'prep_time' => 20,
                'cooking_time' => 30,
                'number_of_persons' => 8,
                'type' => 'Dessert',
                'gastronomy' => 'Chinoise',
                'difficulty' => 'Facile'
            ]

        ];

        foreach ($recipes as $recipe) {
            Recipe::create($recipe);
        }
    }

}