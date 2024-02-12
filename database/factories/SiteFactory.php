<?php

namespace Database\Factories;

use App\Models\Color;
use App\Models\DesignTemplate;
use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiteFactory extends Factory
{
    protected $model = Site::class;

    public function definition()
    {
        return [
            'user_id' =>  $this->faker->numberBetween(1, 20),
            'design_template_id' =>  $this->faker->numberBetween(1, 3),
            'color_id' => $this->faker->numberBetween(1, 20),
            'site_title' => $this->faker->word,
            'introduction' => $this->faker->paragraph,
            'tags' => $this->faker->word, // i want three word tags
            'link' => $this->faker->url,
            'logo' => $this->faker->imageUrl(640, 480, 'cats', true),
            'BasicImage' => $this->faker->imageUrl(640, 480, 'cats', true),
        ];
    }
}
