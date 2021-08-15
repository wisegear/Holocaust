<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPosts extends Model
{
    use HasFactory;
    protected $table = 'blog_posts';

    public function Users() {
    	
    	return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function blogCategories() {
    	return $this->hasOne(BlogCategories::class, 'id', 'categories_id');
    }

    public function blogTags() {
    	return $this->belongsToMany(BlogTags::class, 'post_tags', 'post_id', 'tag_id'); 
    }

    public function comments() {
        return $this->morphMany(Comments::class, 'commentable');
    }

    public static function getCategories($category) {
        
        return BlogPosts::whereHas('BlogCategories', function ($query) use ($category) 
            {          
                $query->where('name', $category);          
            })
            ->where('published', true)
            ->with('BlogCategories', 'Users', 'BlogTags')
            ->orderBy('created_at', 'desc')
            ->paginate(6);  
    }

    public static function GetTags($tag) {

        return BlogPosts::whereHas('BlogTags', function ($query) use ($tag) 
            {          
                $query->where('name', $tag);          
            })
        
            ->where('published', true)
            ->with('BlogCategories', 'Users', 'BlogTags')
            ->orderBy('created_at', 'desc')
            ->paginate();  
    }

}


