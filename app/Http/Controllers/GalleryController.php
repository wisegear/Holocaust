<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\GalleryCategories;
use App\Models\GalleryAlbums;
use App\Models\GalleryImages;
use App\Models\GalleryComments;
use App\Models\GalleryTags;
use App\Models\GalleryTagsPivot;
use Auth;
use Image;
use File;


class GalleryController extends Controller
{

	//*******************************************************
  	//  Properties
  	//*******************************************************
	
	public $gallery_path = '/images/gallery/categories/';
	
	//*******************************************************
  	//  Methods
  	//*******************************************************
	
   public function __construct()
   {
		// Handle user authentication for each of the methods.
      $this->middleware('auth', ['except' => ['index', 'show', 'albums', 'images', 'tag_search']]);      
   }
		
	//*******************************************************
  	//  Gallery index page
  	//*******************************************************
	
    public function index()
    {
		//  Bring in the elements we need from elsewhere
		$gallery_path = $this->gallery_path;
		$popular_tags = GalleryTagsPivot::getPopularTags(); 

		//  Get additional elements from this method. 
		$image_count = GalleryImages::all()->count();
			$gallery_categories = GalleryCategories::paginate(12);
		$recent_images = GalleryImages::orderBy('id', 'desc')->take(3)->get();

		// Prepare array to pass all the data to the view.
		$data = array(	'gallery_path' => $gallery_path,
								'popular_tags' => $popular_tags,
								'image_count' => $image_count,
								'gallery_categories' => $gallery_categories,
								'recent_images' => $recent_images,
										 );

	 	// Return the view to the viewer.
	 	return view('gallery.index')->with($data);
    }

	//*******************************************************
  	//  Albums index page
  	//*******************************************************

   public function albums($category)
   {
      //  Bring in the elements we need from elsewhere
      $gallery_path = $this->gallery_path;
		$popular_tags = GalleryTagsPivot::getPopularTags();
		
		//  Get additional elements from this method.
		$image_count = GalleryImages::all()->count();
		$recent_images = GalleryImages::orderBy('id', 'desc')->take(3)->get();
        $gallery_albums = GalleryAlbums::where('gallery_categories_id', '=', $category)->paginate(12);
			 
		
		// Prepare array to pass all the data to the view.
      $data = array(	'gallery_albums' => $gallery_albums,
							'image_count' => $image_count,
							'popular_tags' => $popular_tags,
							'recent_images' => $recent_images,
							'gallery_path' => $gallery_path,
						 	);
		 
      // Return the view to the viewer.
      return view('gallery.albums')->with($data);
   }
 
	//*******************************************************
  	//  Images index page
  	//*******************************************************
	
   public function images($album)
   {
      //  Bring in the elements we need from elsewhere
      $gallery_path = $this->gallery_path;
		$popular_tags = GalleryTagsPivot::getPopularTags();
		
		//  Get additional elements from this method.
		$album = GalleryAlbums::find($album);
		$image_count = GalleryImages::all()->count();
		$recent_images = GalleryImages::orderBy('id', 'desc')->take(3)->get();
      $gallery_images = GalleryImages::where('gallery_albums_id', '=', $album)->paginate(12);
		$album_path = strtolower( $album->galleryCategories->name . '/' . $album->name . '/' . 'thumb-' );			
			
		// Prepare array to pass all the data to the view.
      $data = array(	'gallery_images' => $gallery_images,
							'gallery_path' => $gallery_path,
							'album_path' => $album_path,
							'image_count' => $image_count,
							'popular_tags' => $popular_tags,
							'recent_images' => $recent_images,
                      );
   
      // Return the view to the viewer.
      return view('gallery.images')->with($data);
   }
    
	//*******************************************************
  	//  Create new image
  	//*******************************************************
	
   public function create()
   {
    	//  Get additional elements from this method.
	$gallery_albums = GalleryAlbums::all();
      $gallery_categories = GalleryCategories::all();
      
		// Prepare array to pass all the data to the view.
      $data = array('gallery_categories' => $gallery_categories,
                    'gallery_albums' => $gallery_albums
                     );     
		
      // Return the view to the viewer.
      return view('gallery.create')->with($data);
    }

	//*******************************************************
  	//  Store new image in database
  	//*******************************************************
	
