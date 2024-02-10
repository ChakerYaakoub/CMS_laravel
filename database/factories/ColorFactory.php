<?php

namespace Database\Factories;

use App\Models\Color;
use Illuminate\Database\Eloquent\Factories\Factory;

class ColorFactory extends Factory
{
    protected $model = Color::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'font_color' => $this->faker->hexColor,
            'background_color' => $this->faker->hexColor,
            'section_separator_color' => $this->faker->hexColor,
        ];
    }
}
