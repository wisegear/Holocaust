<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Timeline;

class AdminTimelineController extends Controller
{
    public function index()
    {
        $timeline = Timeline::paginate(15);

        return view('admin.timeline.index', compact('timeline'));
    }
}
