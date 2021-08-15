<?php

namespace Database\Factories;

use App\Models\BlogPostTags;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostTagsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogPostTags::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [ 
            'tag_id' => $this->faker->numberBetween(1, 100),
            'post_id' => $this->faker->numberBetween(1, 50),
        ];
    }
}
