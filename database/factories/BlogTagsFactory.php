<?php

namespace Database\Factories;

use App\Models\BlogTags;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogTagsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogTags::class;

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
