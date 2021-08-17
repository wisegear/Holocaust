<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GalleryCategories;

class gallery_categories_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GalleryCategories::create([
		'name' => 'camps',
		]);

		GalleryCategories::create([
		'name' => 'people',
		]);

		GalleryCategories::create([
		'name' => 'places',
		]);
		
		GalleryCategories::create([
		'name' => 'colour',
		]);
			
		GalleryCategories::create([
		'name' => 'filler',
		]);
			

								
    }

}
