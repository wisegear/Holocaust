<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quotes;

class QuotesController extends Controller
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
        // Get data elements
        $quotes = Quotes::where('published', true)->paginate(12);

        $unique = Quotes::distinct('author')->limit(10)->pluck('author');
           
        //  Return quotes index page
        return view ('quotes.index', compact('quotes', 'unique'));
    }

	//*******************************************************
  	//  View the timeline index
  	//******************************************************* 
    public function create()
    {
      //  Return the form to create a new event
      return view('quotes.create');
        
    }

	//*******************************************************
  	//  Store an event
  	//******************************************************* 
   
   public function store(Request $request)
   {
      // Open the DB ready for new event
      $new_quote = new Quotes;
      
      // Associate the form results to the DB fields
      $new_quote->author = $request->quote_author;
      $new_quote->quote = $request->quote_text;
      if ($request->published === 'on') {
            
         $new_quote->published = 1; } else {
            $new_quote->published = 0;
     }

      // Save the new event to the DB
      $new_quote->save();
      
      // Redirect back to the timeline index
      return redirect()->action([QuotesController::class, 'index']);
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
      // Get required data elements
      $quote = Quotes::find($id);
      
      //  Return the form to edit an event
      return view('quotes.edit')->with('quote', $quote);
   }

	//*******************************************************
  	//  Update an event
  	//*******************************************************
   
   public function update(Request $request, $id)
   {
      // Get required data elements
      $edit_quote = Quotes::find($id);
      
      // Update the existing record
      $edit_quote->author = $request->quote_author;
      $edit_quote->quote = $request->quote_text;
        // Check if the quote is to be published

        if ($request->published === 'on') {
            
         $edit_quote->published = 1; } else {
            $edit_quote->published = 0;
     }
      
      // Save the changes
      $edit_quote->save();
      
      //return the viewer to timeline index
      return redirect()->action([QuotesController::class, 'index']);
   }

	//*******************************************************
  	//  Destroy an event
  	//*******************************************************  
   
   public function destroy($id)
   {
      // Destroy the timeline event
      Quotes::destroy($id);
      
      // Return viewer to the events page
      return redirect()->back();
   }
}
