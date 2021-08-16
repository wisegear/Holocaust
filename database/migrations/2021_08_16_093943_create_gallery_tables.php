<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGalleryTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // Top level gallery categories
        Schema::create('gallery_categories', function(Blueprint $table)
        {
          $table->id();
          $table->string('name');
        });

        // Albums can be attached to a category
        Schema::create('gallery_albums', function(Blueprint $table)
        {
          $table->id();
          $table->string('name');
          $table->bigInteger('gallery_categories_id')->unsigned();

          $table->foreign('gallery_categories_id')
            ->references('id')
            ->on('gallery_categories')
            ->onDelete('cascade');
        });

        // Tags to make it easier to find related content
        Schema::create('gallery_tags', function(Blueprint $table)
        {
          $table->id();
          $table->string('name');         
        });

        // Gallery images must be attached to an album
        Schema::create('gallery_images', function(Blueprint $table)
        {
          $table->id();
          $table->string('title', 100);
          $table->string('image');
          $table->string('location');
          $table->string('taken');
          $table->string('description');
          $table->boolean('published');
                     
          // Create a relation between this table and the user table.
          
          $table->bigInteger('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          
          // Create a relation between this table and the albums table
          
          $table->bigInteger('gallery_albums_id')->unsigned();
          $table->foreign('gallery_albums_id')->references('id')->on('gallery_albums')->onDelete('cascade');
          
          $table->timestamps();
        }); 

        // Pivot table to match tags 
        Schema::create('gallery_tags_pivot', function(Blueprint $table)
        {
           $table->bigInteger('gallery_images_id')->unsigned();
           $table->foreign('gallery_images_id')->references('id')->on('gallery_images')->onDelete('cascade');
          
           $table->bigInteger('gallery_tags_id')->unsigned();
           $table->foreign('gallery_tags_id')->references('id')->on('gallery_tags')->onDelete('cascade');
          
        });       

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gallery_categories');
        Schema::dropIfExists('gallery_albums');
        Schema::dropIfExists('gallery_tags');
        Schema::dropIfExists('gallery_images');
        Schema::dropIfExists('gallery_tags_pivot');
    }
}
