<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category();
        $category->name = 'Développement Web';
        $category->icon = '<i class="fas fa-code"></i>';
        $category->save();

        $category = new Category();
        $category->name = 'Développement Logiciel';
        $category->icon = '<i class="fas fa-terminal"></i>';
        $category->save();

        $category = new Category();
        $category->name = 'Design';
        $category->icon = '<i class="fas fa-pen-nib"></i>';
        $category->save();
    }
}
