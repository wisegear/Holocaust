<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImages extends Model
{
    use HasFactory;
    protected $table = 'gallery_images';
   
	//*******************************************************
  	//  Relationships
  	//*******************************************************
  
   public function galleryAlbums()
   {
    return $this->belongsTo('App\Models\GalleryAlbums', 'gallery_albums_id');
   }

   public function galleryComments()
   {
    return $this->hasMany('App\Models\GalleryComments', 'images_id');
   }

   public function galleryUser()
   {
    return $this->belongsTo('App\Models\User', 'user_id');
   }

   public function galleryTags()
   {
    return $this->belongsToMany('App\Models\GalleryTags', 'gallery_tags_pivot');
   }

   public function comments() {
    return $this->morphMany(Comments::class, 'commentable');
}
  
	//*******************************************************
  	//  Methods
  	//*******************************************************

}
