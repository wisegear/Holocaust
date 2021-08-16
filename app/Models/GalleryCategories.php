<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryCategories extends Model
{
    use HasFactory;
    protected $table = 'gallery_categories';
    public $timestamps = false;
    
    public function galleryAlbums()
    {
      return $this->hasMany('App\Models\GalleryAlbums', 'gallery_categories_id');
    }
}
