<?php

namespace Database\Factories;

use App\Models\BlogCategories;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogCategoriesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogCategories::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [ 
            'name' => $this->faker->word(),
        ];
    }
}
