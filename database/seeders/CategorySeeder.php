<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Les Animaux',
                'description' => 'Découvrez les animaux et leurs caractéristiques'
            ],
            [
                'name' => 'Les Couleurs',
                'description' => 'Apprenez les différentes couleurs'
            ],
            [
                'name' => 'Les Nombres',
                'description' => 'Découvrez les nombres et apprenez à compter'
            ],
            [
                'name' => 'Les Formes',
                'description' => 'Explorez les différentes formes géométriques'
            ],
            [
                'name' => 'Les Fruits',
                'description' => 'Découvrez les différents fruits et leurs bienfaits'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
