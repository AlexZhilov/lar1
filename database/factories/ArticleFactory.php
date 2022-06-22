<?php

namespace Database\Factories;

use App\Models\ArticleCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => ArticleCategory::get()->random()->id,
            'title' => $this->faker->sentence(),
            'text' => $this->faker->text(random_int(200, 900)),
            'image' => '1.jpg',
            'views' => random_int(1, 2000),
            'visible' => 1,
        ];
    }
}