   public function store(Request $request)
   {
		
		// I am handing both the store of a new image and a new comment on an existing image here
		// To handle this I have put a hidden form field with the name comment_image_id in it. If
		// Request has this id then we know it's a comment and therefore process as such.
			
		if($request->has('comment_image_id'))
		{
			$new_comment = new GalleryComments;  // Open the gallery comments table  

			// Get the comment form data and assign to new comment
			$new_comment->images_id = $request->comment_image_id;
			$new_comment->user_id = Auth::user()->id;
			$new_comment->comment = $request->comment;

			$new_comment->save();  // Save new comment

			return redirect()->back();  // Return the user to the page they were immediately prior.
		}
			
		else  // If there is no comment_image_id then we are saving a new image.
			
		{
			// Get the category And album names and convert to lower case to match directory on filesystem.
			$find_category = GalleryCategories::findorFail($request->gallery_category_id);
			$category_name = strtolower ($find_category->name);
			$find_album = GalleryAlbums::find($request->gallery_album_id);
			$album_name = strtolower ($find_album->name);

			// save the new image and all applicable fields from the form.
			$new_image = new GalleryImages;

			$new_image->gallery_albums_id = $request->gallery_album_id;
			$new_image->title = $request->title;
			$new_image->description = $request->description;
			$new_image->taken = $request->when_taken;
			$new_image->location = $request->where_taken;
			$new_image->user_id = Auth::user()->id;

			if($new_image->published === 'on')
			{
				$new_image->published = 1;

			} else {
				
				$new_image->published = 0;
			}


			// Get the image that the user selected.              
			$file = $request->file('gallery-image');
			
			// Assign a unique name, in this case we prepend with a timestamp and -
			$image_name = time() . '-' . $file->getClientOriginalName();

			// Move the file to the right directory, Category -> Album
			$file->move(public_path() . '/images/gallery/categories/'. $category_name . '/' . $album_name . '/', $image_name);

			// Create thumbnail and move it to the same location as above
			$create_thumb = Image::make(sprintf(public_path() . '/images/gallery/categories/'. $category_name . '/' . $album_name . '/' . '%s', $image_name))
			->resize(125, 125)->save(public_path() . '/images/gallery/categories/'. $category_name . '/' . $album_name . '/' . 'thumb-' . $image_name);

			// Set the new unique name to the row   
			$new_image->image = $image_name;                   

			// Save the record in the database
			$new_image->save();
     
			// Pass the tags to the GalleryTags model for processing independently
         GalleryTags::storeTags($request->tags, $new_image->id);
         
			// Return the user back to the gallery index
			return redirect()->action([GalleryController::class, 'index']);
				
		}
		
   }
        
	//*******************************************************
  	//  Show the image view
  	//*******************************************************
	
   public function show($id)
   {
   	//  Bring in the elements we need from elsewhere
		$gallery_path = $this->gallery_path;
      $gallery_image = GalleryImages::find($id);
		
		//  Get additional elements from this method.
		$image_path = strtolower( $gallery_image->galleryAlbums->galleryCategories->name . '/' . $gallery_image->galleryAlbums->name . '/' );
		
		// Prepare array to pass all the data to the view.
      $data = array('gallery_image' => $gallery_image,
							'image_path' => $image_path,
							'gallery_path' => $gallery_path
                     );
      
		// Return the view to the viewer.
      return view('gallery.view')->with($data);
   }

	//*******************************************************
  	//  Edit an image
  	//*******************************************************
	
   public function edit($id)
   {
		//  Bring in the elements we need from elsewhere
		$gallery_path = $this->gallery_path;
		$split_tags = GalleryTags::tagsForEdit($id);
		
		//  Get additional elements from this method.
		$gallery_albums = GalleryAlbums::all();
      $gallery_categories = GalleryCats::all();
		$gallery_image = GalleryImages::find($id);
		$image_path = strtolower( $gallery_image->galleryAlbums->galleryCategories->name . '/' . $gallery_image->galleryAlbums->name . '/' );

      // Prepare array to pass all the data to the view.  
		$data = array('gallery_image' => $gallery_image, 
                     'split_tags' => $split_tags,
							'gallery_categories' => $gallery_categories,
							'gallery_albums' => $gallery_albums,
							'gallery_path' => $gallery_path,
							'image_path' => $image_path,
                     );
		
		// Return the view to the viewer.
      return view('gallery.edit')->with($data);
   }

	//*******************************************************
  	//  Update an image
  	//*******************************************************
	
