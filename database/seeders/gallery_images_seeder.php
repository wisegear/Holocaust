<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GalleryImages;

class gallery_images_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
 	public function run()
    {
    
    GalleryImages::create([
		'title' => 'My 1st Image',
    'image' => 'one.jpg',
    'location' => 'here',
    'taken' => 'around 1945 in X',
    'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
		  incididunt ut labore et dolore magna aliqua.',
  	'published' => true,
		'user_id' => 1,
    'gallery_albums_id' => 1,
		]);
    
    GalleryImages::create([
		'title' => 'My 2nd Image',
    'image' => 'two.jpg',
    'location' => 'here',
    'taken' => 'around 1945 in X',
    'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
		  incididunt ut labore et dolore magna aliqua.',
  	'published' => true,
		'user_id' => 2,
    'gallery_albums_id' => 2,
		]);
    
    GalleryImages::create([
		'title' => 'My 3rd Image',
    'image' => 'three.jpg',
    'location' => 'here',
    'taken' => 'around 1945 in X',
    'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
		  incididunt ut labore et dolore magna aliqua.',
  	'published' => true,
		'user_id' => 3,
    'gallery_albums_id' => 3,
		]);
    
    GalleryImages::create([
		'title' => 'My 4th Image',
    'image' => 'four.jpg',
    'location' => 'here',
    'taken' => 'around 1945 in X',
    'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
		  incididunt ut labore et dolore magna aliqua.',
  	'published' => true,
		'user_id' => 1,
    'gallery_albums_id' => 4,
		]);

    GalleryImages::create([
		'title' => 'My 5th Image',
    'image' => 'five.jpg',
    'location' => 'here',
    'taken' => 'around 1945 in X',
    'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
		  incididunt ut labore et dolore magna aliqua.',
  	'published' => true,
		'user_id' => 2,
    'gallery_albums_id' => 5,
		]);
    
    GalleryImages::create([
		'title' => 'My 6th Image',
    'image' => 'six.jpg',
    'location' => 'here',
    'taken' => 'around 1945 in X',
    'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor 
		  incididunt ut labore et dolore magna aliqua.',
  	'published' => true,
		'user_id' => 3,
    'gallery_albums_id' => 6,
		]);
		
  
				
  }
}
