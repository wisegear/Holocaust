<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GalleryAlbums;

class gallery_albums_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GalleryAlbums::create([
		'name' => 'Auschwitz',
		'gallery_categories_id' => 1	
		]);

		GalleryAlbums::create([
		'name' => 'Hitler',
		'gallery_categories_id' => 2	
		]);

		GalleryAlbums::create([
		'name' => 'Poland',
		'gallery_categories_id' => 3	
		]);
		
		GalleryAlbums::create([
		'name' => 'Camps',
		'gallery_categories_id' => 4	
		]);

		GalleryAlbums::create([
		'name' => 'Unsorted',
		'gallery_categories_id' => 2	
		]);
			
		GalleryAlbums::create([
		'name' => 'Test',
		'gallery_categories_id' => 1	
		]);
			
	
							
    }

}
