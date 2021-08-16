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
		'name' => 'Camps',
		]);

		GalleryCategories::create([
		'name' => 'People',
		]);

		GalleryCategories::create([
		'name' => 'Places',
		]);
		
		GalleryCategories::create([
		'name' => 'Colour',
		]);
			
		GalleryCategories::create([
		'name' => 'Filler',
		]);
			

								
    }

}
