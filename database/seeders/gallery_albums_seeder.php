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
		'name' => 'auschwitz',
		'gallery_categories_id' => 1	
		]);

		GalleryAlbums::create([
		'name' => 'hitler',
		'gallery_categories_id' => 2	
		]);

		GalleryAlbums::create([
		'name' => 'poland',
		'gallery_categories_id' => 3	
		]);
		
		GalleryAlbums::create([
		'name' => 'camps',
		'gallery_categories_id' => 4	
		]);

		GalleryAlbums::create([
		'name' => 'unsorted',
		'gallery_categories_id' => 2	
		]);
			
		GalleryAlbums::create([
		'name' => 'test',
		'gallery_categories_id' => 1	
		]);
			
	
							
    }

}
