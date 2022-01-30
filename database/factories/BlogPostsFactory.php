<?php

namespace Database\Factories;

use App\Models\BlogPosts;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogPostsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BlogPosts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->words(5, true);
        $slug = Str::slug($title, '-');

        return [ 
            'title' => $title,
            'slug' => $slug,
            'excerpt' => $this->faker->paragraph(2, false),
            'body' => $this->faker->paragraph(20, false),
            'categories_id' => $this->faker->numberBetween(1, 5),
            'user_id' => $this->faker->numberBetween(1, 4),
            'created_at' => $this->faker->dateTimeThisYear(),
        ];

    }
}
