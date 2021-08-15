<?php

namespace App\View\Components;

use Illuminate\View\Component;
use DB;

class blogsidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $categories = App\Models\BlogCategories::with('BlogPosts')->get();
        $featured = App\Models\BlogPosts::with('Users')->where('featured', true)->orderBy('created_at', 'desc')->limit(3)->get();
        $unpublished = App\Models\BlogPosts::where('published', false)->get();
        $popular_tags = DB::table('post_tags')
            ->leftjoin('blog_tags', 'blog_tags.id', '=', 'post_tags.tag_id')
            ->select('post_tags.tag_id', 'name', DB::raw('count(*) as total'))
            ->groupBy('post_tags.tag_id', 'name')
            ->orderBy('total', 'desc')
            ->limit(15)
            ->get();

        return view('components.blogsidebar', compact('categories','featured','unpublished','popular_tags'));
    }
}
