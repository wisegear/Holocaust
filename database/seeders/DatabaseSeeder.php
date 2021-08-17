<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\BlogPosts;
use App\Models\BlogCategories;
use App\Models\BlogTags;
use App\Models\BlogPostTags;
use App\Models\Quotes;
use App\Models\Timeline;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(users_seeder::class);
        BlogCategories::factory(6)->create();
        $this->call(users_roles_seeder::class);
        BlogPosts::factory(50)->create();
        BlogTags::factory(100)->create();
        BlogPostTags::factory(200)->create();
        $this->call(quotes_seeder::class);
        $this->call(timeline_seeder::class);
        $this->call(gallery_categories_seeder::class);
        $this->call(gallery_albums_seeder::class);
        //$this->call(gallery_tags_seeder::class);
        //$this->call(gallery_images_seeder::class);
        //$this->call(gallery_tags_pivot_seeder::class);
    }
}
