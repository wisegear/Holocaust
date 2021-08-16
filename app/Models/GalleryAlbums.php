<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryAlbums extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'gallery_albums';

    public function galleryCategories()
    {
      return $this->belongsTo('App\Models\GalleryCategories');
    }
    
    public function galleryImages()
    {
      return $this->hasMany('App\Models\GalleryImages', 'albums_id');
    }  
}
