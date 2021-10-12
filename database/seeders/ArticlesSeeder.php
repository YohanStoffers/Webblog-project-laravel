<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = Article::factory(20)
            ->create();
            
        $categoryCount = Category::count();

        $articles->each(function (Article $article) use ($categoryCount) {
            for ($i = 0; $i < rand(1, $categoryCount); $i++) {
                $article->categories()->syncWithoutDetaching(rand(1, $categoryCount));
            }
        });

    }
}
