<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class GalleryTagsPivot extends Model
{
    use HasFactory;
    protected $table = 'gallery_tags_pivot';
   
   
    public static function getPopularTags()
    {
       // Get 15 most popular tags attached to gallery images
       
       $popular_tags = DB::table('gallery_tags_pivot')
                       ->leftJoin('gallery_tags', 'gallery_tags_pivot.gallery_tags_id', '=', 'gallery_tags.id')
                       ->select('id', 'name', DB::raw('count(*) as total'))
                       ->groupBy('id')
                       ->orderBy('total', 'desc')
                       ->limit(15)
                       ->get();      
       
       return $popular_tags;
    }
     
       
 
 }