   public function update(Request $request, $id)
   {
   	//  Bring in the elements we need from elsewhere
		$gallery_path = $this->gallery_path;
		
		//  Get additional elements from this method.
		$image_edit = GalleryImages::find($id);

      // The first thing to do here is check whether the user is changing the image already held
		// If they are then process that first.

		if ($request->hasFile('new-image'))
		{
			// Find the current image, remove it from the file system.
         $old_image = $image_edit->image;

			$image_path = strtolower( $image_edit->galleryAlbums->galleryCategories->name . '/' . $image_edit->galleryAlbums->name . '/' );

    		File::delete(public_path() . $gallery_path . $image_path . $old_image);
			File::delete(public_path() . $gallery_path . $image_path . 'thumb-' . $old_image);
                    
			// OK, now get the new image and save it in the appropriate directory.
         
			// Get the image              
         $file = $request->file('new-image');
              
			// Assign a unique name
			$image_name = time() . '-' . $file->getClientOriginalName();
                    
         // Move the file to the right directory
         $file->move(public_path() . $gallery_path . $image_path, $image_name);
  
         // Create thumbnail
	      $create_thumb = Image::make(sprintf(public_path() . $gallery_path . $image_path . '%s', $image_name))
         	->resize(125, 125)->save(public_path() . $gallery_path . $image_path . 'thumb-' . $image_name);
     
         // Set new image name to the database   
         $image_edit->image = $image_name;        
					
			//  Save the new image name to the database before we save other parts, just in case location has changed, saving now will ensure
			//  the new image is in the right place to move it otherwise it will save to the existing location and move the old image.
    		$image_edit->save();
      }
		
		// If the album has changed we need to move the image to the new location, if the album is in a different caegory this will be picked up.
		
		if ($request->gallery_album_id != $image_edit->gallery_albums_id)
		{
			$new_album = GalleryAlbums::find($request->gallery_album_id);
					
			$gallery_path = $this->gallery_path;
			$old_path = strtolower( $image_edit->galleryAlbums->galleryCategories->name . '/' . $image_edit->galleryAlbums->name . '/' );
			$new_path = strtolower( $new_album->galleryCategories->name . '/' . $new_album->name . '/' );
					
			File::move(public_path() . $gallery_path . $old_path . $image_edit->image, public_path() . $gallery_path . $new_path . $image_edit->image);
			File::move(public_path() . $gallery_path . $old_path . 'thumb-' . $image_edit->image, public_path() . $gallery_path . $new_path . 'thumb-' . $image_edit->image);
				
		}
			
		// Now we can assign all other fields and save them in the database.
		$image_edit->title = $request->title;
		$image_edit->location = $request->where_taken;
		$image_edit->taken = $request->when_taken;
		$image_edit->description = $request->description;
      $image_edit->gallery_albums_id = $request->gallery_album_id;
      $image_edit->published = $request->published;	
		$image_edit->save();
			
      // Pass the tags to the GalleryTags model for processing independently 
		GalleryTags::storeTags($request->tags, $image_edit->id);
      
      // Return the user to the page prior to the update form.
		return redirect()->back();
   }

	//*******************************************************
  	//  Destroy an image
  	//*******************************************************
	
   public function destroy(Request $request)
   {
   	//  As with the store method we are dealing with both destoying an image or a comment attached to it.
		//  There is a hidden form field called delcomment or delimage to tell us which to delete.
		//  The hidden field has the $id assigned to it.
		
		// If the request is to delete a comment then..
      if ($request->has('delcomment'))
      {
      	GalleryComments::destroy($request->delcomment);
     	 	return redirect()->back();
      }
      
		// If the request is to delete an image then..	
		if ($request->has('delimage'))       
		{
			//  Note:  Delete the image from the filesystem before the database, otherwise you will loose the image name.
			$gallery_image = GalleryImages::findOrFail($request->delimage);
			$deleting_image = $gallery_image->image;

			$gallery_path = $this->gallery_path;

			$image_path = strtolower( $gallery_image->galleryAlbums->galleryCategories->name . '/' . $gallery_image->galleryAlbums->name . '/' );					

			File::delete(public_path() . $gallery_path . $image_path . $deleting_image);
			File::delete(public_path() . $gallery_path . $image_path . 'thumb-' . $deleting_image);

			// Detach(delete) any tags associated with this image.
			$detach_tags = GalleryImages::findOrFail($request->delimage);
			$post->galleryTags()->detach();

			// Delete the database entry for the image
			GalleryImages::destroy($request->delimage);

			// Return the viewer to the gallery index
			return redirect()->action([GalleryController::class, 'index']);
            
      }	
   }
	
	//*******************************************************
  	//  Gallery Tags Search - Display tags for the search.
  	//*******************************************************

  	public function tag_search($tag)
   {
		//  Bring in the elements we need from elsewhere
		$gallery_path = $this->gallery_path;
		$popular_tags = GalleryTagsPivot::getPopularTags();
		
		//  Get additional elements from this method.
		$image_count = GalleryImages::all()->count();
		$recent_images = GalleryImages::orderBy('id', 'desc')->take(3)->get();
		
		// Prepare the images found that relate to the tag selected
     	$found_images = GalleryImages::whereHas('galleryTags', function ($query) use ($tag) 
		{$query->where('name', $tag);
           })->orderBy('created_at', 'desc')
          	 ->paginate(5);
		
		// Prepare array to pass all the data to the view.
        $data = array(	'found_images' => $found_images,
								'image_count' => $image_count,
								'popular_tags' => $popular_tags,
								'recent_images' => $recent_images,
								'gallery_path' => $gallery_path,
                     );
		// Return the viewer to the search page with results.
      return view('gallery.search')->with($data);
   }
	
} // End of class
