<?php

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
            'HTML5',
            'CSS3',
            'Bootstrap',
            'SCSS',
            'JavaScript',
            'Vue.Js',
            'MySQL',
            'PHP',
            'Laravel',
        ];

        foreach ($categories as $category) {
            $_category = new Category();
            $_category->name = $category;
            $_category->slug = Str::slug($category);
            $_category->save();
        }
    }
}