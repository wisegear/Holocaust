<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timeline;

class TimelineController extends Controller
{ 
  
	//*******************************************************
  	//  Properties
  	//*******************************************************
	

	
	//*******************************************************
  	//  Methods
  	//*******************************************************
	
   public function __construct()
   {
		// Handle user authentication for each of the methods.
      $this->middleware('auth', ['except' => ['index', 'show']]);      
   }
   
	//*******************************************************
  	//  View the timeline index
  	//*******************************************************   
   
   public function index()
   {

      // Determine if a year has been selected and action.
      if (isset($_GET['year']))
      {
         $year = $_GET['year'];

         // If the year is < 1933
         if ( $year === 'earlier' ) {

            $events = Timeline::where('published', true)->whereYear('event_date', '<', 1933)->orderBy('event_date', 'asc')->paginate(50);
         
         // If the year is > 1945
         } elseif ( $year === 'later' ) {

            $events = Timeline::where('published', true)->whereYear('event_date', '>', 1945)->orderBy('event_date', 'asc')->paginate(50);
         
         // If the year is between 1933-1945
         } else {

            $events = Timeline::where('published', true)->whereYear('event_date', $year)->orderBy('event_date', 'asc')->paginate(50);

         }
      
      // did the user use the search box?
      } elseif (isset($_GET['search']))
      {
         $events = Timeline::where('published', true)
            ->where(function ($query) {
               $query->where('title', 'LIKE', '%' . $_GET['search'] . '%')
                  ->orWhere('description', 'LIKE', '%' . $_GET['search'] . '%');
                  
         })->paginate(50);

      } else {    
         $events = Timeline::where('published', true)->orderBy('event_date', 'asc')->paginate(50);
      }

      //  Pick out the years
      $uniqueYears = Timeline::all()->map(function($entry) { return $entry->event_date->year; })->unique()->sort();

      // Return the view with data
      return view('timeline.index', compact('events', 'uniqueYears'));
   }

	//*******************************************************
  	//  Create an event
  	//*******************************************************   
   
   public function create()
   {
      $this->authorize('Admin');

      //  Return the form to create a new event
      return view('timeline.create');
   }

	//*******************************************************
  	//  Store an event
  	//******************************************************* 
   
   public function store(Request $request)
   {
      $this->authorize('Admin');

      // Open the DB ready for new event
      $new_event = new Timeline;
      
      // Associate the form results to the DB fields
      $new_event->title = $request->title;
      $new_event->event_date = $request->event_date;
      $new_event->description = $request->description;
        // Check if the event is to be published

        if ($request->published === 'on') {
            
         $new_event->published = 1; } else {
             $new_event->published = 0;
     }
      
      // Save the new event to the DB
      $new_event->save();
      
      // Redirect back to the timeline index
     return redirect()->action([TimelineController::class, 'index']);
   }

   /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function show($id)
   {
   //
   }

	//*******************************************************
  	//  Edit an event
  	//******************************************************* 
   
   public function edit($id)
   {
      $this->authorize('Admin');

      // Get required data elements
      $timeline_event = Timeline::find($id);
      
      //  Return the form to edit an event
      return view('timeline.edit')->with('timeline_event', $timeline_event);
   }

	//*******************************************************
  	//  Update an event
  	//*******************************************************
   
   public function update(Request $request, $id)
   {
      $this->authorize('Admin');
      // Get required data elements
      $edit_event = Timeline::find($id);
      
      // Update the existing record
      $edit_event->title = $request->title;
      $edit_event->event_date = $request->event_date;
      $edit_event->description = $request->description;
        // Check if the event is to be published

        if ($request->published === 'on') {
            
         $edit_event->published = 1; } else {
             $edit_event->published = 0;
     }
      
      // Save the changes
      $edit_event->save();
      
      //return the viewer to timeline index
      return redirect()->action([TimelineController::class, 'index']);
   }

	//*******************************************************
  	//  Destroy an event
  	//*******************************************************  
   
   public function destroy($id)
   {
      $this->authorize('Admin');
      // Destroy the timeline event
      Timeline::destroy($id);
      
      // Return viewer to the events page
      return redirect()->back();
   }

}
