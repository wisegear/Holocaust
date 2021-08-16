<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryTags extends Model
{
      use HasFactory;
      protected $table = 'gallery_tags';
      public $timestamps = false;
    
     //*******************************************************
        //  Relationship to GalleryImages
        //*******************************************************
     public function galleryImages()
     {
        return $this->belongsToMany('App\Models\GalleryImages', 'gallery_tags_pivot');
     }
  
     //*******************************************************
        //  Process new tags or associate existing
        //*******************************************************
     
    public static function storeTags($gallery_tags, $image_id)
    {
        // Explode tags, removing the commas.  
        $exploded_tags = explode(',', $gallery_tags);
  
        // Find image and remove existing tags, if it's an edit we won't know which are right.
        $gallery_image = GalleryImages::find($image_id);
        $gallery_image->GalleryTags()->detach();
  
        // Take each tag in turn and check if it exists, if not create a new tag and assign to post.
        foreach ($exploded_tags as $tag)
           {
              $found_tag = GalleryTags::where('name', $tag)->first();
  
                if ( ! empty($tag) && ! isset($found_tag->name))  // If no existing tag is found and we have a new one, save it.
                {
                    $new_tag = new GalleryTags;
                    $new_tag->name = $tag;
                    $new_tag->save();
  
                    // Attach the new tag to the image
                    $gallery_image->galleryTags()->attach($new_tag->id);
  
                 } else {  
                    
                 // if the tag already existed and not attached to the image, attach it.
                 if (isset($found_tag))
                 {
                     $gallery_image->galleryTags()->attach($found_tag->id);
                 }
                         
                 }
             }       
     }  
    
     //*******************************************************
        //  Process new tags or associate existing
        //******************************************************* 
     
     public static function tagsForEdit($id)
     {
        // Get the tags from the image post.
        $get_image = GalleryImages::find($id);
  
        // Prepare a new array.
        $items = array();
  
        // Loop through each tag and store in the array.
        foreach ($get_image->galleryTags as $tag)
        {
          $items[] = $tag->name;
        }
  
        // Now convert that array into a string, seperating each tag with a comma to allow the correct 
        // format to be displayed on the edit form.
  
        $tag_string = implode(',', $items);
  
        // Pass the new string of tags back to the controller requesting it.
  
        return $tag_string;
      }
    
  } // End of class
