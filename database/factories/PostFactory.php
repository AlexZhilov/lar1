<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{

    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => Category::get()->random()->id,
            'title' => $this->faker->sentence(),
            'text' => $this->faker->text(random_int(200, 900)),
            'image' => '1.jpg',
            'visible' => 1,
            'views' => random_int(1,2000)
        ];
    }
}
