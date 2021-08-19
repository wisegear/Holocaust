<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Support;
use App\Models\Comments;
use App\Models\BlogPosts;
use App\Models\UserRolesPivot;
use App\Models\Quotes;
use App\Models\Timeline;
use App\Models\GalleryImages;

class AdminController extends Controller
{
  
    public function index() {

    	// User info
    	$users = User::all();
        $logged = User::orderBy('last_login_at', 'desc')->take(5);

        // Ridiculous workaround, count users, roles then add 1 as admin has two roles!!
        $users_count = User::all()->count();
        $roles_count = UserRolesPivot::all()->Count();
    	$users_pending = UserRolesPivot::all()->where('role_id', '===', 2)->count();
    	$users_banned = UserRolesPivot::all()->where('role_id', '===', 1)->count();
        $users_active = UserRolesPivot::all()->where('role_id', '===', 3)->count();

		// Quotes info
		$quote_count = Quotes::all();
		$quotes_hidden = Quotes::where('published', false)->get();

		// Timeline info
		$timeline_count = Timeline::all();
		$timeline_hidden = Timeline::where('published', false)->get();

    	//Support info
    	$tickets = Support::all();
    	$awaiting_reply = Support::all()->where('status', '===', 'Awaiting Reply')->count();
    	$open_tickets = Support::all()->where('status', '===', 'Open')->count();
        $in_progress_tickets = Support::all()->where('status', '===', 'In Progress')->count();

		//Blog info
		$blogposts = BlogPosts::all();
		$blogunpublished = BlogPosts::where('published', false)->get();

		//Gallery Info
		$galleryImages = galleryImages::all();
		$imagesUnpublished = galleryImages::where('published', false)->get();

    	$data = array(

    		'users' => $users,
    		'users_pending' => $users_pending,
            'users_active' => $users_active,
    		'tickets' => $tickets,
    		'awaiting_reply' => $awaiting_reply,
    		'open_tickets' => $open_tickets,
            'in_progress_tickets' => $in_progress_tickets,
    		'users_banned' => $users_banned,
			'blogposts' => $blogposts,
			'blogunpublished' => $blogunpublished,
			'quote_count' => $quote_count,
			'quotes_hidden' => $quotes_hidden,
			'timeline_count' => $timeline_count,
			'timeline_hidden' => $timeline_hidden,
			'galleryImages' => $galleryImages,
			'imagesUnpublished' => $imagesUnpublished,
     	);

    	return view ('admin.index')->with($data);
    }
}
