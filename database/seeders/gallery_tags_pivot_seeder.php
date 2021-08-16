<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GallerytagsPivot;
use DB;

class gallery_tags_pivot_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gallery_tags_pivot')->insert(
	[

    [
        'gallery_images_id'    => 1,
        'gallery_tags_id'    => 1,
    ],
		
    [
        'gallery_images_id'    => 2,
        'gallery_tags_id'    => 2,
    ],
		
    [
        'gallery_images_id'    => 3,
        'gallery_tags_id'    => 3,
    ],
		
    [
        'gallery_images_id'    => 4,
        'gallery_tags_id'    => 4,
    ],
		
    [
        'gallery_images_id'    => 5,
        'gallery_tags_id'    => 7,
    ],

    [
        'gallery_images_id'    => 6,
        'gallery_tags_id'    => 8,
    ], 

    [
        'gallery_images_id'    => 5,
        'gallery_tags_id'    => 1,
    ], 

    [
        'gallery_images_id'    => 4,
        'gallery_tags_id'    => 1,
    ], 

    [
        'gallery_images_id'    => 3,
        'gallery_tags_id'    => 9,
    ], 

    [
        'gallery_images_id'    => 2,
        'gallery_tags_id'    => 1,
    ], 

    [
        'gallery_images_id'    => 1,
        'gallery_tags_id'    => 1,
    ], 

]);

    }
}
