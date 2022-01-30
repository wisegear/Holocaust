<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPosts;
use App\Models\Quotes;

class PagesController extends Controller
{
    public function home()
    {
        $quote = Quotes::all()->random(); 
        $posts = BlogPosts::where('published', true)->orderBy('created_at', 'desc')->limit(4)->get();

        return view('home', compact('posts', 'quote'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function important()
    {
        return view('important');
    }
}
