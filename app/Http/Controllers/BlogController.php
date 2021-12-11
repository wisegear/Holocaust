<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPosts;
use App\Models\BlogCategories;
use App\Models\BlogTags;
use DB; use File; use Image; use Auth; use Validator; use Str;

class BlogController extends Controller
{

    public function __construct()
    {
        // Apply the auth middelware, authentication is required for all
        // but the blog index and viewing posts.

        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        // Create blog index results page depending on search method

        // Search by string using the search box.

        if (isset($_GET['search']))
        {
            $posts = BlogPosts::where(function ($query) {
                $query->where('title', 'LIKE', '%' . $_GET['search'] . '%')
                      ->orWhere('body', 'LIKE', '%' . $_GET['search'] . '%');
            })
            ->paginate(6);

        } elseif (isset($_GET['category'])) {
 
            // Searching by blog category

            $posts = BlogPosts::GetCategories($_GET['category']);

        } elseif (isset($_GET['tag'])) {

            // Searching by a tag

            $posts = BlogPosts::GetTags($_GET['tag']);
        
        } else {
 
            // Return the default view. 

            $posts = BlogPosts::with('BlogCategories', 'BlogTags', 'Users')
            ->where('published', true)
            ->orderBy('created_at', 'desc')
            ->paginate(6);
        }

        return view('blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $this->authorize('Admin');
        
        $categories = BlogCategories::all();

        return view('blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $this->authorize('Admin');
        
        $validator = Validator::make($request->all(), [
            'newimage' => 'required',
            'title' => 'required|max:100',
            'excerpt' => 'required',
            'body' => 'required',
            'category' => 'required'
        ])->validate();

        $post = new BlogPosts;
        $post->image = $request->newimage;
        $post->title = $request->title;
        $post->excerpt = $request->excerpt;
        $post->slug = Str::slug($post->title, '-');
        $post->body = $request->body;
        $post->user_id = Auth::user()->id;
        $post->categories_id = $request->category;

        // Check if the post is to be published

        if ($request->published === 'on') {
            
            $post->published = 1; } else {
                $post->published = 0;
        }

        // Check whether post is featured

        if ($request->featured === 'on') {
            
            $post->featured = 1; } else {
                $post->featured = 0;
        }

        // Save to database

        $post->save();

        BlogTags::StoreTags($request->tags, $post->slug);

        return redirect()->action([BlogController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogPosts  $blogPosts
     * @return \Illuminate\Http\Response
     */

    public function show($slug)
    {

        //Eager load Support ticket with comments and sort comments by desc order.

        $post = BlogPosts::with('comments')->orderBy('created_at', 'desc')->with('BlogCategories', 'Users', 'BlogTags')->where('slug', $slug)->first();
    
        return view('blog.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogPosts  $blogPosts
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $this->authorize('Admin');
        
        $post = BlogPosts::find($id);
        $categories = BlogCategories::all();
        $split_tags = BlogTags::TagsForEdit($id);

        return view('blog.edit', compact('post', 'categories', 'split_tags'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogPosts  $blogPosts
     * @return \Illuminate\Http\Response
     */

     public function update(Request $request, $id)
       {
            $this->authorize('Admin');

            
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:100',
                'body' => 'required|min:1',
            ])->validate();

                $post = BlogPosts::find($id);
                // Establish whether a new post image has been selected.
                if (isset($request->getimage))
                {
                    $post->image = $request->getimage;
                }
                $post->title = $request->title;
                $post->slug = Str::slug($post->title, '-');
                $post->excerpt = $request->excerpt;
                $post->body = $request->body;
                $post->categories_id = $request->category;
                if($request->published === 'on')
                {
                    
                    $post->published = 1;
                } else {
                    $post->published = 0;
                }
                if($request->featured === 'on')
                {
                    
                    $post->featured = 1;
                } else {
                    $post->featured = 0;
                }
      
                $post->save();
                BlogTags::storeTags($request->tags, $post->slug);
                return redirect()->action([BlogController::class, 'index']);
            
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\BlogPosts  $blogPosts
         * @return \Illuminate\Http\Response
         */

        public function destroy($id)
        {
            $this->authorize('Admin');
            
            $post = BlogPosts::find($id);
      
            BlogPosts::destroy($id);
            return back();
        }
    }
