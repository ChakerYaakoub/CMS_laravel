<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    protected $model = Article::class;

    public function definition()
    {
        return [
            // 'user_id' => \App\Models\User::factory()->create()->id,
            'user_id' => $this->faker->numberBetween(1, 20),
            // 'site_id' => \App\Models\Site::factory()->create()->id,
            'site_id' => $this->faker->numberBetween(1, 20),
            'article_nb' => $this->faker->numberBetween(1, 20),
            'article_title' => $this->faker->paragraph(5, true),
            'article_content' =>  $this->faker->paragraph(2, 3),

        ];
    }
}
