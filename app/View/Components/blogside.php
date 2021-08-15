<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\BlogPosts;
use App\Models\BlogCategories;
use DB;

class Blogside extends Component
{

    public $categories;
    public $featured;
    public $unpublished;
    public $popular_tags;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->categories = BlogCategories::with('BlogPosts')->get();
        $this->featured = BlogPosts::with('Users')->where('featured', true)->orderBy('created_at', 'desc')->limit(3)->get();
        $this->unpublished = BlogPosts::where('published', false)->get();
        $this->popular_tags = DB::table('post_tags')
        ->leftjoin('blog_tags', 'blog_tags.id', '=', 'post_tags.tag_id')
        ->select('post_tags.tag_id', 'name', DB::raw('count(*) as total'))
        ->groupBy('post_tags.tag_id', 'name')
        ->orderBy('total', 'desc')
        ->limit(15)
        ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        
        return view('components.blogside');

    }
}
