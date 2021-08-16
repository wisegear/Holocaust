<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GalleryTags;
use DB;

class gallery_tags_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gallery_tags')->insert([
		'name' => 'Holocaust',
		]);

        DB::table('gallery_tags')->insert([
		'name' => 'Auschwitz',
		]);

        DB::table('gallery_tags')->insert([
		'name' => 'Camps',
		]);

        DB::table('gallery_tags')->insert([
		'name' => 'People',
		]);

        DB::table('gallery_tags')->insert([
		'name' => 'Places',
		]);
			
        DB::table('gallery_tags')->insert([
		'name' => 'World',
		]);
			
        DB::table('gallery_tags')->insert([
		'name' => 'Germany',
		]);
			
        DB::table('gallery_tags')->insert([
		'name' => 'Poland',
		]);
			
        DB::table('gallery_tags')->insert([
		'name' => 'Auschwitz',
		]);
			
    }
}
