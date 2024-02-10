<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Comment;
use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'site_id' => $this->faker->numberBetween(1, 20),
            'parent_id' => null,
            'user_id' =>  $this->faker->numberBetween(1, 20),
            'comment' => $this->faker->paragraph,
            'likes' => $this->faker->numberBetween(0, 100), // Random number of likes
        ];
    }
}
