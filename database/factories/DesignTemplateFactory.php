<?php

namespace Database\Factories;

use App\Models\DesignTemplate;
use Illuminate\Database\Eloquent\Factories\Factory;

class DesignTemplateFactory extends Factory
{
    protected $model = DesignTemplate::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'template_type' => $this->faker->randomElement(['vertical_menu', 'horizontal_menu', 'burger_menu']),
        ];
    }
}
